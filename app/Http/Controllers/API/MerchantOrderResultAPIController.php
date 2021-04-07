<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMerchantOrderResultAPIRequest;
use App\Http\Requests\API\UpdateMerchantOrderResultAPIRequest;
use App\Models\MerchantOrderResult;
use App\Repositories\MerchantOrderResultRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MerchantOrderResultController
 * @package App\Http\Controllers\API
 */

class MerchantOrderResultAPIController extends AppBaseController
{
    /** @var  MerchantOrderResultRepository */
    private $merchantOrderResultRepository;

    public function __construct(MerchantOrderResultRepository $merchantOrderResultRepo)
    {
        $this->merchantOrderResultRepository = $merchantOrderResultRepo;
    }

    /**
     * Display a listing of the MerchantOrderResult.
     * GET|HEAD /merchantOrderResults
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $merchantOrderResults = $this->merchantOrderResultRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($merchantOrderResults->toArray(), 'Merchant Order Results retrieved successfully');
    }

    /**
     * Store a newly created MerchantOrderResult in storage.
     * POST /merchantOrderResults
     *
     * @param CreateMerchantOrderResultAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMerchantOrderResultAPIRequest $request)
    {
        $input = $request->all();

        $merchantOrderResult = $this->merchantOrderResultRepository->create($input);

        return $this->sendResponse($merchantOrderResult->toArray(), 'Merchant Order Result saved successfully');
    }

    /**
     * Display the specified MerchantOrderResult.
     * GET|HEAD /merchantOrderResults/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MerchantOrderResult $merchantOrderResult */
        $merchantOrderResult = $this->merchantOrderResultRepository->find($id);

        if (empty($merchantOrderResult)) {
            return $this->sendError('Merchant Order Result not found');
        }

        return $this->sendResponse($merchantOrderResult->toArray(), 'Merchant Order Result retrieved successfully');
    }

    /**
     * Update the specified MerchantOrderResult in storage.
     * PUT/PATCH /merchantOrderResults/{id}
     *
     * @param int $id
     * @param UpdateMerchantOrderResultAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMerchantOrderResultAPIRequest $request)
    {
        $input = $request->all();

        /** @var MerchantOrderResult $merchantOrderResult */
        $merchantOrderResult = $this->merchantOrderResultRepository->find($id);

        if (empty($merchantOrderResult)) {
            return $this->sendError('Merchant Order Result not found');
        }

        $merchantOrderResult = $this->merchantOrderResultRepository->update($input, $id);

        return $this->sendResponse($merchantOrderResult->toArray(), 'MerchantOrderResult updated successfully');
    }

    /**
     * Remove the specified MerchantOrderResult from storage.
     * DELETE /merchantOrderResults/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MerchantOrderResult $merchantOrderResult */
        $merchantOrderResult = $this->merchantOrderResultRepository->find($id);

        if (empty($merchantOrderResult)) {
            return $this->sendError('Merchant Order Result not found');
        }

        $merchantOrderResult->delete();

        return $this->sendSuccess('Merchant Order Result deleted successfully');
    }
}
