<?php

namespace App\Data;

interface NoteDataInterface
{
    public function getTitle(): ?string;

    public function getContent(): array;

    public function getUserId(): int;
}
