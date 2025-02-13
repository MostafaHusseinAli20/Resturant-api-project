<?php

namespace App\Http\Controllers\System\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::get();
        return response()->json([
            "departments" => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            "name" => 'required',
            "description" => 'nullable',
        ]);
        $department = Department::create($request->all());
        return response()->json([
            "message" => "Department Added Successfuly",
            "department" => $department
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);
        return response()->json([
            "department" => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            "name" => $request->name,
            "description" => $request->description,
        ]);
        $department = Department::findOrFail($id);
        $department->update($request->all());
        return response()->json([
            "message" => "Department Updated Successfuly",
            "department" => $department,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return response()->json([
            "message" => "Department Deleted Successfuly"
        ]);
    }
}
