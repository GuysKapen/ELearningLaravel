<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property string $slug
 * @property integer $viewCount
 * @property boolean $status
 * @property boolean $isApproved
 * @property CourseDetail $detail
 * @property string|null $description
 * @property CourseAssessment $courseAssessment
 * @property mixed $feature_img
 */
class Course extends HasManySyncableModel
{
    use HasFactory;

    public function sections(): HasMany
    {
        return $this->hasMany(CourseSection::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function author(): BelongsTo
    {
        return $this->user();
    }

    public function detail(): HasOne
    {
        return $this->hasOne(CourseDetail::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(CourseResult::class, 'course_id', 'id');
    }

    public function requirements(): HasMany
    {
        return $this->hasMany(CourseRequirement::class, 'course_id', 'id');
    }

    public function targets(): HasMany
    {
        return $this->hasMany(CourseTarget::class, 'course_id', 'id');
    }

    public function courseAssessment(): HasOne
    {
        return $this->hasOne(CourseAssessment::class);
    }

    public function coursePrice(): HasOne
    {
        return $this->hasOne(CoursePrice::class);
    }

    public function lessons(): HasManyThrough
    {
        return $this->hasManyThrough(CourseLesson::class, CourseSection::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function coAuthors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "course_co_author")->withTimestamps();
    }

    public function displayPrice(): string
    {
        return isset($this->coursePrice->price) ? ("$" . $this->coursePrice->price) : "Free";
    }

    public function comments(): Relations\HasManySyncable
    {
        return $this->hasMany(Comment::class);
    }

    public function quizzes(): Relations\HasManySyncable
    {
        return $this->hasMany(CourseQuiz::class);
    }

    public function enrollments(): Relations\HasManySyncable
    {
        return $this->hasMany(Enrollment::class);
    }

    public function programmingLanguages(): BelongsToMany
    {
        return $this->belongsToMany(ProgrammingLanguage::class, "course_programming_language");
    }
}
