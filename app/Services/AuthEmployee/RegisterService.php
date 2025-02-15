<?php

namespace App\Services\AuthEmployee;

use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterService{
    // User registration
    public function register($request)
    {
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }

        $employee = Employee::create(
            $request->all(),
            Hash::make($request->get('password')),
        );

        $token = JWTAuth::fromUser($employee);

        return response()->json(compact('employee','token'), 201);
    }

}