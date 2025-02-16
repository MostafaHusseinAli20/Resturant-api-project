<?php

namespace App\Http\Controllers\System\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Roles\RoleRequest;
use App\Repositories\Roles\RoleRepository;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth:admin'])->only(['create', 'store']);
    //     $this->middleware(['auth:admin'])->only('index');
    //     $this->middleware(['auth:admin'])->only(['update']);
    //     $this->middleware(['auth:admin'])->only('destroy');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new RoleRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(){
        return (new RoleRepository())->create();
    }

    public function store(RoleRequest $request)
    {
        return (new RoleRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new RoleRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        return (new RoleRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new RoleRepository())->destroy($id);
    }
}
