<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property mixed $name
 * @property string $title
 * @property string $slug
 * @property string $video
 * @property string $body
 * @property int $view_count
 * @property boolean $status
 * @property boolean $is_approved
 * @property int $course_section_id
 */
class CourseLesson extends Model
{
    use HasFactory;

    public function section(): BelongsTo
    {
        return $this->belongsTo(CourseSection::class, 'course_section_id', 'id');
    }

    public function detail(): HasOne
    {
        return $this->hasOne(LessonDetail::class);
    }
}
