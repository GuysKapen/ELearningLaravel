<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseAssessment;
use App\Models\CourseDetail;
use App\Models\CourseLesson;
use App\Models\CourseResult;
use App\Models\CourseSection;
use App\Models\EvaluateType;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

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
        $courses = Auth::user()->courses;
        return view('author.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $courseDetail = new CourseDetail();
        $courseAssessment = new CourseAssessment();
        $evaluateTypes = EvaluateType::all();
        return view('author.course.create', compact('courseDetail', 'evaluateTypes', 'courseAssessment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        DB::beginTransaction();

        try {
            $slug = Str::slug($request->name);

            $course = new Course();
            $course->name = $request->name;
            $course->slug = $slug;
            $course->description = $request->description;
            /** @noinspection PhpUndefinedFieldInspection */
            $course->user_id = Auth::user()->id;

            if ($course->saveOrFail()) {
                $courseDetail = new CourseDetail();

                $courseDetail->duration = $request->duration ?? $courseDetail->duration;
                $courseDetail->max_student = $request->max_student ?? $courseDetail->max_student;
                $courseDetail->student_enrolled = $request->student_enrolled ?? $courseDetail->student_enrolled;
                $courseDetail->retake_course = $request->retake_course ?? $courseDetail->retake_course;
                $courseDetail->duration_info = $request->duration_info ?? $courseDetail->duration_info;
                $courseDetail->skill_level = $request->skill_level ?? $courseDetail->skill_level;
                $courseDetail->language = $request->language ?? $courseDetail->language;
                $courseDetail->course_id = $course->id;

                $courseDetail->save();
            }

            if (isset($request->results)) {
                $courseResults = [];
                foreach ($request->results as $result) {
                    $courseResult = new CourseResult();
                    $courseResult->result = $result;
                    $courseResults[] = $courseResult;
                }

                $course->results()->saveMany($courseResults);
            }

            if (isset($request->evaluate_type_id)
                && isset($request->pass_condition)) {
                $courseAssessment = new CourseAssessment();
                $courseAssessment->evaluate_type_id = $request->evaluate_type_id;
                $courseAssessment->pass_condition = $request->pass_condition;
                $courseAssessment->saveOrFail();
            }

            DB::commit();
            // all good
            Toastr::success('Save course successfully', 'Succeed');
            return redirect()->route('author.course.index');
        } catch (\Throwable $e) {
            DB::rollback();
            // something went wrong
        }

        Toastr::warning('Failed to save course', 'Failed');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $evaluateTypes = EvaluateType::all();
        $courseDetail = $course->detail ?? new CourseDetail();
        $courseAssessment = $course->courseAssessment ?? new CourseAssessment();
        return view('author.course.edit', compact('course', 'courseDetail', 'courseAssessment', 'evaluateTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        DB::beginTransaction();

        try {
            $slug = Str::slug($request->name);

            $course->name = $request->name;
            $course->slug = $slug;
            $course->description = $request->description;
            /** @noinspection PhpUndefinedFieldInspection */
            $course->user_id = Auth::user()->id;

            if ($course->saveOrFail()) {
                $courseDetail = $course->detail ?? new CourseDetail();

                $courseDetail->duration = $request->duration ?? $courseDetail->duration;
                $courseDetail->max_student = $request->max_student ?? $courseDetail->max_student;
                $courseDetail->student_enrolled = $request->student_enrolled ?? $courseDetail->student_enrolled;
                $courseDetail->retake_course = $request->retake_course ?? $courseDetail->retake_course;
                $courseDetail->duration_info = $request->duration_info ?? $courseDetail->duration_info;
                $courseDetail->skill_level = $request->skill_level ?? $courseDetail->skill_level;
                $courseDetail->language = $request->language ?? $courseDetail->language;
                $courseDetail->course_id = $course->id;

                $courseDetail->save();
            }

            if (isset($request->results)) {
                $courseResults = [];
                foreach ($request->results as $result) {
                    $courseResult = new CourseResult();
                    $courseResult->result = $result;
                    $courseResults[] = $courseResult;
                }

                $course->results()->delete();
                $course->results()->saveMany($courseResults);
            }

            if (isset($request->evaluate_type_id)
                && isset($request->pass_condition)) {
                $courseAssessment = $course->courseAssessment ?? new CourseAssessment();
                $courseAssessment->evaluate_type_id = $request->evaluate_type_id;
                $courseAssessment->pass_condition = $request->pass_condition;
                $courseAssessment->course_id = $course->id;
                $courseAssessment->saveOrFail();
            }

            DB::commit();
            // all good
            Toastr::success('Save course successfully', 'Succeed');
            return redirect()->route('author.course.index');
        } catch (\Throwable $e) {
            DB::rollback();
            // something went wrong
        }

        Toastr::warning('Failed to save course', 'Failed');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Course $course)
    {
        if ($course->delete()) {
            Toastr::success('Delete course successfully', 'Succeed');
            return redirect()->back();
        }

        Toastr::error('Failed to delete course', 'Failed');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function addSection(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'course_id' => 'required'
        ]);

        $course_id = $request->course_id;
        $slug = Str::slug($request->name);
        $index = Course::find($course_id)->sections->count();

        $courseSection = new CourseSection();
        $courseSection->name = $request->name;
        $courseSection->slug = $slug;
        $courseSection->index = $index;
        $courseSection->course_id = $course_id;

        if ($courseSection->save()) {
            Toastr::success('Add section successfully', 'Succeed');
        }
        Toastr::warning('Failed to add section', 'Failed');
        return response()->json(['success' => 'Add course section successfully']);
    }

    public function newLesson(CourseSection $courseSection)
    {
        Session::put('url.intended', URL::previous());  // using the Facade
        return view('author.lesson.create', compact('courseSection'));
    }
}
