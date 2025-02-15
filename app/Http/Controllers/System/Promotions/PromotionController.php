<?php

namespace App\Http\Controllers\System\Promotions;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::get();
        return response()->json($promotions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'salary_increase_percentage' => 'nullable'
        ]);
        $promotion = Promotion::create([
            'employee_id' => $request->employee_id,
            'department_id' => $request->department_id,
            'salary_increase_percentage' => .10,
        ]);
        return response()->json([
            "message" => "Promotion Created Successfuly!",
            "promotion" => $promotion
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = Promotion::find($id);
        return response()->json($promotion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'employee_id' => 'nullable|exists:employees,id',
            'department_id' => 'required|exists:departments,id',
            'salary_increase_percentage' => 'nullable'
        ]);
        $promotion = Promotion::find($id);
        $promotion->update([
            'employee_id' => $request->employee_id,
            'department_id' => $request->department_id,
            'salary_increase_percentage' =>  .10,
        ]);
        return response()->json([
            "message" => "Promotion Updated Successfuly!",
            "promotion" => $promotion
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return response()->json([
            "message" => "Promotion Deleted Successfuly!"
        ]);
    }
}
