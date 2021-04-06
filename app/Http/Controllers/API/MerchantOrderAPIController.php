<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMerchantOrderAPIRequest;
use App\Http\Requests\API\UpdateMerchantOrderAPIRequest;
use App\Models\MerchantOrder;
use App\Repositories\MerchantOrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MerchantOrderController
 * @package App\Http\Controllers\API
 */

class MerchantOrderAPIController extends AppBaseController
{
    /** @var  MerchantOrderRepository */
    private $merchantOrderRepository;

    public function __construct(MerchantOrderRepository $merchantOrderRepo)
    {
        $this->merchantOrderRepository = $merchantOrderRepo;
    }

    /**
     * Display a listing of the MerchantOrder.
     * GET|HEAD /merchantOrders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $merchantOrders = $this->merchantOrderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($merchantOrders->toArray(), 'Merchant Orders retrieved successfully');
    }

    /**
     * Store a newly created MerchantOrder in storage.
     * POST /merchantOrders
     *
     * @param CreateMerchantOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMerchantOrderAPIRequest $request)
    {
        $input = $request->all();

        $merchantOrder = $this->merchantOrderRepository->create($input);

        return $this->sendResponse($merchantOrder->toArray(), 'Merchant Order saved successfully');
    }

    /**
     * Display the specified MerchantOrder.
     * GET|HEAD /merchantOrders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MerchantOrder $merchantOrder */
        $merchantOrder = $this->merchantOrderRepository->find($id);

        if (empty($merchantOrder)) {
            return $this->sendError('Merchant Order not found');
        }

        return $this->sendResponse($merchantOrder->toArray(), 'Merchant Order retrieved successfully');
    }

    /**
     * Update the specified MerchantOrder in storage.
     * PUT/PATCH /merchantOrders/{id}
     *
     * @param int $id
     * @param UpdateMerchantOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMerchantOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var MerchantOrder $merchantOrder */
        $merchantOrder = $this->merchantOrderRepository->find($id);

        if (empty($merchantOrder)) {
            return $this->sendError('Merchant Order not found');
        }

        $merchantOrder = $this->merchantOrderRepository->update($input, $id);

        return $this->sendResponse($merchantOrder->toArray(), 'MerchantOrder updated successfully');
    }

    /**
     * Remove the specified MerchantOrder from storage.
     * DELETE /merchantOrders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MerchantOrder $merchantOrder */
        $merchantOrder = $this->merchantOrderRepository->find($id);

        if (empty($merchantOrder)) {
            return $this->sendError('Merchant Order not found');
        }

        $merchantOrder->delete();

        return $this->sendSuccess('Merchant Order deleted successfully');
    }
}
