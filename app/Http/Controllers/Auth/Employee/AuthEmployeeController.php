<?php

namespace App\Http\Controllers\Auth\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Employee\AuthEmployeeRequest;
use App\Services\AuthEmployee\LoginService;
use App\Services\AuthEmployee\RegisterService;
use Illuminate\Http\Request;

class AuthEmployeeController extends Controller
{
    private $loginEmployeeService;
    private $registerEmployeeService;

    public function __construct(
        LoginService $loginEmployeeService, 
        RegisterService $registerEmployeeService
        )
    {
        $this->loginEmployeeService = $loginEmployeeService;
        $this->registerEmployeeService = $registerEmployeeService;
    }
    // User registration
    public function register(AuthEmployeeRequest $request)
    {
       return $this->registerEmployeeService->register($request);
    }

    // User login
    public function login(Request $request)
    {
       return $this->loginEmployeeService->login($request);
    }

    // Get authenticated user
    public function getUser()
    {
       return $this->loginEmployeeService->getUser();
    }

    // User logout
    public function logout()
    {
        return $this->loginEmployeeService->logout();
    }
}
