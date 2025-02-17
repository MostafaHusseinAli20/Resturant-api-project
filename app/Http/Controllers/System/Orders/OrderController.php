<?php

namespace App\Http\Controllers\System\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Orders\OrderStoreReqest;
use App\Http\Requests\System\Orders\OrderUpdateReqest;
use App\Repositories\Orders\OrderRepository;

class OrderController extends Controller
{
    private $orderRepo;
    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->orderRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreReqest $request)
    {
        return $this->orderRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->orderRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderUpdateReqest $request, string $id)
    {
        return $this->orderRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->orderRepo->destroy($id);
    }

    public function showCustomerOrders()
    {
        return $this->orderRepo->showCustomerOrders();
    }
}
