<?php

namespace App\Services\Auth;

use App\Data\LoginData;

interface AuthServiceInterface
{
    public function login(LoginData $loginData): bool;
}
