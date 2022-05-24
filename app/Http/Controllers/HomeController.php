<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use Brian2694\Toastr\Facades\Toastr;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        return view('home', compact('courses'));
    }

    public function course(Course $course)
    {
        return view('course', compact('course'));
    }

    public function courses()
    {
        $courses = Course::latest()->simplePaginate(2);
        $categories = Category::latest()->get();
        $authors = DB::table("users")
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select("users.id", "users.username")
            ->where("roles.id", 2)
            ->get();
        return view('courses', compact('courses', 'categories', 'authors'));
    }

    public function filter(Request $request)
    {
        $categories = $request->categories;
        $authors = $request->authors;
        $courses_query = Course::query()
            ->join("category_course as cc", "cc.course_id", "=", "courses.id")
            ->select("courses.*");
        if (isset($categories) && !empty($categories)) {
            $courses_query = $courses_query->whereIn("cc.category_id", $categories);
        }

        if (isset($authors) && !empty($authors)) {
            $courses_query = $courses_query->whereIn("courses.user_id", $authors);
        }

        $courses = $courses_query->get();

        return view('_courses', compact('courses'))->render();
    }

    public function search(Request $request): string
    {
        $courses = Course::whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($request->keyword) . '%'])->get();
        return view('_courses', compact('courses'))->render();
    }

    public function courseDetail(Course $course)
    {
        if (!$course->sections->isEmpty() && !$course->sections[0]->lessons->isEmpty()) {
            $courseLesson = $course->sections[0]->lessons[0];
            return view('course_detail', compact('courseLesson', 'course'));
        }

        return view('course_detail', compact('course'));
    }

    public function comment(Request $request) {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $course = Course::find($request->comment['course_id']);
        if ($course == null) {
            return;
        }
        $comment = new Comment($request->comment);

        if (Auth::user()->comments()->save($comment)) {
            Toastr::success('Add comment successfully', 'Succeed');
        }

        Toastr::warning('Add comment failed', 'Failed');
    }
}
