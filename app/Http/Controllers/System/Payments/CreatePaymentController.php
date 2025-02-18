<?php

namespace App\Http\Controllers\System\Payments;

use App\Http\Controllers\Controller;
use App\Services\Payments\PaymentService;

class CreatePaymentController extends Controller
{
    private $paymentServeice;

    public function __construct(PaymentService $paymentServeice)
    {
        $this->paymentServeice = $paymentServeice;
    }

    public function createPayment()
    {
        $amount = 10; // Example amount

        $response = $this->paymentServeice->createPayment($amount);

        if (isset($response['id']) && $response['status'] == 'CREATED') {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return response()->json([
                       "link" => $link['href']
                    ]);
                }
            }
        }

        return response()->json([
            'message' => 'Something went wrong!'
        ]);
    }

    public function success($request)
    {
        $response = $this->paymentServeice->capturePayment($request->query('token'));

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            return response()->json([
                'message' => 'success',
                'response' => $response,
            ]);
        }

        return response()->json([
            'message' => 'erorr',
        ], 401);
    }

    public function cancel()
    {
        return response()->json([
            'message' => 'payment cancel!'
        ]);
    }
}
