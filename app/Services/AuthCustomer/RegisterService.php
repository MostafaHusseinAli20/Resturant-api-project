<?php

namespace App\Services\AuthCustomer;

use App\Interfaces\Auth\RegisterInterface;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterService implements RegisterInterface
{
    public function register($request)
    {
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }

        $customer = Customer::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($customer);

        return response()->json(compact('customer','token'), 201);
    }

}