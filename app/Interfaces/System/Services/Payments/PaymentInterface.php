<?php

namespace App\Interfaces\System\Services\Payments;

interface PaymentInterface
{
    public function index();
    public function store($request);
    public function show(string $id);
    public function destroy(string $id);
    public function forceDestroy(string $id);
    public function createPayment($amount);
    public function capturePayment($orderId);
}