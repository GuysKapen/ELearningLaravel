<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $duration
 * @property boolean is_preview
 * @property integer course_lesson_id
 */
class LessonDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'duration',
        'is_preview',
        'course_lesson_id',
    ];

    protected $attributes = array(
        'is_preview' => false
    );

    use HasFactory;
}
