<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionDetail extends Model
{
    use HasFactory;

    public function question(): BelongsTo
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
