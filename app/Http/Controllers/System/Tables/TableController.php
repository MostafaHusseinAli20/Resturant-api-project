<?php

namespace App\Http\Controllers\System\Tables;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'table_number' => 'required|integer',
            'seating_capacity' => 'required|integer',
            'location' => 'required|string'
        ]);
        $table = Table::create($data);
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
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'table_number' => 'required|integer',
            'seating_capacity' => 'required|integer',
            'location' => 'required|string'
        ]);
        $table = Table::find($id);
        $table->update($data);
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
