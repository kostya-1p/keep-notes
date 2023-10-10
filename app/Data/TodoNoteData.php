<?php

namespace App\Data;

use App\Models\TodoNote;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class TodoNoteData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $title,
        public int $userId,
        public readonly ?Carbon $createdAt,
        public readonly ?Carbon $updatedAt,
        #[DataCollectionOf(TodoData::class)]
        public DataCollection|Lazy|null $todos,
        public UserData|Lazy $user,
    ) {
    }

    public static function fromModel(TodoNote $note): self
    {
        return new self(
            $note->id,
            $note->title,
            $note->user_id,
            $note->created_at,
            $note->updated_at,
            Lazy::create(fn() => TodoData::collection($note->todos)),
            Lazy::create(fn() => UserData::from($note->user)),
        );
    }
}
