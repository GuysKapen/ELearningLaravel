<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $evaluate_type_id
 * @property integer $pass_condition
 * @property mixed $course_id
 */
class CourseAssessment extends Model
{
    use HasFactory;

    protected $attributes = array(
        'evaluate_type_id' => '1',
        'pass_condition' => '75'
    );

    public function evaluateType(): BelongsTo
    {
        return $this->belongsTo(EvaluateType::class);
    }
}
