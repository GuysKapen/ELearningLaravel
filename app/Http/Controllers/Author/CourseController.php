<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Library\DurationType;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseAssessment;
use App\Models\CourseDetail;
use App\Models\CourseLesson;
use App\Models\CoursePrice;
use App\Models\CourseQuiz;
use App\Models\CourseRequirement;
use App\Models\CourseResult;
use App\Models\CourseSection;
use App\Models\CourseTarget;
use App\Models\EvaluateType;
use App\Models\LessonContent;
use App\Models\LessonDetail;
use App\Models\LessonResource;
use App\Models\ProgrammingLanguage;
use App\Models\QuestionAnswer;
use App\Models\QuestionDetail;
use App\Models\QuestionOption;
use App\Models\QuizDetail;
use App\Models\QuizQuestion;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\NewAuthorCourse;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
        $categories = Category::all();
        $tags = Tag::all();
        $programmingLanguages = ProgrammingLanguage::all();
        $timeUnits = DurationType::toCollection();
        $authors = DB::table("users")
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select("users.id", "users.username")
            ->where("roles.id", 2)
            ->get();

        $coAuthors = $authors->where("id", "!=", Auth::user()->id);
        return view('author.course.create', compact('courseDetail', 'evaluateTypes', 'courseAssessment', 'categories', 'authors', 'coAuthors', 'tags', 'timeUnits', 'programmingLanguages'));
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
            'name' => 'required|unique:courses',
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

            $course->saveOrFail();

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


            // Course results info
            if (
                isset($request->results)
                && !empty($request->results)
            ) {
                $results = $request->results;

                foreach ($results as $key => $value) {
                    if (empty($value)) {
                        unset($results[$key]);
                    }
                }

                if (!empty($results)) {

                    $courseResults = [];
                    foreach ($results as $result) {
                        $courseResult = new CourseResult();
                        $courseResult->result = $result;
                        $courseResults[] = $courseResult;
                    }

                    $course->results()->saveMany($courseResults);
                }
            }

            // Course requirements info
            if (
                isset($request->requirements)
                && !empty($request->requirements)
            ) {
                $requirements = $request->requirements;

                foreach ($requirements as $key => $value) {
                    if (empty($value)) {
                        unset($requirements[$key]);
                    }
                }

                if (!empty($requirements)) {
                    $courseRequirements = [];
                    foreach ($request->requirements as $requirement) {
                        $courseRequirement = new CourseRequirement();
                        $courseRequirement->requirement = $requirement;
                        $courseRequirements[] = $courseRequirement;
                    }

                    $course->requirements()->saveMany($courseRequirements);
                }
            }

            // Course targets info
            if (
                isset($request->targets)
                && !empty($request->targets)
            ) {
                $targets = $request->targets;

                foreach ($targets as $key => $value) {
                    if (empty($value)) {
                        unset($targets[$key]);
                    }
                }

                if (!empty($targets)) {
                    $courseTargets = [];
                    foreach ($request->targets as $target) {
                        $courseTarget = new CourseTarget();
                        $courseTarget->target = $target;
                        $courseTargets[] = $courseTarget;
                    }

                    $course->targets()->saveMany($courseTargets);
                }
            }

            // Course evaluate
            if (
                isset($request->evaluate_type_id)
                && isset($request->pass_condition)
            ) {
                $courseAssessment = new CourseAssessment();
                $courseAssessment->evaluate_type_id = $request->evaluate_type_id;
                $courseAssessment->pass_condition = $request->pass_condition;
                $course->courseAssessment()->save($courseAssessment);
            }

            // Course price
            if (isset($request->price)) {
                $coursePrice = $course->coursePrice ?? new CoursePrice();
                $coursePrice->price = $request->price;
                $course->coursePrice()->save($coursePrice);
            }

            // Course curriculum
            if (
                isset($request->sections) && is_array($request->sections)
                && !empty($request->sections)
            ) {

                $sections = array_values($request['sections']);
                foreach ($sections as $key => $value) {
                    if (empty($value)) {
                        unset($sections[$key]);
                    }
                }

                if (!empty($sections)) {
                    for ($i = 0; $i < count($sections); ++$i) {
                        $section = &$sections[$i];
                        $section += array('slug' => Str::slug($section['name']));
                        $section += array('course_id' => $course->id);
                        $section += array('index' => $i);

                        $courseSection = new CourseSection($section);

                        $course->sections()->save($courseSection);

                        // Save lessons
                        if (
                            isset($section['lessons']) && is_array($section['lessons'])
                            && !empty($section['lessons'])
                        ) {
                            $lessons = array_values($section['lessons']);
                            for ($j = 0; $j < count($lessons); ++$j) {
                                $lesson = $lessons[$j];
                                $lesson += ['slug' => Str::slug($lesson['title'])];
                                $lesson += ['course_section_id' => $courseSection->id];

                                $courseLesson = new CourseLesson($lesson);

                                $courseSection->lessons()->save($courseLesson);

                                if (isset($lesson['resource']) && isset($lesson['resource']['video'])) {
                                    $resource = $lesson['resource'];
                                    $resource += ['course_lesson_id' => $courseLesson->id];
                                    $lessonResource = new LessonResource($resource);

                                    $courseLesson->resource()->save($lessonResource);
                                }

                                if (isset($lesson['content']['content']) && !empty($lesson['content']['content'])) {
                                    $content = $lesson['content'];
                                    $lessonContent = new LessonContent($content);

                                    $courseLesson->content()->save($lessonContent);
                                }

                                if (isset($lesson['detail']) && !empty($lesson['detail'])) {
                                    $detail = $lesson['detail'];
                                    $lessonDetail = new LessonDetail();

                                    $factor = 1;
                                    switch ($detail['duration_type']) {
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

                                    $lessonDetail->is_preview = isset($detail['is_preview']);
                                    $lessonDetail->duration = $factor * $detail['duration'];

                                    $courseLesson->detail()->save($lessonDetail);
                                }
                            }
                        }

                        // Save quizzes
                        if (
                            isset($section['quizzes']) && is_array($section['quizzes'])
                            && !empty($section['quizzes'])
                        ) {
                            $quizzes = array_values($section['quizzes']);
                            for ($j = 0; $j < count($quizzes); ++$j) {
                                $quiz = $quizzes[$j];
                                $quiz += ['slug' => Str::slug($quiz['name'])];
                                $quiz += ['course_section_id' => $courseSection->id];

                                $courseQuiz = new CourseQuiz($quiz);

                                $course->quizzes()->save($courseQuiz);

                                if (isset($quiz['detail']) && !empty($quiz['detail'])) {
                                    $detail = $quiz['detail'];
                                    $quizDetail = new QuizDetail();

                                    $factor = 1;
                                    switch ($detail['duration_type']) {
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

                                    $quizDetail->allow_num_attempt = $detail['allow_num_attempt'];
                                    $quizDetail->duration = $factor * $detail['duration'];
                                    $quizDetail->description = $detail['description'];

                                    $courseQuiz->detail()->save($quizDetail);
                                }

                                if (isset($quiz['questions']) && is_array($quiz['questions'])) {
                                    $questions = array_values($quiz['questions']);

                                    for ($k = 0; $k < count($questions); ++$k) {
                                        $question = $questions[$k];
                                        $question += ['slug' => Str::slug($quiz['name'])];
                                        $question += ['quiz_id' => $courseQuiz->id];

                                        $quizQuestion = new QuizQuestion($question);

                                        $courseQuiz->questions()->save($quizQuestion);

                                        if (isset($question['options']) && is_array($question['options'])) {
                                            $options = array_values($question['options']);
                                            for ($l = 0; $l < count($options); ++$l) {
                                                $option = $options[$l];
                                                $option += ['quiz_question_id' => $quizQuestion->id];

                                                $questionOption = new QuestionOption($option);

                                                $quizQuestion->options()->save($questionOption);

                                                // Save answer
                                                if (isset($option['answer'])) {
                                                    $questionAnswer = new QuestionAnswer();
                                                    $questionAnswer->question_option_id = $questionOption->id;
                                                    $questionAnswer->quiz_question_id = $quizQuestion->id;

                                                    $quizQuestion->answers()->save($questionAnswer);
                                                }
                                            }
                                        }

                                        // Save detail
                                        if (isset($question['detail']) && !empty($question['detail'])) {
                                            $detail = $question['detail'];
                                            $questionDetail = new QuestionDetail($detail);

                                            $quizQuestion->detail()->save($questionDetail);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // Course categories
            if (isset($request->categories) && is_array($request->categories)) {
                $course->categories()->sync($request->categories);
            }

            // Course tags
            if (isset($request->tags) && is_array($request->tags)) {
                $course->tags()->sync($request->tags);
            }

            // Course programming languages
            if (isset($request->programming_languages) && is_array($request->programming_languages)) {
                $course->programmingLanguages()->sync($request->programming_languages);
            }

            // Course co_author
            if (isset($request->co_authors) && is_array($request->co_authors)) {
                $course->coAuthors()->sync($request->co_authors);
            }

            // all good
            DB::commit();
            Toastr::success('Save course successfully', 'Succeed');

            // Send email for approved course
            $users = User::where('role_id', 1)->get();
            Notification::send($users, new NewAuthorCourse($course));

            return redirect()->route('author.course.index');
        } catch (\Throwable $e) {
            DB::rollback();
            return $e;
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
        $categories = Category::all();
        $programmingLanguages = ProgrammingLanguage::all();
        $timeUnits = DurationType::toCollection();
        $authors = DB::table("users")
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select("users.id", "users.username")
            ->where("roles.id", 2)
            ->get();
        $tags = Tag::all();
        $coAuthors = $authors->where("id", "!=", Auth::user()->id);
        return view('author.course.edit', compact('course', 'courseDetail', 'courseAssessment', 'evaluateTypes', 'categories', 'authors', 'coAuthors', 'tags', 'timeUnits', 'programmingLanguages'));
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

            $featureImg = $request->file("feature_img");
            if (isset($featureImg)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = Auth::user()->username . '-' . $currentDate . '-' . uniqid() . '.' . $featureImg->getClientOriginalExtension();

                // Image for cover
                if (!Storage::disk('public')->exists('course')) {
                    Storage::disk('public')->makeDirectory('course');
                }

                // Delete old image
                if (!Storage::disk("public")->exists("course/" . $course->feature_img)) {
                    Storage::disk("public")->delete("course/" . $course->feature_img);
                }

                Storage::disk('public')->put('course/' . $imageName, file_get_contents($featureImg));

                $course->feature_img = $imageName;
            }

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

            if (
                isset($request->results)
                && !empty($request->results)
            ) {
                $results = $request->results;

                foreach ($results as $key => $value) {
                    if (empty($value)) {
                        unset($results[$key]);
                    }
                }

                if (!empty($results)) {
                    $courseResults = [];
                    foreach ($request->results as $result) {
                        $courseTarget = new CourseResult();
                        $courseTarget->result = $result;
                        $courseResults[] = $courseTarget;
                    }

                    $course->results()->delete();
                    $course->results()->saveMany($courseResults);
                }
            }

            if (
                isset($request->requirements)
                && !empty($request->requirements)
            ) {
                $requirements = $request->requirements;

                foreach ($requirements as $key => $value) {
                    if (empty($value)) {
                        unset($requirements[$key]);
                    }
                }

                if (!empty($requirements)) {
                    $courseTargets = [];
                    foreach ($request->requirements as $requirement) {
                        $courseTarget = new CourseRequirement();
                        $courseTarget->requirement = $requirement;
                        $courseTargets[] = $courseTarget;
                    }

                    $course->requirements()->delete();
                    $course->requirements()->saveMany($courseTargets);
                }
            }

            if (
                isset($request->targets)
                && !empty($request->targets)
            ) {
                $targets = $request->targets;

                foreach ($targets as $key => $value) {
                    if (empty($value)) {
                        unset($targets[$key]);
                    }
                }

                if (!empty($targets)) {
                    $courseTargets = [];
                    foreach ($request->targets as $target) {
                        $courseTarget = new CourseTarget();
                        $courseTarget->target = $target;
                        $courseTargets[] = $courseTarget;
                    }

                    $course->targets()->delete();
                    $course->targets()->saveMany($courseTargets);
                }
            }

            if (
                isset($request->evaluate_type_id)
                && isset($request->pass_condition)
            ) {
                $courseAssessment = $course->courseAssessment ?? new CourseAssessment();
                $courseAssessment->evaluate_type_id = $request->evaluate_type_id;
                $courseAssessment->pass_condition = $request->pass_condition;
                $courseAssessment->course_id = $course->id;
                $courseAssessment->saveOrFail();
            }

            if (isset($request->price)) {
                $coursePrice = $course->coursePrice ?? new CoursePrice();
                $coursePrice->price = $request->price;
                $coursePrice->course_id = $course->id;
                $coursePrice->saveOrFail();
            }

            // Course curriculum
            if (
                isset($request['sections']) && is_array($request['sections'])
                && !empty($request['sections'])
            ) {

                $sections = array_values($request['sections']);
                foreach ($sections as $key => $value) {
                    if (empty($value)) {
                        unset($sections[$key]);
                    }
                }

                if (!empty($sections)) {
                    for ($i = 0; $i < count($sections); ++$i) {
                        $section = &$sections[$i];
                        $section += array('slug' => Str::slug($section['name']));
                        $section += array('course_id' => $course->id);
                        $section += array('index' => $i);
                    }

                    $course->sections()->sync($sections, function ($section, $model) {
                        if (
                            isset($section['lessons']) && is_array($section['lessons'])
                            && !empty($section['lessons'])
                        ) {
                            $lessons = array_values($section['lessons']);
                            for ($j = 0; $j < count($lessons); ++$j) {
                                $lesson = &$lessons[$j];
                                $lesson += ['slug' => Str::slug($lesson['title'])];
                                $lesson += ['course_section_id' => $model->id];
                            }

                            // Sync lessons and nested
                            $model->lessons()->sync($lessons, function ($lesson, $model) {
                                if (isset($lesson['resource']) && isset($lesson['resource']['video'])) {
                                    $resource = &$lesson['resource'];
                                    $lessonResource = $model->resource ?? new LessonResource();
                                    $lessonResource->video = $resource['video'];
                                    $lessonResource->course_lesson_id = $model->id;

                                    $lessonResource->saveOrFail();
                                }

                                if (isset($lesson['content']) && isset($lesson['content']['content'])) {
                                    $content = &$lesson['content'];
                                    $content += ['course_lesson_id' => $model->id];
                                    $lessonContent = $model->content ?? new LessonContent($content);

                                    $lessonContent->saveOrFail();
                                }

                                if (isset($lesson['detail']) && isset($lesson['detail']['duration'])) {
                                    $detail = &$lesson['detail'];
                                    $detail += ['course_lesson_id' => $model->id];

                                    $factor = 1;
                                    switch ($detail['duration_type']) {
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

                                    $duration = $factor * $detail['duration'];

                                    $lessonDetail = $model->detail ?? new LessonDetail($detail);
                                    $lessonDetail->duration = $duration;
                                    $lessonDetail->is_preview = isset($detail['is_preview']);
                                    $lessonDetail->course_lesson_id = $model->id;

                                    $lessonDetail->saveOrFail();
                                }
                            });
                        }

                        if (
                            isset($section['quizzes']) && is_array($section['quizzes'])
                            && !empty($section['quizzes'])
                        ) {

                            // Save quizzes
                            $quizzes = array_values($section['quizzes']);
                            for ($j = 0; $j < count($quizzes); ++$j) {
                                $quiz = &$quizzes[$j];
                                $quiz += ['slug' => Str::slug($quiz['name'])];
                                $quiz += ['course_id' => $model->course->id];
                            }

                            // Sync quizzes and nested
                            $model->course->quizzes()->sync($quizzes, function ($quiz, $model) {
                                if (isset($quiz['detail']) && isset($quiz['detail']['duration'])) {
                                    $detail = &$quiz['detail'];
                                    $detail += ['course_quiz_id' => $model->id];

                                    $factor = 1;
                                    switch ($detail['duration_type']) {
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

                                    $detail['duration'] = $factor * $detail['duration'];

                                    $lessonDetail = $model->detail ?? new QuizDetail($detail);
                                    $lessonDetail->duration = $detail['duration'];
                                    $lessonDetail->description = $detail['description'];
                                    $lessonDetail->allow_num_attempt = $detail['allow_num_attempt'];

                                    $lessonDetail->saveOrFail();
                                }

                                if (isset($quiz['questions']) && is_array($quiz['questions'])) {
                                    $questions = array_values($quiz['questions']);
                                    for ($j = 0; $j < count($questions); ++$j) {
                                        $question = &$questions[$j];
                                        $question += ['course_quiz_id' => $model->id];
                                    }

                                    // Sync questions
                                    $model->questions()->sync($questions, function ($question, $model) {
                                        // Remove answers
                                        $model->answers()->delete();
                                        // Sync options
                                        if (isset($question['options']) && is_array($question['options'])) {
                                            $options = array_values($question['options']);
                                            for ($j = 0; $j < count($options); ++$j) {
                                                $option = &$options[$j];
                                                $option += ['quiz_question_id' => $model->id];
                                            }

                                            $model->options()->sync($options, function ($option, $model) {
                                                if (isset($option['answer'])) {
                                                    $answer = ["quiz_question_id" => $option['quiz_question_id']];
                                                    $answer += ['question_option_id' => $model->id];
                                                    $questionAnswer = new QuestionAnswer($answer);
                                                    $questionAnswer->saveOrFail();
                                                }
                                            });
                                        }

                                        // Sync detail
                                        if (isset($question['detail']) && is_array($question['detail'])) {
                                            $detail = &$question['detail'];
                                            $questionDetail = $model->detail ?? new QuestionDetail($detail);

                                            $model->detail()->updateOrCreate($questionDetail->attributesToArray());
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            }

            // Course categories
            if (isset($request->categories) && is_array($request->categories)) {
                $course->categories()->sync($request->categories);
            }

            // Course tags
            if (isset($request->tags) && is_array($request->tags)) {
                $course->tags()->sync($request->tags);
            }

            // Course programming languages
            if (isset($request->programming_languages) && is_array($request->programming_languages)) {
                $course->programmingLanguages()->sync($request->programming_languages);
            }

            // Course co_author
            if (isset($request->co_authors) && is_array($request->co_authors)) {
                $course->coAuthors()->sync($request->co_authors);
            }

            DB::commit();
            // all good
            Toastr::success('Save course successfully', 'Succeed');
            return redirect()->route('author.course.index');
        } catch (\Throwable $e) {
            DB::rollback();
            return $e;
            // something went wrong
        }

        Toastr::warning('Failed to save course', 'Failed');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function editCourseCurriculum(Course $course)
    {
        $evaluateTypes = EvaluateType::all();
        $courseDetail = $course->detail ?? new CourseDetail();
        $courseAssessment = $course->courseAssessment ?? new CourseAssessment();
        return view('author.course.course_curri', compact('course', 'courseDetail', 'courseAssessment', 'evaluateTypes'));
    }
}
