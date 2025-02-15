<?php

namespace App\Repositories\Categories;

use App\Models\Category;

class CategoryRepository
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            "message" => "success",
            "categories" => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        // if ($validator->fails()){
        //     return response()->json(['erorr' => $validator->errors()],0);
        // }

        $category = Category::create($request->all());

        return response()->json([
            "message" => "Category Added Successfuly!",
            "category" => $category
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return response()->json([
            "message" => "success",
            "category" => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
        //     if ($validator->fails()){
        //         return response()->json(["erorr"=> $validator->errors()],0);
        //     }

        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json([
            "message" => "Category Updated Successfuly!",
            "category" => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(["message" => "Category Deleted Successfuly!"], 200);
    }
}
