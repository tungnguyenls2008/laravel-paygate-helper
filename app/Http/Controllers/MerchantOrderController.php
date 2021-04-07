<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMerchantOrderRequest;
use App\Http\Requests\UpdateMerchantOrderRequest;
use App\Models\MerchantOrderResult;
use App\Repositories\MerchantOrderRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MerchantOrderResultRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Flash;
use Response;

if (isset($_POST['entry-point'])&& $_POST['entry-point']!=''){
    define('ROOT_URL', $_POST['entry-point']);

}else{
    define('ROOT_URL', 'http://localhost/standard_paygate/');
}
//define('ROOT_URL', 'http://localhost:8083/api/web/checkout/version_1_0/?encrypt=0&function=CreateOrder');
define('DS', DIRECTORY_SEPARATOR);
define('CONFIG_URL', ROOT_URL);
define('ROOT_PATH', dirname(__FILE__));
define('MERCHANT_ID', '7');
define('MERCHANT_KEY', '123456789');
define('ROOT_URL_TEST', CONFIG_URL . 'test/merchant_demo.php');
define('ENCRYPT', 0);
//define('URL_API', CONFIG_URL . 'api/web/checkout/version_1_0/?encrypt=' . ENCRYPT);
define('URL_API', CONFIG_URL . 'api/web/checkout/version_1_0/?encrypt=' . ENCRYPT);

class MerchantOrderController extends AppBaseController
{
    /** @var  MerchantOrderRepository */
    private $merchantOrderRepository;
    private $merchantOrderResultRepository;

    public function __construct(MerchantOrderRepository $merchantOrderRepo, MerchantOrderResultRepository $merchantOrderResultRepo)
    {
        $this->merchantOrderRepository = $merchantOrderRepo;
        $this->merchantOrderResultRepository = $merchantOrderResultRepo;
    }

    /**
     * Display a listing of the MerchantOrder.
     *
     * @param Request $request
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index(Request $request)
    {
        $merchantOrders = $this->merchantOrderRepository->orderBy('created_at', 'DESC')->paginate(10);
        return view('merchant_orders.index')
            ->with('merchantOrders', $merchantOrders);
    }

    /**
     * Show the form for creating a new MerchantOrder.
     *
     * @return Response
     */
    public function create()
    {
        return view('merchant_orders.create');
    }

    /**
     * Store a newly created MerchantOrder in storage.
     *
     * @param CreateMerchantOrderRequest $request
     *
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateMerchantOrderRequest $request)
    {
        $input = $request->all();
        $option = $input['option'];
        if ($option == 'checkout') {

//    echo "<pre>";
//    print_r($params);
//    exit();
            $result = $this->CreateOrder($input);
            $merchantOrder = $this->merchantOrderRepository->create($input);
            $order_result= $this->merchantOrderResultRepository;

            if (isset($result['result_code']) && $result['result_code'] === '0000') {
                $data['result_code']=$result['result_code'];
                $data['checkout_url']=$result['result_data']['checkout_url'];
                $data['token_code']=$result['result_data']['token_code'];
                $data['result_message']=$result['result_message'];
                $data['input']=json_encode($input);
                $order_result->create($data);
                return redirect($result['result_data']['checkout_url']);
            } else {
                $data['result_code']=$result['result_code'];
                $data['checkout_url']='';
                $data['token_code']='';
                $data['result_message']=$result['result_message'];
                $data['input']=json_encode($input);
                $order_result->create($data);

            }
        } elseif ($option == 'notify') {
            $params = @$_POST;
            $this->writeLog('[notify]' . json_encode($params));
            if (!empty($params)) {
                $token_code = $this->input('token_code', '');
                if ($token_code != '') {
                    $result = $this->CheckOrder($token_code);
                    if ($result['result_code'] == '0000' && $result['result_data']['status'] == 3) {
                        $response = array('result_code' => '0000', 'result_message' => 'OK');
                        echo json_encode($response);
                    }
                }
            }
        } elseif ($option == 'cancel' || $option == 'return') {
            $this->writeLog('[' . $option . ']' . json_encode(@$_REQUEST));
        } elseif ($option == 'view_log') {
            $file_name = $this->input('file_name', '');
            if ($file_name != '') {
                $file_path = ROOT_PATH . 'logs' . DS . 'merchant_demo' . DS . $file_name;
                if (file_exists($file_path)) {
                    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
                    echo '<link href="../backend/web/css/bootstrap.css" rel="stylesheet">';
                    echo '<div style="font-size:12px; color:#333; line-height:20px; background-color:#FFF; padding:0px 0px 0px 20px;">';
                    echo $this->getContent($file_path);
                    echo '</div>';
                } else {
                    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
                    echo 'Không có file log';
                }
            }
        }



        Flash::success('Merchant Order saved successfully.');

        return redirect(route('merchantOrders.index'));
    }

    /**
     * Display the specified MerchantOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $merchantOrder = $this->merchantOrderRepository->find($id);

        if (empty($merchantOrder)) {
            Flash::error('Merchant Order not found');

            return redirect(route('merchantOrders.index'));
        }

        return view('merchant_orders.show')->with('merchantOrder', $merchantOrder);
    }

    /**
     * Show the form for editing the specified MerchantOrder.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $merchantOrder = $this->merchantOrderRepository->find($id);

        if (empty($merchantOrder)) {
            Flash::error('Merchant Order not found');

            return redirect(route('merchantOrders.index'));
        }

        return view('merchant_orders.edit')->with('merchantOrder', $merchantOrder);
    }

    /**
     * Update the specified MerchantOrder in storage.
     *
     * @param int $id
     * @param UpdateMerchantOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMerchantOrderRequest $request)
    {
        $merchantOrder = $this->merchantOrderRepository->find($id);

        if (empty($merchantOrder)) {
            Flash::error('Merchant Order not found');

            return redirect(route('merchantOrders.index'));
        }

        $merchantOrder = $this->merchantOrderRepository->update($request->all(), $id);

        Flash::success('Merchant Order updated successfully.');

        return redirect(route('merchantOrders.index'));
    }

    /**
     * Remove the specified MerchantOrder from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $merchantOrder = $this->merchantOrderRepository->find($id);

        if (empty($merchantOrder)) {
            Flash::error('Merchant Order not found');

            return redirect(route('merchantOrders.index'));
        }

        $this->merchantOrderRepository->delete($id);

        Flash::success('Merchant Order deleted successfully.');

        return redirect(route('merchantOrders.index'));
    }

    public function call($function, $params)
    {
        $query_string = http_build_query($params);

        $this->writeLog('[' . $function . '][input]' . json_encode($params));
        try {
            $ch = curl_init();
            $entry_point=$_POST['entry_point'];
            //$url = URL_API . '&function=' . $function;
            $url = $entry_point.'api/web/checkout/version_1_0/?encrypt=' . ENCRYPT . '&function=' . $function;

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            if (substr($url, 0, 5) == 'https') {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            }
            curl_setopt($ch, CURLOPT_ENCODING, "");
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
            /* curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "accept: application/json",
              "cache-control: no-cache",
              "content-type: application/json",
              "postman-token: d0cf02a7-7b8b-fd23-d85f-c06a2dad91c3"
              )); */
            $result = curl_exec($ch);
            $file_path = ROOT_PATH . DS . 'test' . DS . 'logs' . DS . 'order-log.txt';
            $file = fopen($file_path, 'a');
            fwrite($file, '"start sequence": '.date("Y-m-d H:i:s")."\n");
            fwrite($file, '"input": '.$query_string."\n");
            fwrite($file, '"api url": '.$url."\n");
            fwrite($file, $result);
            fclose($file);
            //echo($result);
            $this->writeLog('[' . $function . '][output]' . $result);

            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);

            if ($result != '' && $status == 200) {
                return json_decode($result, true);
            }
        } catch (Exception $ex) {
            return false;
        }
        return false;
    }

    public function CreateOrder($data)
    {
        $str_checksum = $data['merchant_site_code'];
        $str_checksum .= '|' . $data['order_code'];
        $str_checksum .= '|' . $data['order_description'];
        $str_checksum .= '|' . $data['amount'];
        $str_checksum .= '|' . $data['currency'];
        $str_checksum .= '|' . $data['buyer_fullname'];
        $str_checksum .= '|' . $data['buyer_email'];
        $str_checksum .= '|' . $data['buyer_mobile'];
        $str_checksum .= '|' . trim($data['buyer_address']);
        $str_checksum .= '|' . $data['return_url'];
        $str_checksum .= '|' . $data['cancel_url'];
        $str_checksum .= '|' . $data['notify_url'];
        //$str_checksum .= '|' . $data['time_limit'];
        $str_checksum .= '|' . $data['language'];
        $str_checksum .= '|' . $data['merchant_key'];
        //echo $str_checksum.'<br>';
        $data['checksum'] = md5($str_checksum);
        if (@$_GET['debug'] == 'duclm') {
            echo $str_checksum;
            die();
        }
        //echo $data['checksum'].'<br>';
        //====================
        return $this->call(__FUNCTION__, $data);
    }

    public function writeLog($data)
    {
        $file_path = ROOT_PATH . DS . 'test' . DS . 'logs' . DS . 'merchant_demo' . DS . date('Ymd') . '.txt';
        $file = fopen($file_path, 'a');
        if ($file) {
            fwrite($file, '[' . date('H:i:s, d/m/Y') . ']' . $data . "\n");
            fclose($file);
            return true;
        }
        return false;
    }

    public function input($name, $data = null)
    {
        if (isset($_REQUEST[$name]) && !empty($_REQUEST[$name])) {
            return $_REQUEST[$name];
        }
        if (isset($data[$name]) && !empty($data[$name])) {
            return $data[$name];
        }
        return '';
    }

    public function CheckOrder($token_code)
    {
        $data = array(
            'merchant_site_code' => MERCHANT_ID,
            'token_code' => $token_code,
        );
        $str_checksum = $data['merchant_site_code'];
        $str_checksum .= '|' . $data['token_code'];
        $str_checksum .= '|' . MERCHANT_KEY;
        $data['checksum'] = md5($str_checksum);
        //====================
        return $this->call(__FUNCTION__, $data);
    }

    private function getContent($file_path)
    {
        $content = '';
        $file = fopen($file_path, "r");
        if ($file) {
            while (($line = fgets($file)) !== false) {
                $line = htmlentities($line);
                $line = preg_replace('/^(\[[0-9\s,:\/]+\])/', '<br><strong>$1</strong>', $line);
                $line = preg_replace('/(\[[^\]\d]+\])/', '<span style="color:blue;">$1</span>', $line);
                $content .= $line . '<br>';
            }
            fclose($file);
        }
        return $content;
    }
}
