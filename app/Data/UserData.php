<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UserData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $email,
        public readonly ?Carbon $emailVerifiedAt,
        public readonly ?Carbon $createdAt,
        public readonly ?Carbon $updatedAt,
    ) {
    }
}
