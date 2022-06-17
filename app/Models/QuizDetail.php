<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $allow_num_attempt
 * @property integer $duration
 * @property string $description
 */
class QuizDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_quiz_id',
        'allow_num_attempt',
        'duration',
        'description'
    ];

    /**
     * The default attributes for constructor
     * @var array
     */
    protected $attributes = array(
        'duration' => 300,
        'allow_num_attempt' => -1,
    );

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(CourseQuiz::class);
    }
}
