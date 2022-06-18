<?php

namespace App\Http\Controllers;

use App\Library\SortType;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\CourseQuiz;
use App\Models\Enrollment;
use App\Models\QuizAttempt;
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
        if (Enrollment::query()->where([['user_id', '=', Auth::user()->id], ['course_id', '=', $course->id]])->exists()) {
            return view('course_detail', compact('course'));
        }
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

    public function courseDetail(Course $course, CourseLesson $lesson = null)
    {
        if (!$course->sections->isEmpty() && !$course->sections[0]->lessons->isEmpty()) {
            $courseLesson = $lesson ?? $course->sections[0]->lessons[0];
            return view('course_detail', compact('courseLesson', 'course'));
        }

        return view('course_detail', compact('course'));
    }

    public function courseDetailQuiz(Course $course, CourseQuiz $quiz)
    {
        return view('course_detail_quiz', compact('quiz', 'course'));
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

    public function enroll(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
        ]);

        $enrollment = new Enrollment(["course_id" => $request->course_id]);

        if (Auth::user()->enrollments()->save($enrollment)) {
            Toastr::success('Enroll successfully', 'Succeed');
        }

        Toastr::warning('Enroll failed', 'Failed');
        return redirect()->route('course.detail', $request->course_id);
    }

    public function checkout(Course $course)
    {
        return view('checkout', compact('course'));
    }

    public function purchase(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'payment_method_id' => 'required'
        ]);

        $course = Course::find($request->course_id);
        if ($course == null) return response()->json(['success' => false, 'message' => "Invalid course"]);

        DB::beginTransaction();
        try {
            // Save enroll before charge, if fail rollback
            $enrollment = new Enrollment(["course_id" => $request->course_id]);
            if (Auth::user()->enrollments()->save($enrollment)) {
                if ($request->user()->stripe_id === null) {
                    $request->user()->createAsStripeCustomer();
                }

                $request->user()->addPaymentMethod($request->input('payment_method_id'));

                $stripeCharge = $request->user()->charge(
                    $course->coursePrice->stripePrice(), $request->payment_method_id,
                );

                DB::commit();
                return response()->json(['success' => true, 'message' => "Charge successfully!", 'data' => $stripeCharge]);
            }

            return response()->json(['success' => false, 'message' => "Failed to purchase course!"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => "Charge Failed!", 'data' => $e->getMessage()]);
        }
    }

    public function attemptQuiz(Request $request)
    {
        $this->validate($request, ['quiz_id' => 'required']);

        $quiz = CourseQuiz::find($request->quiz_id);

        if ($quiz == null) {
            return redirect()->back();
        }

        $course = $quiz->course;

        $attempt = new QuizAttempt();
        $attempt->course_quiz_id = $request->quiz_id;

        if (request()->user()->quizAttempts()->save($attempt)) {
            return redirect()->route('course.detail.quiz.attempt', ["course" => $course, "attempt" => $attempt]);
        }

        return redirect()->back();
    }

    public function courseDetailQuizAttempt(Course $course, QuizAttempt $attempt)
    {
        return view('course_detail_do_quiz', compact('attempt', 'course'));
    }
}
