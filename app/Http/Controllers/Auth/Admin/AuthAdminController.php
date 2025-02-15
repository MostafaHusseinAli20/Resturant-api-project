<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\AuthAdminRequest;
use App\Services\AuthAdmin\LoginService;
use App\Services\AuthAdmin\RegisterService;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    // User registration
    public function register(AuthAdminRequest $request)
    {
        return (new RegisterService())->register($request);
    }

    // User login
    public function login(Request $request)
    {
        return (new LoginService())->login($request);
    }

    // Get authenticated user
    public function getUser()
    {
        return (new LoginService())->getUser();
    }

    // User logout
    public function logout()
    {
        return (new LoginService())->logout();
    }
}
