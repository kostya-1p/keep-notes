<?php

namespace App\Data;

use App\Models\DefaultNote;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

#[MapName(SnakeCaseMapper::class)]
class DefaultNoteData extends Data implements NoteDataInterface
{
    public function __construct(
        public ?int $id,
        public ?string $title,
        public ?string $text,
        public int $userId,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d')]
        public ?Carbon $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'Y-m-d')]
        public ?Carbon $updatedAt,
        public UserData|Lazy|null $user,
    ) {
    }

    public static function fromModel(DefaultNote $note): self
    {
        return new self(
            $note->id,
            $note->title,
            $note->text,
            $note->user_id,
            $note->created_at,
            $note->updated_at,
            Lazy::create(fn() => UserData::from($note->user)),
        );
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getContent(): array
    {
        return (is_null($this->text) || $this->text === '') ? [] : [$this->text];
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
