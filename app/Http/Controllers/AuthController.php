<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Responses\LoginResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request): LoginResponse
    {
        $credentials = $request->only('login', 'password');

        if ($token = auth()->attempt($credentials)) {
            return LoginResponse::ok($token);
        }

        return LoginResponse::error();
    }
}
