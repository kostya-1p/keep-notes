<?php

namespace App\Repository\User;

use App\Data\UserData;

interface UserRepositoryInterface
{
    public function store(UserData $user, string $password): UserData;
}
