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

    public function isAnswerCorrect(QuizQuestion $question)
    {
        $options = $question->options;
        $answers = $question->answers;

        $option_correct = true;

        // Num answer not match -> incorrect
        if (count($this->answers->where('quiz_question_id', '=', $question->id)) != count($answers)) {
            return false;
        }
        // No answers for this question
        if ($this->answers->where('quiz_question_id', '=', $question->id)->isEmpty()) {
            if (count($answers) == 0) {
                return true;
            } else {
                return false;
            }
        }

        // Cheating, more answers submited than options
        if (count($this->answers->where('quiz_question_id', '=', $question->id)) > count($options)) {
            return false;
        }

        // For each answers of this question check if there is any missing answer, if yes -> incorrect, otherwise is correct
        for ($i = 0; $i < count($answers); $i++) {
            if ($this->answers->where('quiz_question_id', '=', $question->id)->where('id', '=', $answers[$i]->question_option_id)->isEmpty()) {
                $option_correct = false;
            }
        }

        if ($option_correct) {
            return true;
        } else {
            return false;
        }
    }
}
