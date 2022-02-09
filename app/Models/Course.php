<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $slug
 * @property integer $viewCount
 * @property boolean $status
 * @property boolean $isApproved
 */
class Course extends Model
{
    use HasFactory;

    public function sections(): HasMany
    {
        return $this->hasMany(CourseSection::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
