<?php

namespace App\Services\Notes;

use App\Data\NoteDataInterface;

interface NoteServiceInterface
{
    public function createNote(NoteDataInterface $noteData): void;
}
