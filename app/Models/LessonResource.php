<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $video
 * @property mixed $course_lesson_id
 */
class LessonResource extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'video',
        'course_lesson_id',
    ];

    use HasFactory;
}
