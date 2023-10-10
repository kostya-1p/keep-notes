<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class TodoData extends Data
{
    public function __construct(
        public bool $checked,
        public string $text,
        public bool $subtask,
    ) {
    }
}
