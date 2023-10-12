<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Todo
 *
 * @property int $id
 * @property int $checked
 * @property string $text
 * @property int $subtask
 * @property int $todo_note_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TodoNote|null $note
 * @method static \Illuminate\Database\Eloquent\Builder|Todo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereChecked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereSubtask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereTodoNoteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'checked',
        'text',
        'subtask'
    ];

    public function note(): BelongsTo
    {
        return $this->belongsTo(TodoNote::class, 'todo_note_id');
    }
}
