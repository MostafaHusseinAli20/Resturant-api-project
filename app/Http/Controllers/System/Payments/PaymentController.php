<?php

namespace App\Http\Controllers\System\Payments;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_status' => 'required',
            'payment_method' => 'required'
        ]);
        
        $customer = auth('customer')->user();

        $order = Order::where('id', $request->order_id)
                    ->where('customer_id', $customer->id)
                    ->first();

        if (!$order) {
            return response()->json([
                "error" => "Unauthorized! You can only pay for your own orders."
            ], 403);
        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
