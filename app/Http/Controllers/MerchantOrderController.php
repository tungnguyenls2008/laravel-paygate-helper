<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMerchantOrderRequest;
use App\Http\Requests\UpdateMerchantOrderRequest;
use App\Repositories\MerchantOrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MerchantOrderController extends AppBaseController
{
    /** @var  MerchantOrderRepository */
    private $merchantOrderRepository;

    public function __construct(MerchantOrderRepository $merchantOrderRepo)
    {
        $this->merchantOrderRepository = $merchantOrderRepo;
    }

    /**
     * Display a listing of the MerchantOrder.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $merchantOrders = $this->merchantOrderRepository->all();

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
     * @return Response
     */
    public function store(CreateMerchantOrderRequest $request)
    {
        $input = $request->all();

        $merchantOrder = $this->merchantOrderRepository->create($input);

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
}
