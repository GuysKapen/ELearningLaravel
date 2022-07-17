<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use App\Traits\CourseTrait;
use Illuminate\Http\Request;

class ChatboxActionController extends BaseController
{
    use CourseTrait;

    /**
     * Enroll or take the course (buy if it is prerium)
     */
    public function enroll(Request $request)
    {
        // Enroll by course name for chatbox
        if (isset($request["course_name"])) {
            $model = Course::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($request["course_name"]) . '%'])->first();
            if (!isset($model)) {
                return $this->sendError("Not a valid course", extras: $this->similarNameCourses($request["course_name"]));
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
