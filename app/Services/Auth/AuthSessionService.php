<?php

namespace App\Services\Auth;

use App\Data\Auth\LoginData;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AuthSessionService implements AuthServiceInterface
{
    public function login(LoginData $loginData): bool
    {
        $credentials = $this->getUserCredentials($loginData);

        if ($isLogged = Auth::attempt($credentials, true)) {
            request()->session()->regenerate();
        }
        return $isLogged;
    }

    private function validate(LoginData $loginData): void
    {
        if (
            (is_null($loginData->username) && is_null($loginData->email))
            || (!is_null($loginData->username) && !is_null($loginData->email))
        ) {
            throw new AuthenticationException('Invalid credentials state!');
        }
    }

    private function getUserCredentials(LoginData $loginData): array
    {
        $this->validate($loginData);

        $credentials = ['password' => $loginData->password];

        if (!is_null($loginData->username)) {
            $credentials['username'] = $loginData->username;
            return $credentials;
        }

        $credentials['email'] = $loginData->email;
        return $credentials;
    }
}
