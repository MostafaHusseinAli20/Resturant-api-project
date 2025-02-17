<?php

namespace App\Http\Controllers\System\Departments;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Departments\DepartmentRequest;
use App\Repositories\Departments\DepartmentRepository;

class DepartmentController extends Controller
{
    private $departmentRepo;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepo = $departmentRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->departmentRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        return $this->departmentRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->departmentRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, string $id)
    {
        return $this->departmentRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->departmentRepo->destroy($id);
    }
}
