<?php

namespace App\Services\Payments;

use App\Models\Order;
use App\Models\Payment;

class PaymentService
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::get();
        return response()->json($payments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $customer = auth('customer')->user();

        $order = Order::where('id', $request->order_id)
                    ->where('customer_id', $customer->id)
                    ->first();

        $payment = Payment::create([
            'order_id' => $request->order_id,
            'amount' => $order->total_amount,
            'payment_status' => $request->payment_status,
            'payment_method' => $request->payment_method
        ]);
    
        return response()->json([
            "message" => "Payment Added Successfully",
            "payment" => $payment
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::find($id);
        return response()->json($payment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return response()->json([
            "message" => "Payment Go To SoftDelete Successfuly!"
        ]);
    }

    public function forceDestroy(string $id)
    {
        $payment = Payment::withTrashed()->find($id);
        $payment->forceDelete();
        return response()->json([
            "message" => "Payment Deleted Successfuly!"
        ]);
    }
}