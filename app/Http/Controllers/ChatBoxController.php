<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ChatBoxController extends Controller
{
    /**
     * View all courses page for searching, filter, ...
     */
    public function courses(Request $request)
    {
        $courses = Course::latest()->get(["name"]);
        return response()->json(["data" => $courses]);
    }

    public function showCourses()
    {
        return redirect()->route("courses");
    }
}
