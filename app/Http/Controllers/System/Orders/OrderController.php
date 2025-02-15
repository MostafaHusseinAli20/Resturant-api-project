<?php

namespace App\Http\Controllers\System\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
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
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            "delivery_address" => "required",
            "total_amount" => "nullable",
            "special_instructions" => "nullable",
        ]);
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
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(), [
            "customer_id" => "required",
            "status" => "required",
            "total_amount" => "required",
            "delivery_address" => "required",
            "special_instructions" => "nullable",
        ]);
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
