<?php

namespace App\Services\Notes;

use App\Data\NoteDataInterface;
use App\Exceptions\NoteCreateException;
use App\Repository\NoteRepositoryInterface;

class DefaultNoteService implements NoteServiceInterface
{
    public function __construct(protected NoteRepositoryInterface $noteRepository)
    {
    }

    public function createNote(NoteDataInterface $noteData): void
    {
        if ((is_null($noteData->getTitle()) || $noteData->getTitle() === '') && empty($noteData->getContent())) {
            throw new NoteCreateException('Empty note discarded');
        }

        if (!empty($noteData->getContent()) && !is_string($noteData->getContent()[0])) {
            throw new NoteCreateException('Invalid note content!');
        }

        $this->noteRepository->store($noteData);
    }
}
