<?php

namespace App\Repositories\Tables;

use App\Models\Table;

class TableRepository
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::get();
        return response()->json($tables);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $table = Table::create($request->all());
        return response()->json([
            'message' => 'Table Created Successfuly!',
            'table' => $table
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = Table::find($id);
        return response()->json($table);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
        $table = Table::find($id);
        $table->update($request->all());
        return response()->json([
            'message' => 'Table Updated Successfuly!',
            'table' => $table
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::find($id);
        $table->delete();
        return response()->json([
            'message' => 'Table Deleted Successfuly'
        ]);
    }
}
