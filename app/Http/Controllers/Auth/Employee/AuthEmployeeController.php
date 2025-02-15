<?php

namespace App\Http\Controllers\Auth\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Employee\AuthEmployeeRequest;
use App\Models\Employee;
use App\Services\AuthEmployee\LoginService;
use App\Services\AuthEmployee\RegisterService;
use Illuminate\Http\Request;

class AuthEmployeeController extends Controller
{
    // User registration
    public function register(AuthEmployeeRequest $request)
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
