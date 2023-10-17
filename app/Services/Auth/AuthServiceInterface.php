<?php

namespace App\Services\Auth;

use App\Data\Auth\LoginData;

interface AuthServiceInterface
{
    public function login(LoginData $loginData): bool;
}
