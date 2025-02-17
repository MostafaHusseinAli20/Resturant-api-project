<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\AuthCustomerRequest;
use App\Services\AuthCustomer\LoginService;
use App\Services\AuthCustomer\RegisterService;
use Illuminate\Http\Request;

class AuthCustomerController extends Controller
{
    private $loginCustomerService;
    private $registerCustomerService;

    public function __construct(
        LoginService $loginCustomerService, 
        RegisterService $registerCustomerService
        )
    {
        $this->loginCustomerService = $loginCustomerService;
        $this->registerCustomerService = $registerCustomerService;
    }
    // User registration
    public function register(AuthCustomerRequest $request)
    {
        return $this->registerCustomerService->register($request);
    }

    // User login
    public function login(Request $request)
    {
        return $this->loginCustomerService->login($request);
    }

    // Get authenticated user
    public function getUser()
    {
        return $this->loginCustomerService->getUser();
    }

    // User logout
    public function logout()
    {
        return $this->loginCustomerService->logout();
    }
}