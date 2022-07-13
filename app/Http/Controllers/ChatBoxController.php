<?php

namespace App\Http\Controllers;

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
}
