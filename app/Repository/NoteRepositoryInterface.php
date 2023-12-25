<?php

namespace App\Repository;

use App\Data\NoteDataInterface;
use Spatie\LaravelData\DataCollection;

interface NoteRepositoryInterface
{
    public function store(NoteDataInterface $noteData): void;

    public function getAll(): DataCollection;
}
