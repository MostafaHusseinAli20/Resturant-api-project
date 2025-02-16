<?php

namespace App\Http\Controllers\System\Orders;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            "order_id"=> "required",
            "menu_item_id"=> "required",
            "quantity"=> "required|integer",
            "price"=> "nullable",
            "notes"=> "nullable",
        ]);

        $menuItem = MenuItem::find($request->menu_item_id);

        if (!$menuItem) {
            return response()->json(["message" => "Menu item not found"], 404);
        }

        $order = OrderItem::create([
            "order_id" => $request->order_id,
            'menu_item_id'=> $request->menu_item_id,
            'quantity'=> $request->quantity,
            'price'=> $menuItem->price,
            "notes" => $request->notes,
        ]);
        
        return response()->json([
            "message"=> "Order Item Added Successfuly!",
            "order"=> $order,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = OrderItem::find($id);
        return response()->json($order);
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
