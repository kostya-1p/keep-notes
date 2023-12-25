<?php

namespace App\Repository;

use App\Data\DefaultNoteData;
use App\Data\NoteDataInterface;
use App\Models\DefaultNote;
use Spatie\LaravelData\DataCollection;

class DefaultNoteDatabaseRepository implements NoteRepositoryInterface
{
    public function store(NoteDataInterface $noteData): void
    {
        DefaultNote::query()->create($this->prepareNoteData($noteData));
    }

    private function prepareNoteData(NoteDataInterface $noteData): array
    {
        $text = empty($noteData->getContent()) ? null : $noteData->getContent()[0];

        return [
            'title' => $noteData->getTitle(),
            'text' => $text,
            'user_id' => $noteData->getUserId(),
        ];
    }

    /** @return DataCollection<DefaultNoteData> */
    public function getAll(): DataCollection
    {
        return DefaultNoteData::collection(DefaultNote::all());
    }
}
