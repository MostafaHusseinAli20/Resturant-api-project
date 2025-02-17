<?php

namespace App\Repositories\Promotions;

use App\Interfaces\System\Repositories\CrudRepoInterface;
use App\Models\Promotion;

class PromotionRepository implements CrudRepoInterface
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
    public function store($request)
    {
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
    public function update($request, string $id)
    {
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
