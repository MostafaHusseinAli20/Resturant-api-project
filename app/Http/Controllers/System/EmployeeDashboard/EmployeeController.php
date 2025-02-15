<?php

namespace App\Http\Controllers\System\EmployeeDashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email',
            'password' => 'required|min:8',
            "department_id" => "required",
            "position" => "required",
            "salary" => "required",
            'phone_number' => 'required',
            "hire_date" => "nullable",
            'address' => 'nullable',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

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
