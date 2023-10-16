<?php

namespace App\Http\Controllers;

use App\Data\LoginData;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\AuthServiceInterface;

class AuthController extends Controller
{
    public function __construct(protected AuthServiceInterface $authService)
    {
    }

    public function login(LoginRequest $request)
    {
        $loginData = LoginData::from($request->validated());
        $isLogged = $this->authService->login($loginData);
        return redirect(route($isLogged ? 'main' : 'login.page'));
    }

    public function getLoginPage()
    {
    }
}
