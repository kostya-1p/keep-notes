<?php

namespace App\Services\Auth;

use App\Data\Auth\LoginData;
use App\Data\UserData;

interface AuthServiceInterface
{
    public function login(LoginData $loginData): bool;

    public function register(UserData $user): bool;
}
