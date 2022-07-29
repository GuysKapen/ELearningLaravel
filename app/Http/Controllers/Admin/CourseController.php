<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Notifications\AuthorCourseApproved;
use App\Traits\CourseTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    use CourseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        /** @noinspection PhpUndefinedFieldInspection */
        $courses = Course::latest()->get();
        return view('admin.course.index', compact('courses'));
    }

    public function approve($id)
    {
        if ($this->approveCourse($id)) {
            Toastr::success('Course approved successfully', 'Succeed');
        } else {
            Toastr::failed('Course approved failed', 'Failed');
        }
        return redirect()->back();
    }
}
