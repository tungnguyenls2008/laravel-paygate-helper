<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchaseOtpNapasRequestRequest;
use App\Http\Requests\UpdatePurchaseOtpNapasRequestRequest;
use App\Repositories\PurchaseOtpNapasRequestRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PurchaseOtpNapasResponseRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class PurchaseOtpNapasRequestController extends AppBaseController
{
    /** @var  PurchaseOtpNapasRequestRepository */
    private $purchaseOtpNapasRequestRepository;
    private $purchaseOtpNapasResponseRepository;

    public function __construct(PurchaseOtpNapasRequestRepository $purchaseOtpNapasRequestRepo,PurchaseOtpNapasResponseRepository $purchaseOtpNapasResponseRepository)
    {
        $this->purchaseOtpNapasRequestRepository = $purchaseOtpNapasRequestRepo;
        $this->purchaseOtpNapasResponseRepository = $purchaseOtpNapasResponseRepository;
    }

    /**
     * Display a listing of the PurchaseOtpNapasRequest.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $purchaseOtpNapasRequests = $this->purchaseOtpNapasRequestRepository->all();

        return view('purchase_otp_napas_requests.index')
            ->with('purchaseOtpNapasRequests', $purchaseOtpNapasRequests);
    }

    /**
     * Show the form for creating a new PurchaseOtpNapasRequest.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchase_otp_napas_requests.create');
    }

    /**
     * Store a newly created PurchaseOtpNapasRequest in storage.
     *
     * @param CreatePurchaseOtpNapasRequestRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOtpNapasRequestRequest $request)
    {
        $input = $request->all();
       if($this->purchaseOtpNapasRequestRepository->create($input)){
           $api = $input['api_entry'];
           $response = $this->doSendRequest($api, $input);
           $response = json_decode($response, true);
           if (isset($response['error_code']) && $response['error_code'] == 'SUCCESS') {
               $response_data['status'] = $response['status'];
               $response_data['error_code'] = $response['error_code'];
               $response_data['order_amount'] = $response['data']['order']['amount'];
               $response_data['order_currency'] = $response['data']['order']['currency'];
               $response_data['order_trans_time'] = $response['data']['order']['trans_time'];
               $response_data['order_trans_id'] = $response['data']['order']['trans_id'];
               $response_data['response_message'] = $response['data']['response']['message'];
               $response_data['response_acquirer_code'] = $response['data']['response']['acquirer_code'];
               $response_data['response_trans_status'] = $response['data']['response']['trans_status'];
               $response_data['source_of_fund_type'] = $response['data']['sourceOfFunds']['type'];
               $response_data['source_of_fund_provided_card_brand'] = $response['data']['sourceOfFunds']['provided']['card']['brand'];
               $response_data['source_of_fund_provided_card_scheme'] = $response['data']['sourceOfFunds']['provided']['card']['scheme'];
               $response_data['source_of_fund_provided_card_name_on_card'] = $response['data']['sourceOfFunds']['provided']['card']['nameOnCard'];
               $response_data['source_of_fund_provided_card_issue_date'] = $response['data']['sourceOfFunds']['provided']['card']['issueDate'];
               $response_data['source_of_fund_provided_card_number'] = $response['data']['sourceOfFunds']['provided']['card']['number'];
               $response_data['transaction_acquirer_id'] = $response['data']['transaction']['acquirer']['id'];
               $response_data['transaction_acquirer_napas_trans_id'] = $response['data']['transaction']['acquirer']['napas_trans_id'];
               $response_data['transaction_amount'] = $response['data']['transaction']['amount'];
               $response_data['transaction_currency'] = $response['data']['transaction']['currency'];
               $response_data['transaction_type'] = $response['data']['transaction']['type'];
               $response_data['transaction_id'] = $response['data']['transaction']['id'];
               $response_data['channel'] = $response['data']['channel'];
               $response_data['version'] = $response['data']['version'];
               $response_data['data_key'] = $response['data']['dataKey'];
               $response_data['napas_key'] = $response['data']['napasKey'];
               $response_data['api_operation'] = $response['data']['api_operation'];

               if ($this->purchaseOtpNapasResponseRepository->create($response_data)) {
                   return $this->actionSuccess($input, $response);
               } else {
                   return $this->actionError('save response error');
               }

           } else {
               $response_data['status'] = $response['status'];
               $response_data['error_code'] = $response['error_code'];
               $response_data['error_data']=json_encode($response['data']);
               $this->purchaseOtpNapasResponseRepository->create($response_data);
               return $this->actionError('<strong>Has errors!</strong> Check Response Index for more detail.');
           }
       }

        Flash::success('Purchase Otp Napas Request saved successfully.');

        return redirect(route('purchaseOtpNapasRequests.index'));
    }

    /**
     * Display the specified PurchaseOtpNapasRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchaseOtpNapasRequest = $this->purchaseOtpNapasRequestRepository->find($id);

        if (empty($purchaseOtpNapasRequest)) {
            Flash::error('Purchase Otp Napas Request not found');

            return redirect(route('purchaseOtpNapasRequests.index'));
        }

        return view('purchase_otp_napas_requests.show')->with('purchaseOtpNapasRequest', $purchaseOtpNapasRequest);
    }

    /**
     * Show the form for editing the specified PurchaseOtpNapasRequest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchaseOtpNapasRequest = $this->purchaseOtpNapasRequestRepository->find($id);

        if (empty($purchaseOtpNapasRequest)) {
            Flash::error('Purchase Otp Napas Request not found');

            return redirect(route('purchaseOtpNapasRequests.index'));
        }

        return view('purchase_otp_napas_requests.edit')->with('purchaseOtpNapasRequest', $purchaseOtpNapasRequest);
    }

    /**
     * Update the specified PurchaseOtpNapasRequest in storage.
     *
     * @param int $id
     * @param UpdatePurchaseOtpNapasRequestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOtpNapasRequestRequest $request)
    {
        $purchaseOtpNapasRequest = $this->purchaseOtpNapasRequestRepository->find($id);

        if (empty($purchaseOtpNapasRequest)) {
            Flash::error('Purchase Otp Napas Request not found');

            return redirect(route('purchaseOtpNapasRequests.index'));
        }

        $purchaseOtpNapasRequest = $this->purchaseOtpNapasRequestRepository->update($request->all(), $id);

        Flash::success('Purchase Otp Napas Request updated successfully.');

        return redirect(route('purchaseOtpNapasRequests.index'));
    }

    /**
     * Remove the specified PurchaseOtpNapasRequest from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseOtpNapasRequest = $this->purchaseOtpNapasRequestRepository->find($id);

        if (empty($purchaseOtpNapasRequest)) {
            Flash::error('Purchase Otp Napas Request not found');

            return redirect(route('purchaseOtpNapasRequests.index'));
        }

        $this->purchaseOtpNapasRequestRepository->delete($id);

        Flash::success('Purchase Otp Napas Request deleted successfully.');

        return redirect(route('purchaseOtpNapasRequests.index'));
    }
    private function doSendRequest($api, $params)
    {
        $checksum = $this->doMakeChecksum($params);
        $post_field_array = [
            'fnc' => 'PURCHASE_OTP',
            'data' => json_encode($params),
            'checksum' => $checksum,
            'channel_name' => 'NAPAS_PAYMENT_V3',
            'pg_user_code' => 'NL'
        ];
        $post_field_str = json_encode($post_field_array);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $api,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post_field_str,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic TkxAMjAxNzowMjkwZjE0Y2Y4YzRmYjRjMzhkZWVmODQ3OWNhYjY5Yg==',
                ': ',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    private function doMakeChecksum($params)
    {

        $auth_key = '04392bb24a98c047dce89046f08ad188';
        $params_str = json_encode($params);
        $params_str .= $auth_key;
        return md5($params_str);
    }

    private function actionSuccess($request, $response)
    {
        return view('purchase_otp_napas_requests.success', [
            'request' => $request,
            'response' => $response
        ]);
    }

    public function actionResult($result = 'this is some result')
    {
        return view('purchase_otp_napas_requests.result', [
            'result' => $result
        ]);
    }

    private function actionError($msg = 'sum ting wong')
    {

        return view('purchase_otp_napas_requests.error', [
            'msg' => $msg,
        ]);
    }
}
