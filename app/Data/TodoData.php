<?php

namespace App\Data;

use App\Models\Todo;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class TodoData extends Data
{
    public function __construct(
        public ?int $id,
        public int $position,
        public bool $checked,
        public ?string $text,
        public bool $subtask,
        public ?int $todoNoteId,
        public TodoNoteData|Lazy|null $todoNote,
    ) {
    }

    public static function fromModel(Todo $todo): self
    {
        return new self(
            $todo->id,
            $todo->position,
            $todo->checked,
            $todo->text,
            $todo->subtask,
            $todo->todo_note_id,
            Lazy::create(fn() => TodoNoteData::from($todo->note)),
        );
    }
}
