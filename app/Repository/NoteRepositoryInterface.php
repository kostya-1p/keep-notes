<?php

namespace App\Repository;

use App\Data\NoteDataInterface;

interface NoteRepositoryInterface
{
    public function store(NoteDataInterface $noteData): void;
}
