<?php

namespace App\Repositories\Empolyees;

use App\Interfaces\System\Repositories\Customes\CrudRepoEmployeeInterface;
use App\Models\Employee;

class EmployeeRepository implements CrudRepoEmployeeInterface
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::get();
        return response()->json([
            "employees" => $employees
        ]);
    }
    
    // public function indexEmployee()
    // {
    //     $employees = Employee::find(auth()->id());
    //     return response()->json([
    //         "employees" => $employees
    //     ]);
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return response()->json([
            "employee" => $employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, $id)
    {
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }
        $employee = Employee::find($id);
        $employee->update(
            $request->all()
        );
        return response()->json([
            "message" => "Employee Updated Successfuly",
            "employee" => $employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json([
            "message" => "Employee Deleted Successfuly"
        ]);
    }
}