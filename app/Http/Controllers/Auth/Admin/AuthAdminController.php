<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\AuthAdminRequest;
use App\Services\AuthAdmin\LoginService;
use App\Services\AuthAdmin\RegisterService;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    private $loginAdminService;
    private $registerAdminService;
    public function __construct(
        LoginService $loginAdminService,
        RegisterService $registerAdminService
    ) {
        $this->loginAdminService = $loginAdminService;
        $this->registerAdminService = $registerAdminService;
    }
    // User registration
    public function register(AuthAdminRequest $request)
    {
        return $this->registerAdminService->register($request);
    }

    // User login
    public function login(Request $request)
    {
        return $this->loginAdminService->login($request);
    }

    // Get authenticated user
    public function getUser()
    {
        return $this->loginAdminService->getUser();
    }

    // User logout
    public function logout()
    {
        return $this->loginAdminService->logout();
    }
}
