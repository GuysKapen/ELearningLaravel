<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Traits\CourseTrait;
use Illuminate\Http\Request;

class ChatBoxController extends Controller
{
    use CourseTrait;
    /**
     * View all courses page for searching, filter, ...
     */
    public function courses(Request $request)
    {
        $courses = $this->searchCourses($request, false, false)->pluck("name");
        return response()->json(["data" => $courses]);
    }

    public function showCourses()
    {
        return redirect()->route("courses");
    }

    /**
     * View all courses page for searching, filter, ...
     */
    public function searchSimilarName(Request $request)
    {
        $course = Course::query()->whereRaw("UPPER(name) = ?", [strtoupper($request->search)])->first();
        if (isset($course)) {
            return response()->json(["data" => ["course" => $course, "similarCourses" => null]]);
        }
        $courses = $this->similarNameCourses($request, false)->pluck("name");
        return response()->json(["data" => ["course" => null, "similarCourses" => $courses]]);
    }
}
