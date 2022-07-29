<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Traits\CourseTrait;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    use CourseTrait;

    public function pendingCourses(Request $request)
    {
        $pendingCourses = Course::where("is_approved", "=", false)->get();
        return $this->sendResponse(CourseResource::collection($pendingCourses), "Succeed");
    }

    public function approve(Request $request)
    {
        $this->validate($request, ["course_id" => "required"]);
        if ($this->approveCourse($request["course_id"])) {
            return $this->sendResponse([], "Succeed approve course");
        } else {
            return $this->sendError("Failed to approve course");
        }
    }
}
