<?php

namespace App\Services\AuthAdmin;

use App\Interfaces\Auth\LoginInterface;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginService implements LoginInterface
{
    public function login($request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = auth('admin')->attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }

            // Get the authenticated user.
            $user = auth('admin')->user();

            // (optional) Attach the role to the token.
            $token = JWTAuth::claims(['role' => $user->role])->fromUser($user);

            return response()->json(compact('token'));
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
    }


    public function getUser()
    {
        try {
            if (! $admin = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'Admin not found'], 404);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Invalid token'], 400);
        }

        return response()->json(compact('admin'));
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}