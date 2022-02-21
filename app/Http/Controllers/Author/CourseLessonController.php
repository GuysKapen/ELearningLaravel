<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\CourseLesson;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CourseLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
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
        return Redirect::intended('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseLesson  $courseLesson
     * @return \Illuminate\Http\Response
     */
    public function show(CourseLesson $courseLesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseLesson  $courseLesson
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(CourseLesson $courseLesson)
    {
        $courseSection = $courseLesson->section;
        return view('author.lesson.edit', compact('courseLesson', 'courseSection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseLesson  $courseLesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseLesson $courseLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseLesson  $courseLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseLesson $courseLesson)
    {
        //
    }
}
