<?php

namespace App\Services\Notes;

use App\Enum\NoteType;

class NoteServiceFactory
{
    public function getNoteService(NoteType $type): NoteServiceInterface
    {
        return match ($type) {
            NoteType::Default => app(DefaultNoteService::class),
            NoteType::Todo => app(TodoNoteService::class),
        };
    }
}
