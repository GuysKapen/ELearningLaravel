<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Library\DurationType;
use App\Models\CourseLesson;
use App\Models\LessonContent;
use App\Models\LessonDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'title' => 'required',
                'section_id' => 'required',
            ]);

            $section_id = $request->section_id;
            $slug = Str::slug($request->title);

            $courseLesson = new CourseLesson();
            $courseLesson->title = $request->title;
            $courseLesson->slug = $slug;
            $courseLesson->course_section_id = $section_id;

            if ($courseLesson->saveOrFail()) {

                if (isset($request->body)) {
                    $lessonContent = new LessonContent();
                    $lessonContent->content = $request->body;
                    $courseLesson->content()->save($lessonContent);
                }

                if (isset($request->duration) && isset($request->duration_type)) {

                    $lessonDetail = new LessonDetail();

                    $factor = 1;
                    switch ($request->duration_type) {
                        case DurationType::Sec:
                            $factor = 1;
                            break;
                        case DurationType::Min:
                            $factor = 60;
                            break;
                        case DurationType::Hour:
                            $factor = 3600;
                            break;
                    }

                    $lessonDetail->is_preview = isset($request->is_preview);
                    $lessonDetail->duration = $factor * $request->duration;

                    $courseLesson->detail()->save($lessonDetail);

                }

                Toastr::success('Add section successfully', 'Succeed');
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
        }

        Toastr::warning('Failed to add section', 'Failed');
        return Redirect::intended('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CourseLesson $courseLesson
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(CourseLesson $courseLesson)
    {
        return view('author.lesson.show', compact('courseLesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CourseLesson $courseLesson
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(CourseLesson $courseLesson)
    {
        $courseSection = $courseLesson->section;
        $items = (new DurationType)->getConstList();
        $categories = new Collection();
        foreach ($items as $item) {
            $categories->push((object)['id' => $item,
                'name' => DurationType::GetName($item)
            ]);

        }
        return view('author.lesson.edit', compact('courseLesson', 'courseSection', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseLesson $courseLesson
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CourseLesson $courseLesson)
    {
        DB::beginTransaction();

        try {
            $this->validate($request, [
                'title' => 'required',
                'section_id' => 'required',
            ]);

            $section_id = $request->section_id;
            $slug = Str::slug($request->title);

            $courseLesson->title = $request->title;
            $courseLesson->slug = $slug;
            $courseLesson->course_section_id = $section_id;

            if ($courseLesson->saveOrFail()) {

                if (isset($request->body)) {
                    $lessonContent = $courseLesson->content ?? new LessonContent();
                    $lessonContent->content = $request->body;
                    $lessonContent->course_lesson_id = $courseLesson->id;

                    $lessonContent->saveOrFail();
                }


                if (isset($request->duration) && isset($request->duration_type)) {

                    $lessonDetail = $courseLesson->detail ?? new LessonDetail();

                    $factor = 1;
                    switch ($request->duration_type) {
                        case DurationType::Sec:
                            $factor = 1;
                            break;
                        case DurationType::Min:
                            $factor = 60;
                            break;
                        case DurationType::Hour:
                            $factor = 3600;
                            break;
                    }

                    $lessonDetail->duration = $request->duration * $factor;
                    $lessonDetail->is_preview = $request->is_preview ?? $lessonDetail->is_preview;
                    $lessonDetail->course_lesson_id = $courseLesson->id;

                    $lessonDetail->saveOrFail();
                }

                Toastr::success('Add section successfully', 'Succeed');
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            dd($e);
        }

        Toastr::warning('Failed to add section', 'Failed');
        return Redirect::intended('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CourseLesson $courseLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseLesson $courseLesson)
    {
        //
    }
}
