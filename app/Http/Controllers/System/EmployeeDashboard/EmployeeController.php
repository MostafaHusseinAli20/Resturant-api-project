<?php

namespace App\Http\Controllers\System\EmployeeDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Employee\AuthEmployeeRequest;
use App\Repositories\Empolyees\EmployeeRepository;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new EmployeeRepository())->index();
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return (new EmployeeRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthEmployeeRequest $request, $id)
    {
        return (new EmployeeRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return (new EmployeeRepository())->destroy($id);
    }
}
