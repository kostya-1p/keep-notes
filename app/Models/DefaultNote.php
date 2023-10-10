<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\DefaultNote
 *
 * @property int $id
 * @property string|null $title Заголовок заметки
 * @property string $text Текст заметки
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultNote whereUserId($value)
 * @property-read \App\Models\User $user
 * @mixin \Eloquent
 */
class DefaultNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
