<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\TodoNote
 *
 * @property int $id
 * @property string|null $title Заголовок заметки
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Todo> $todos
 * @property-read int|null $todos_count
 * @method static \Illuminate\Database\Eloquent\Builder|TodoNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoNote whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoNote whereUserId($value)
 * @property-read \App\Models\User $user
 * @mixin \Eloquent
 */
class TodoNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id'
    ];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
