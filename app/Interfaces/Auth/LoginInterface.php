<?php

namespace App\Interfaces\Auth;

interface LoginInterface
{
    public function login($request);
    public function getUser();
    public function logout();
}
