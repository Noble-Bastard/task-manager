<?php

namespace Domain\Tasks\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property int $user_id
 * @property-read User $user
 */
class Task extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];

    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
