<?php

namespace App\Services\Payments;

use App\Interfaces\System\Services\Payments\PaymentInterface;
use App\Models\Order;
use App\Models\Payment;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Facades\PayPal;

class PaymentService implements PaymentInterface
{
    protected $provider;
    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $this->provider->getAccessToken();
    }

    public function createPayment($amount)
    {
        $order = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $amount,
                    ]
                ]
            ],
            'application_context' => [
                'return_url' => route('paypal.success'),
                'cancel_url' => route('paypal.cancel'),
            ]
        ];

        return $this->provider->createOrder($order);
    }

    public function capturePayment($orderId)
    {
        return $this->provider->capturePaymentOrder($orderId);
    }

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