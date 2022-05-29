<?php

namespace App\Http\Controllers;

use App\Library\SortType;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

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

    public function courses(Request $request)
    {
        $params = [];
        if (isset($request->search)) {
            $courses_query = Course::query()
                ->leftJoin("course_prices as cp", "cp.course_id", "=", "courses.id")
                ->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($request->search) . '%']);

            $params[] = ['search' => $request->search];
        } else {
            $courses_query = Course::query()
                ->leftJoin("course_prices as cp", "cp.course_id", "=", "courses.id");
        }

        $categories = $request->cats;
        if (isset($categories) && !empty($categories)) {
            $courses_query = $courses_query
                ->leftJoin("category_course as cc", "cc.course_id", "=", "courses.id");
            $courses_query = $courses_query->whereIn("cc.category_id", $categories);
            $params += ['cats' => $categories];
        }

        $authors = $request->authors;
        if (isset($authors) && !empty($authors)) {
            $courses_query = $courses_query->whereIn("courses.user_id", $authors);
            $params += ['authors' => $authors];
        }

        $col = 'updated_at';
        $direction = 'desc';
        if (isset($request->sort)) {
            switch ($request->sort) {
                case SortType::Newest:
                    $col = 'updated_at';
                    $direction = 'desc';
                    break;
                case SortType::Oldest:
                    $col = 'updated_at';
                    $direction = 'asc';
                    break;
                case SortType::Cheapest:
                    $col = 'price';
                    $direction = 'desc';
                    break;
                case SortType::Expest:
                    $col = 'price';
                    $direction = 'asc';
                    break;
            }

            $params += ['sort' => $request->sort];
        }

        $courses = $courses_query->select("courses.*")->distinct()->orderBy($col, $direction)->simplePaginate(12)->appends($params);

        $latestCourses = Course::latest()->take(5)->get();
        $categories = Category::latest()->get();
        $authors = DB::table("users")
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select("users.id", "users.username")
            ->whereIn("roles.id", [1, 2])
            ->get();
        $sortTypes = SortType::toCollection();
        return view('courses', compact('courses', 'categories', 'authors', 'sortTypes', 'latestCourses'));
    }

    public function filter(Request $request)
    {
        $categories = $request->categories;
        $authors = $request->authors;
        $params = [];
        $courses_query = Course::query()
            ->leftJoin("category_course as cc", "cc.course_id", "=", "courses.id")
            ->select("courses.*");
        if (isset($categories) && !empty($categories)) {
            $courses_query = $courses_query->whereIn("cc.category_id", $categories);
            $params += ['cats' => $categories];
        }

        if (isset($authors) && !empty($authors)) {
            $courses_query = $courses_query->whereIn("courses.user_id", $authors);
            $params += ['authors' => $authors];
        }

        $courses = $courses_query->distinct()->simplePaginate(12)->withPath('/courses')->appends($params);

        return view('_courses', compact('courses'))->render();
    }

    public function search(Request $request): string
    {
        $courses = Course::whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($request->keyword) . '%'])->simplePaginate(12)->withPath("/courses")->appends(['search' => $request->keyword]);
        return view('_courses', compact('courses'))->render();
    }

    public function sort(Request $request)
    {
        $col = 'updated';
        $direction = 'desc';
        switch ($request->sort_type) {
            case SortType::Newest:
                $col = 'updated_at';
                $direction = 'desc';
                break;
            case SortType::Oldest:
                $col = 'updated_at';
                $direction = 'asc';
                break;
            case SortType::Cheapest:
                $col = 'price';
                $direction = 'desc';
                break;
            case SortType::Expest:
                $col = 'price';
                $direction = 'asc';
                break;
        }
        $courses = Course::query()
            ->leftJoin("course_prices as cp", "cp.course_id", "=", "courses.id")
            ->orderBy($col, $direction)
            ->select("courses.*")
            ->simplePaginate(12)
            ->withPath('/courses')
            ->appends(['sort' => $request->sort_type]);

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

    public function comment(Request $request)
    {
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
