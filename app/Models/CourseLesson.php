<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

/**
 * @property string $title
 * @property string $slug
 * @property boolean $is_complete
 * @property int $course_section_id
 */
class CourseLesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'course_section_id',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(CourseSection::class, 'course_section_id', 'id');
    }

    public function detail(): HasOne
    {
        return $this->hasOne(LessonDetail::class);
    }

    public function content(): HasOne
    {
        return $this->hasOne(LessonContent::class);
    }

    public function resource(): HasOne
    {
        return $this->hasOne(LessonResource::class);
    }
}
