<?php

namespace App\Http\Controllers\System\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Orders\OrderStoreReqest;
use App\Http\Requests\System\Orders\OrderUpdateReqest;
use App\Repositories\Orders\OrderRepository;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new OrderRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreReqest $request)
    {
        return (new OrderRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new OrderRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderUpdateReqest $request, string $id)
    {
        return (new OrderRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new OrderRepository())->destroy($id);
    }

    public function showCustomerOrders()
    {
        return (new OrderRepository())->showCustomerOrders();
    }
}
