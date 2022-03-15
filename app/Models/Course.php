<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property string $slug
 * @property integer $viewCount
 * @property boolean $status
 * @property boolean $isApproved
 * @property CourseDetail $detail
 * @property string|null $description
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

    public function detail(): HasOne
    {
        return $this->hasOne(CourseDetail::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(CourseResult::class, 'course_id', 'id');
    }
}
