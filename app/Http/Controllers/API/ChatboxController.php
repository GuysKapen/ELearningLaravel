<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use App\Traits\CourseTrait;
use Illuminate\Http\Request;

class ChatboxController extends BaseController
{
    use CourseTrait;
    /**
     * View all courses page for searching, filter, ...
     */
    public function courses(Request $request)
    {
        $courses = $this->searchCourses($request, false, false)->pluck("name");
        return $this->sendResponse($courses, "Success");
        return response()->json(["data" => $courses]);
    }

    public function showCourses()
    {
        return redirect()->route("courses");
    }

    /**
     * View all courses page for searching, filter, ...
     */
    public function searchSimilar(Request $request)
    {
        $name = $request["course_name"];
        $course = Course::query()->whereRaw("UPPER(name) = ?", [strtoupper($name)])->first();
        if (isset($course)) {
            return $this->sendResponse(["course" => $course->pluck("name"), "extras" => null], "Success");
        }
        $courses = Course::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($name) . '%'])->get()->pluck("name");
        if (isset($courses) && !$courses->isEmpty()) {
            return $this->sendResponse(["course" => null, "extras" => $courses], "Not found");
        }
        $courses = $this->similarNameCourses($name, false)->pluck("name");
        return $this->sendResponse(["course" => null, "extras" => $courses], "Not found");
    }
    /**
     * Enroll or take the course (buy if it is prerium)
     */
    public function enroll(Request $request)
    {
        // Enroll by course name for chatbox
        if (isset($request["course_name"])) {
            $model = Course::query()->whereRaw("UPPER(name) LIKE ?", [strtoupper($request["course_name"])])->first();
            if (!isset($model)) {
                $similarCourses = Course::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($request["course_name"]) . '%'])->get()->pluck("name");
                if (isset($model)) {
                    return $this->sendError("Not a valid course", extras: $similarCourses);
                }
                return $this->sendError("Not a valid course", extras: $this->similarNameCourses($request["course_name"])->pluck("name"));
            }

            if ($this->internalEnroll($model->id)) {
                return $this->sendResponse([], "Success enroll course");
            } else {
                return $this->sendError("Failed to enroll course");
            }
        }

        // Enroll by course id
        $this->validate($request, [
            'course_id' => 'required',
        ]);

        if ($this->internalEnroll($request["course_id"])) {
            return $this->sendResponse([], "Success enroll course");
        } else {
            return $this->sendError("Failed to enroll course");
        }
    }
}
