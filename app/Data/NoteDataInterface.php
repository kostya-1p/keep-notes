<?php

namespace App\Data;

interface NoteDataInterface
{
    public function getTitle(): ?string;

    /** @return string[]|TodoData[] */
    public function getContent(): array;

    public function getUserId(): int;
}
