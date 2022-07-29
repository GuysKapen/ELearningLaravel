<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Traits\CourseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatboxController extends BaseController
{
    use CourseTrait;
    /**
     * View all courses page for searching, filter, ...
     */
    public function courses(Request $request)
    {
        $courses = $this->searchCourses($request, false, false);
        return $this->sendResponse(CourseResource::collection($courses), "Success");
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
            return $this->sendResponse(["course" => new CourseResource($course), "extras" => null], "Success");
        }
        $courses = Course::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($name) . '%'])->get();
        if (isset($courses) && !$courses->isEmpty()) {
            return $this->sendResponse(["course" => null, "extras" => CourseResource::collection($courses)], "Not found");
        }
        $courses = $this->similarNameCourses($name, false);
        return $this->sendResponse(["course" => null, "extras" => CourseResource::collection($courses)], "Not found");
    }
    /**
     * Enroll or take the course (buy if it is prerium)
     */
    public function enroll(Request $request)
    {
        // Enroll by course name for chatbox
        if (isset($request["course_name"])) {
            $model = Course::query()->whereRaw("UPPER(name) = ?", [strtoupper($request["course_name"])])->first();
            if (!isset($model)) {
                $similarCourses = Course::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($request["course_name"]) . '%'])->get();
                if (isset($similarCourses) && !$similarCourses->isEmpty()) {
                    return $this->sendError("Not a valid course", extras: CourseResource::collection($similarCourses));
                }
                return $this->sendError("Not a valid course", extras: CourseResource::collection($this->similarNameCourses($request["course_name"])));
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

    public function myCourses(Request $request)
    {
        $entities = [];
        if (isset($request["keywords"])) {
            $entities = $this->keywordsToId($request["keywords"]);
        }
        $courses = Auth::user()->enrolledCourses;
        return $this->sendResponse(CourseResource::collection($courses), "Success");
    }

    public function courseProgress(Request $request)
    {
        $this->validate($request,
         [
            'course_id' => 'required',
        ]);
        $course = Auth::user()->enrolledCourses->where("id", '=', $request["course_id"])->first();
        if ($course == null) {
            return $this->sendError("Invalid request");
        }

        $complete = $course->lessons->where("is_complete", "=", true)->count();
        $total = $course->lessons->count();
        return $this->sendResponse(["complete" => $complete, "total" => $total], "Succeed");
    }
}
