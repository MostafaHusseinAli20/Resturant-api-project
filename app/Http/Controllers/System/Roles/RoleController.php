<?php

namespace App\Http\Controllers\System\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Roles\RoleRequest;
use App\Repositories\Roles\RoleRepository;

class RoleController extends Controller
{
    private $roleRepo;
    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->roleRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(){
        return $this->roleRepo->create();
    }

    public function store(RoleRequest $request)
    {
        return $this->roleRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->roleRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        return $this->roleRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->roleRepo->store($id);
    }
}
