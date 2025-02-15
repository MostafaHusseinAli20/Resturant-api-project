<?php

namespace App\Http\Controllers\System\Departments;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Departments\DepartmentRequest;
use App\Repositories\Departments\DepartmentRepository;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new DepartmentRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        return (new DepartmentRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new DepartmentRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, string $id)
    {
        return (new DepartmentRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new DepartmentRepository())->destroy($id);
    }
}
