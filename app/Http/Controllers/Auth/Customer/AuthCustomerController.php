<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\AuthCustomerRequest;
use App\Models\Customer;
use App\Services\AuthCustomer\LoginService;
use App\Services\AuthCustomer\RegisterService;
use Illuminate\Http\Request;

class AuthCustomerController extends Controller
{
    // User registration
    public function register(AuthCustomerRequest $request)
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