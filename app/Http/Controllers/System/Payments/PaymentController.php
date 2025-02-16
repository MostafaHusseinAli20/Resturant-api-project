<?php

namespace App\Http\Controllers\System\Payments;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Payments\PaymentRequest;
use App\Services\Payments\PaymentService;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return (new PaymentService())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        return (new PaymentService())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new PaymentService())->show($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new PaymentService())->destroy($id);
    }

    public function forceDestroy(string $id)
    {
        return (new PaymentService())->forceDestroy($id);
    }
}
