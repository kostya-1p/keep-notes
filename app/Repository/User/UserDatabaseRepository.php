<?php

namespace App\Repository\User;

use App\Data\UserData;
use App\Models\User;

class UserDatabaseRepository implements UserRepositoryInterface
{
    public function store(UserData $user, string $password): UserData
    {
        $userModel = User::query()->create($this->prepareData($user, $password));
        return UserData::from($userModel->fresh());
    }

    private function prepareData(UserData $user, string $password): array
    {
        return array_merge($user->toArray(), ['password' => $password]);
    }
}
