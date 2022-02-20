<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\CourseSection;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('author.course.create');
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

        $slug = Str::slug($request->name);

        $course = new Course();
        $course->name = $request->name;
        $course->slug = $slug;
        /** @noinspection PhpUndefinedFieldInspection */
        $course->user_id = Auth::user()->id;

        if ($course->save()) {
            Toastr::success('Save course successfully', 'Succeed');
            return redirect()->route('author.course.index');
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
        return view('author.course.edit', compact('course'));
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

        $slug = Str::slug($request->name);

        $course->name = $request->name;
        $course->slug = $slug;
        $course->user_id = Auth::user()->id;

        if ($course->save()) {
            Toastr::success('Save course successfully', 'Succeed');
            return redirect()->route('author.course.index');
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

    public function newLesson($sectionId) {
        return view('author.lesson.create', compact('sectionId'));
    }

    /**
     * Add a newly created lesson resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function addLesson(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'section_id' => 'required',
        ]);

        $section_id = $request->section_id;
        $slug = Str::slug($request->title);

        $courseSection = new CourseLesson();
        $courseSection->title = $request->title;
        $courseSection->body = $request->body;
        $courseSection->video = $request->video;
        $courseSection->slug = $slug;
        $courseSection->course_section_id = $section_id;

        if ($courseSection->save()) {
            Toastr::success('Add section successfully', 'Succeed');
        }
        Toastr::warning('Failed to add section', 'Failed');
        return redirect()->back();
    }
}
