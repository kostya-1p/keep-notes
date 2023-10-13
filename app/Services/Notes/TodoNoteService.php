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

        if (!$this->isValidTodoPositions($this->getPositionsFrequency($noteData->getContent()))) {
            throw new NoteCreateException('Note positions is not valid!');
        }

        if ($this->getFirstPositionTodo($noteData->getContent())?->subtask) {
            throw new NoteCreateException('First note can not be a subtask!');
        }

        $this->noteRepository->store($noteData);
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

    /** @param TodoData[] $todos */
    private function getPositionsFrequency(array $todos): array
    {
        if (empty($todos)) {
            return [];
        }

        $highestPosition = max(array_map(fn(TodoData $todo): int => $todo->position, $todos));
        $frequency = [];
        foreach (range(1, $highestPosition) as $position) {
            $frequency[$position] = 0;
        }

        foreach ($todos as $todo) {
            if (!array_key_exists($todo->position, $frequency)) {
                $frequency[$todo->position] = 1;
            } else {
                $frequency[$todo->position]++;
            }
        }

        return $frequency;
    }

    private function isValidTodoPositions(array $frequency): bool
    {
        foreach ($frequency as $item) {
            if ($item !== 1) {
                return false;
            }
        }
        return true;
    }

    /** @param TodoData[] $todos */
    private function getFirstPositionTodo(array $todos): ?TodoData
    {
        if (empty($todos)) {
            return null;
        }

        foreach ($todos as $todo) {
            if ($todo->position === 1) {
                return $todo;
            }
        }
        throw new NoteCreateException('Invalid note positions!');
    }
}
