<?php

namespace App\Http\Controllers\System\EmployeeDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Employee\AuthEmployeeRequest;
use App\Repositories\Empolyees\EmployeeRepository;

class EmployeeController extends Controller
{
    private $employeeRepo;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->employeeRepo->index();
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->employeeRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthEmployeeRequest $request, $id)
    {
        return $this->employeeRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->employeeRepo->destroy($id);
    }
}
