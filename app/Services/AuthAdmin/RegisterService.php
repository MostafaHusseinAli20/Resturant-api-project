<?php

namespace App\Services\AuthAdmin;

use App\Interfaces\Auth\RegisterInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterService implements RegisterInterface
{
    public function register($request)
    {
        $admin = Admin::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'roles_name' => $request->get('roles_name'),
        ]);

        $token = JWTAuth::fromUser($admin);

        return response()->json(compact('admin','token'), 201);
    } 
}