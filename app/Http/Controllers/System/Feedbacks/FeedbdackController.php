<?php

namespace App\Http\Controllers\System\Feedbacks;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbdackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::get();
        return response()->json($feedbacks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'order_id' => 'required|exists:orders,id',
            'rate' => 'required|integer',
            'comments' => 'nullable|string'
        ]);

        $feedback = Feedback::create([
            'customer_id' => auth('customer')->user()->id,
            'order_id' => $request->order_id,
            'rate' => $request->rate,
            'comments' => $request->comments
        ]);

        return response()->json([
            "message" => "Feedback Created Successfuly",
            "feedback" => $feedback
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feedback = Feedback::find($id);
        return response()->json($feedback);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'order_id' => 'required|exists:orders,id',
            'rate' => 'required|integer',
            'comments' => 'nullable|string'
        ]);
        $feedback = Feedback::find($id);
        $feedback->update([
            'customer_id' => auth('customer')->user()->id,
            'order_id' => $request->order_id,
            'rate' => $request->rate,
            'comments' => $request->comments
        ]);

        return response()->json([
            "message" => "Feedback Created Successfuly",
            "feedback" => $feedback
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback = Feedback::find($id);
        if($feedback && $feedback->customer_id == auth('customer')->user()->id){
            $feedback->delete();

            return response()->json([
                "message" => "Feedback Deleted Successfully"
            ]);
        }
        return response()->json([
            "message" => "Feedback Not Found or Unauthorized"
        ], 403);
    }
}
