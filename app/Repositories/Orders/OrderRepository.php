<?php

namespace App\Repositories\Orders;
use App\Interfaces\System\Repositories\CrudRepoInterface;
use App\Models\Order;

class OrderRepository implements CrudRepoInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::get(); // orderBy("created_at","desc")->paginate(10)
        return response()->json([
            "orders" => $orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $order = Order::create([
            'customer_id' => auth('customer')->user()->id,
            'delivery_address' => $request->delivery_address,
            'total_amount' => $request->total_amount,
            'special_instructions' => $request->special_instructions
        ]);
        return response()->json([
            "message" => "Order Added Successfuly!!",
            "order" => $order
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return response()->json([
            "order" => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json([
            "message" => "Order Updated Successfuly!!",
            "order" => $order
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json([
            "message" => "Order Deleted Successfuly!!"
        ]);
    }

    public function showCustomerOrders()
    {
        $orders = Order::where('customer_id', auth('customer')->user()->id)->get();
        return response()->json([
            "orders" => $orders
        ]);
    }
}