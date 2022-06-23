<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $course_quiz_id
 * @property integer $user_id
 * @property Date $created_at
 */
class QuizAttempt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_quiz_id',
        'user_id',
    ];

    protected $table = "quiz_attempts";

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(CourseQuiz::class, 'course_quiz_id');
    }

    public function timeLeft(): float
    {
        return ($this->created_at->getPreciseTimestamp(0) + $this->quiz->detail->duration) - Carbon::now()->getPreciseTimestamp(0);
    }

    public function answers()
    {
        return $this->belongsToMany(QuestionOption::class, "answer_attempt")->withTimestamps();
    }

    public function result()
    {
        return $this->hasOne(QuizAttemptResult::class);
    }
}
