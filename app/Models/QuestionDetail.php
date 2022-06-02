<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'hint',
        'mark',
        'explanation',
        'quiz_question_id',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
