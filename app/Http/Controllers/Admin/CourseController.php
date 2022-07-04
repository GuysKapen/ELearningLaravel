<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Notifications\AuthorCourseApproved;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
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
        $course = Course::find($id);
        if ($course->is_approved == false) {
            try {
                $course->is_approved = true;
                $course->save();
                Toastr::success('Course approved successfully', 'Succeed');
            } catch(\Exception $e) {
                return $e;
            }
            $course->user->notify(new AuthorCourseApproved($course));

            // $subscribers = Subscriber::all();
            // foreach ($subscribers as $subscriber) {
                // Notification::route('mail', $subscriber->email)
                    // ->notify(new NewPostNotify($post));
            // }
        }

        return redirect()->back();
    }
}
