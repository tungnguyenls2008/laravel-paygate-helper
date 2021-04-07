<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchaseOtpNapasResponseRequest;
use App\Http\Requests\UpdatePurchaseOtpNapasResponseRequest;
use App\Repositories\PurchaseOtpNapasResponseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PurchaseOtpNapasResponseController extends AppBaseController
{
    /** @var  PurchaseOtpNapasResponseRepository */
    private $purchaseOtpNapasResponseRepository;

    public function __construct(PurchaseOtpNapasResponseRepository $purchaseOtpNapasResponseRepo)
    {
        $this->purchaseOtpNapasResponseRepository = $purchaseOtpNapasResponseRepo;
    }

    /**
     * Display a listing of the PurchaseOtpNapasResponse.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $purchaseOtpNapasResponses = $this->purchaseOtpNapasResponseRepository->orderBy('created_at', 'DESC')->paginate(10);

        return view('purchase_otp_napas_responses.index')
            ->with('purchaseOtpNapasResponses', $purchaseOtpNapasResponses);
    }

    /**
     * Show the form for creating a new PurchaseOtpNapasResponse.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchase_otp_napas_responses.create');
    }

    /**
     * Store a newly created PurchaseOtpNapasResponse in storage.
     *
     * @param CreatePurchaseOtpNapasResponseRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOtpNapasResponseRequest $request)
    {
        $input = $request->all();

        $purchaseOtpNapasResponse = $this->purchaseOtpNapasResponseRepository->create($input);

        Flash::success('Purchase Otp Napas Response saved successfully.');

        return redirect(route('purchaseOtpNapasResponses.index'));
    }

    /**
     * Display the specified PurchaseOtpNapasResponse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchaseOtpNapasResponse = $this->purchaseOtpNapasResponseRepository->find($id);

        if (empty($purchaseOtpNapasResponse)) {
            Flash::error('Purchase Otp Napas Response not found');

            return redirect(route('purchaseOtpNapasResponses.index'));
        }

        return view('purchase_otp_napas_responses.show')->with('purchaseOtpNapasResponse', $purchaseOtpNapasResponse);
    }

    /**
     * Show the form for editing the specified PurchaseOtpNapasResponse.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchaseOtpNapasResponse = $this->purchaseOtpNapasResponseRepository->find($id);

        if (empty($purchaseOtpNapasResponse)) {
            Flash::error('Purchase Otp Napas Response not found');

            return redirect(route('purchaseOtpNapasResponses.index'));
        }

        return view('purchase_otp_napas_responses.edit')->with('purchaseOtpNapasResponse', $purchaseOtpNapasResponse);
    }

    /**
     * Update the specified PurchaseOtpNapasResponse in storage.
     *
     * @param int $id
     * @param UpdatePurchaseOtpNapasResponseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOtpNapasResponseRequest $request)
    {
        $purchaseOtpNapasResponse = $this->purchaseOtpNapasResponseRepository->find($id);

        if (empty($purchaseOtpNapasResponse)) {
            Flash::error('Purchase Otp Napas Response not found');

            return redirect(route('purchaseOtpNapasResponses.index'));
        }

        $purchaseOtpNapasResponse = $this->purchaseOtpNapasResponseRepository->update($request->all(), $id);

        Flash::success('Purchase Otp Napas Response updated successfully.');

        return redirect(route('purchaseOtpNapasResponses.index'));
    }

    /**
     * Remove the specified PurchaseOtpNapasResponse from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseOtpNapasResponse = $this->purchaseOtpNapasResponseRepository->find($id);

        if (empty($purchaseOtpNapasResponse)) {
            Flash::error('Purchase Otp Napas Response not found');

            return redirect(route('purchaseOtpNapasResponses.index'));
        }

        $this->purchaseOtpNapasResponseRepository->delete($id);

        Flash::success('Purchase Otp Napas Response deleted successfully.');

        return redirect(route('purchaseOtpNapasResponses.index'));
    }
}
