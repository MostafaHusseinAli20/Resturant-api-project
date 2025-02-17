<?php

namespace App\Repositories\Departments;

use App\Interfaces\System\Repositories\CrudRepoInterface;
use App\Models\Department;

class DepartmentRepository implements CrudRepoInterface
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
    public function store($request)
    {
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
    public function update($request, string $id)
    {
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