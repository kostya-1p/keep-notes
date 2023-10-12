<?php

namespace App\Repository;

use App\Data\NoteDataInterface;
use App\Models\TodoNote;

class TodoNoteDatabaseRepository implements NoteRepositoryInterface
{
    public function store(NoteDataInterface $noteData): void
    {
        $todoNote = TodoNote::query()->create([
            'title' => $noteData->getTitle(),
            'user_id' => $noteData->getUserId(),
        ]);

        foreach ($noteData->getContent() as $todo) {
            $todoNote->todos()->create($todo->toArray());
        }
    }
}
