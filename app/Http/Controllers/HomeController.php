<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
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

    public function course(Course $course) {
        return view('course', compact('course'));
    }

    public function courses() {
        $courses = Course::latest()->get();
        $categories = Category::latest()->get();
        $authors = DB::table("users")
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select("users.id", "users.username")
            ->where("roles.id", 2)
            ->get();
        return view('courses', compact('courses', 'categories', 'authors'));
    }
}
