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
use App\Models\QuizAttemptResult;
use App\Traits\CourseTrait;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    use CourseTrait;
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

    public function about()
    {
        return view("about");
    }

    /**
     * Detail course page
     * If user has bought (take the course), redirect to detail course page
     * @Todo: Can just change buy or take course to view course instead of redirect
     */
    public function course(Course $course)
    {
        if (Enrollment::query()->where([['user_id', '=', Auth::user()->id ?? -1], ['course_id', '=', $course->id]])->exists()) {
            return redirect()->route('course.detail', ['course' => $course]);
        }
        return view('course', compact('course'));
    }

    /**
     * View all courses page for searching, filter, ...
     */
    public function courses(Request $request)
    {
        $courses = $this->searchCourses($request, true);

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

    /**
     * Filter courses based on categories, authors, prices, ...
     */
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

        // Add strict mode for search with and instead or
        $params += ["strict" => true];
        $courses = $courses_query->distinct()->simplePaginate(12)->withPath('/courses')->appends($params);

        return view('_courses', compact('courses'))->render();
    }

    /**
     * Search course, current only support search by name
     * @Todo: enhance search course with content, summary, description, ...
     */
    public function search(Request $request): string
    {
        $courses = Course::whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($request->keyword) . '%'])->simplePaginate(12)->withPath("/courses")->appends(['search' => $request->keyword]);
        return view('_courses', compact('courses'))->render();
    }

    /**
     * Sort the courses based on SortType
     */
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

    /**
     * Course detail page for learning the course
     */
    public function courseDetail(Course $course, CourseLesson $lesson = null)
    {
        if (!$course->sections->isEmpty() && !$course->sections[0]->lessons->isEmpty()) {
            $courseLesson = $lesson ?? $course->sections[0]->lessons[0];
            return view('course_detail', compact('courseLesson', 'course'));
        }

        return view('course_detail', compact('course'));
    }

    /**
     * Course detail page with quiz section
     */
    public function courseDetailQuiz(Course $course, CourseQuiz $quiz)
    {
        $attempts = Auth::user()->attempts->where("course_quiz_id", '=', $quiz->id);
        return view('course_detail_quiz', compact('quiz', 'course', 'attempts'));
    }

    /**
     * Commenting the course
     */
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

    /**
     * Enroll or take the course (buy if it is prerium)
     */
    public function enroll(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
        ]);

        if ($this->internalEnroll($request["course_id"])) {
            Toastr::success('Enroll successfully', 'Succeed');
        } else {
            Toastr::warning('Enroll failed', 'Failed');
        }

        return redirect()->route('course.detail', $request->course_id);
    }

    /**
     * Go to checkout for buy the course
     */
    public function checkout(Course $course)
    {
        return view('checkout', compact('course'));
    }

    /**
     * Execute transfer money for purchase with paypal
     */
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
                    $course->coursePrice->stripePrice(),
                    $request->payment_method_id,
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

    /**
     * Attempt the quiz to know when user has do the quiz (user can do it even after logout and login again)
     */
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

    /**
     * Do quiz
     */
    public function courseDetailQuizAttempt(Course $course, QuizAttempt $attempt)
    {
        return view('course_detail_do_quiz', compact('attempt', 'course'));
    }

    /**
     * Save and calculate the result of the quiz attempt
     */
    public function submitQuiz(Request $request)
    {
        $this->validate($request, ['attempt_id' => 'required']);
        $attempt = QuizAttempt::find($request->attempt_id);
        $quiz  = $attempt->quiz;

        // Init
        $array = array();
        $array['correct'] = 0;
        $array['incorrect'] = count($quiz->questions);

        $user_answers = $attempt->answers;
        $correct = 0;
        $incorrect = 0;

        // For each question check
        foreach ($quiz->questions as $question) {
            $options = $question->options;
            $answers = $question->answers;

            $option_correct = true;

            // Num answer not match -> incorrect
            if (count($user_answers->where('quiz_question_id', '=', $question->id)) != count($answers)) {
                $incorrect++;
                continue;
            }
            // No answers for this question
            if ($user_answers->where('quiz_question_id', '=', $question->id)->isEmpty()) {
                if (count($answers) == 0) {
                    $correct++;
                } else {
                    $incorrect++;
                }
                continue;
            }

            // Cheating, more answers submited than options
            if (count($user_answers->where('quiz_question_id', '=', $question->id)) > count($options)) {
                print_r("Cheating ...! 0 mark!");
                $array = array();
                $array['correct'] = $correct;
                $array['incorrect'] = $incorrect;
                return $array;
            }

            // For each answers of this question check if there is any missing answer, if yes -> incorrect, otherwise is correct
            for ($i = 0; $i < count($answers); $i++) {
                if ($user_answers->where('quiz_question_id', '=', $question->id)->where('id', '=', $answers[$i]->question_option_id)->isEmpty()) {
                    $option_correct = false;
                }
            }

            if ($option_correct) {
                $correct++;
            } else {
                $incorrect++;
            }
        }

        $answers = array();                //creating an array
        $answers['correct'] = $correct;         // putting the values inside the array
        $answers['incorrect'] = $incorrect;

        $course = $quiz->course;

        $attemptResult = new QuizAttemptResult();
        $attemptResult->score = $correct / ($correct + $incorrect);
        $attempt->result()->save($attemptResult);

        return view('course_detail_result_quiz', compact('answers', 'course'));
    }

    /**
     * Save quiz attempt answer
     */
    public function submitAttemptAnswer(Request $request)
    {
        $this->validate($request, ['attempt_id' => 'required', 'option_id' => 'required']);
        $attempt = QuizAttempt::find($request->attempt_id);
        if ($attempt == null) {
            return response()->json(['success' => false, 'message' => "Invalid request"]);
        }
        try {
            if ($request->is_save == "true") {
                $attempt->answers()->attach($request->option_id);
            } else {
                $attempt->answers()->detach($request->option_id);
            }
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => "Save success"]);
    }


    /**
     * Review quiz attempt page
     */
    public function quizAttemptReview(QuizAttempt $attempt)
    {
        $course = $attempt->quiz->course;
        return view("course_detail_review_quiz_attempt", compact('attempt', 'course'));
    }

    /**
     * Become author page
     */
    public function requestAuthor()
    {
        return view("request_author");
    }

    /**
     * Complete course lesson
     */
    public function completeCourseLesson(Request $request)
    {
        $this->validate($request, ['lesson_id' => 'required', 'course_id' => 'required']);
        $courseLesson = CourseLesson::find($request["lesson_id"]);

        if ($courseLesson == null) {
            return redirect()->back();
        }

        $courseLesson->is_complete = true;
        $courseLesson->saveOrFail();

        $nextLesson = $courseLesson->section->lessons->where('id', '>', $courseLesson->id)->min();

        return redirect()->route('course.detail', ["course" => $request["course_id"], "lesson" => $nextLesson]);
    }
}
