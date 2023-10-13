<?php

namespace App\Services\Notes;

use App\Data\NoteDataInterface;
use App\Data\TodoData;
use App\Exceptions\NoteCreateException;
use App\Repository\NoteRepositoryInterface;

class TodoNoteService implements NoteServiceInterface
{
    public function __construct(protected NoteRepositoryInterface $noteRepository)
    {
    }

    public function createNote(NoteDataInterface $noteData): void
    {
        if (!$this->containsTodos($noteData->getContent())) {
            throw new NoteCreateException('Invalid note content!');
        }

        if (
            (is_null($noteData->getTitle()) || $noteData->getTitle() === '')
            && (empty($noteData->getContent()) || $this->hasEachEmptyText($noteData->getContent()))
        ) {
            throw new NoteCreateException('Empty note discarded');
        }
    }

    private function containsTodos(array $todos): bool
    {
        foreach ($todos as $todo) {
            if (!($todo instanceof TodoData)) {
                return false;
            }
        }
        return true;
    }

    private function hasEachEmptyText(array $todos): bool
    {
        $emptyCount = array_reduce($todos, function (int $carry, TodoData $item): int {
            if ($item->text === '' || is_null($item->text)) {
                $carry++;
            }
            return $carry;
        }, 0);

        return $emptyCount === count($todos);
    }
}
