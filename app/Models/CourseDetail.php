<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $course_id
 * @property integer $duration
 * @property integer $max_student
 * @property integer $student_enrolled
 * @property integer $retake_course
 * @property string $duration_info
 * @property string $skill_level
 * @property string $language
 */

class CourseDetail extends Model
{
    use HasFactory;

    protected $attributes = array(
        'duration' => 3600 * 24 * 7 * 10,
        'max_student' => 1000,
        'student_enrolled' => 0,
        'retake_course' => 0,
        'duration_info' => '50 hours',
        'skill_level' => 'All levels',
        'language' => 'English'
    );

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
