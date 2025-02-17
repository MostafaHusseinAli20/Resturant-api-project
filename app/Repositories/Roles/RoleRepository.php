<?php

namespace App\Repositories\Roles;
use App\Interfaces\System\Repositories\CrudRepoInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleRepository implements CrudRepoInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(){
        $permissions = Permission::get();
        return response()->json([
            "permissions"=> $permissions
        ]);
    }

    public function store($request)
    {
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }

        $role = Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'admin'
        ]);
        $role->syncPermissions($request->input('permission'));

        return response()->json([
            "message"=> "Role Added Successfuly!",
            "role"=> $role
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }
        $role = Role::find($id);

        $role->update([
            'name' => $request->input('name'),
            'guard_name' => 'admin'
        ]);

         $role->syncPermissions($request->input('permission'));

        return response()->json([
            "message"=> "Role Updated Successfuly!",
            "role"=> $role
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return response()->json([
            'message' => 'Role Deleted Successfuly!',
            ],200);
    }
}