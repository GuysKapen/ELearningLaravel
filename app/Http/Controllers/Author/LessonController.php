<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\CourseLesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(CourseLesson $courseLesson) {
        return view('author.lesson.show', compact('courseLesson'));
    }
}
