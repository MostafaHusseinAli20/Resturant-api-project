<?php

namespace App\Http\Controllers\System\Payments;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Payments\PaymentRequest;
use App\Services\Payments\PaymentService;

class PaymentController extends Controller
{
    private $paymentServeice;
    public function __construct(PaymentService $paymentServeice)
    {
        $this->paymentServeice = $paymentServeice;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->paymentServeice->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        return $this->paymentServeice->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->paymentServeice->show($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->paymentServeice->destroy($id);
    }

    public function forceDestroy(string $id)
    {
        return $this->paymentServeice->forceDestroy($id);
    }
}
