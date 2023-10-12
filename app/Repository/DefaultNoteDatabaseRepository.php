<?php

namespace App\Repository;

use App\Data\NoteDataInterface;
use App\Models\DefaultNote;

class DefaultNoteDatabaseRepository implements NoteRepositoryInterface
{
    public function store(NoteDataInterface $noteData): void
    {
        $text = empty($noteData->getContent()) ? null : $noteData->getContent()[0];

        [
            'title' => $noteData->getTitle(),
            'text' => $text,
            'user_id' => $noteData->getUserId(),
        ];
        $noteData->getTitle();

        DefaultNote::query()->create();
    }
}
