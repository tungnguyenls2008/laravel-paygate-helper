<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMerchantOrderResultRequest;
use App\Http\Requests\UpdateMerchantOrderResultRequest;
use App\Repositories\MerchantOrderResultRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MerchantOrderResultController extends AppBaseController
{
    /** @var  MerchantOrderResultRepository */
    private $merchantOrderResultRepository;

    public function __construct(MerchantOrderResultRepository $merchantOrderResultRepo)
    {
        $this->merchantOrderResultRepository = $merchantOrderResultRepo;
    }

    /**
     * Display a listing of the MerchantOrderResult.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $merchantOrderResults = $this->merchantOrderResultRepository->orderBy('created_at', 'DESC')->paginate(10);

        return view('merchant_order_results.index')
            ->with('merchantOrderResults', $merchantOrderResults);
    }

    /**
     * Show the form for creating a new MerchantOrderResult.
     *
     * @return Response
     */
    public function create()
    {
        return view('merchant_order_results.create');
    }

    /**
     * Store a newly created MerchantOrderResult in storage.
     *
     * @param CreateMerchantOrderResultRequest $request
     *
     * @return Response
     */
    public function store(CreateMerchantOrderResultRequest $request)
    {
        $input = $request->all();

        $merchantOrderResult = $this->merchantOrderResultRepository->create($input);

        Flash::success('Merchant Order Result saved successfully.');

        return redirect(route('merchantOrderResults.index'));
    }

    /**
     * Display the specified MerchantOrderResult.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $merchantOrderResult = $this->merchantOrderResultRepository->find($id);

        if (empty($merchantOrderResult)) {
            Flash::error('Merchant Order Result not found');

            return redirect(route('merchantOrderResults.index'));
        }

        return view('merchant_order_results.show')->with('merchantOrderResult', $merchantOrderResult);
    }

    /**
     * Show the form for editing the specified MerchantOrderResult.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $merchantOrderResult = $this->merchantOrderResultRepository->find($id);

        if (empty($merchantOrderResult)) {
            Flash::error('Merchant Order Result not found');

            return redirect(route('merchantOrderResults.index'));
        }

        return view('merchant_order_results.edit')->with('merchantOrderResult', $merchantOrderResult);
    }

    /**
     * Update the specified MerchantOrderResult in storage.
     *
     * @param int $id
     * @param UpdateMerchantOrderResultRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMerchantOrderResultRequest $request)
    {
        $merchantOrderResult = $this->merchantOrderResultRepository->find($id);

        if (empty($merchantOrderResult)) {
            Flash::error('Merchant Order Result not found');

            return redirect(route('merchantOrderResults.index'));
        }

        $merchantOrderResult = $this->merchantOrderResultRepository->update($request->all(), $id);

        Flash::success('Merchant Order Result updated successfully.');

        return redirect(route('merchantOrderResults.index'));
    }

    /**
     * Remove the specified MerchantOrderResult from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $merchantOrderResult = $this->merchantOrderResultRepository->find($id);

        if (empty($merchantOrderResult)) {
            Flash::error('Merchant Order Result not found');

            return redirect(route('merchantOrderResults.index'));
        }

        $this->merchantOrderResultRepository->delete($id);

        Flash::success('Merchant Order Result deleted successfully.');

        return redirect(route('merchantOrderResults.index'));
    }
}
