<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [HomeController::class, 'index'])->name("index");

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/courses/', [HomeController::class, 'courses'])->name('courses');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/course/{course}', [HomeController::class, 'course'])->name('course');
    Route::post('/courses/filter', [HomeController::class, 'filter'])->name("course.filter");
    Route::post('/courses/search', [HomeController::class, 'search'])->name("course.search");
    Route::post('/courses/sort', [HomeController::class, 'sort'])->name("course.sort");
    Route::post('/courses/comment', [HomeController::class, 'comment'])->name("course.comment");
    Route::post('/courses/enroll', [HomeController::class, 'enroll'])->name("course.enroll");
    Route::post('/course/purchase', [HomeController::class, 'purchase'])->name('course.purchase');
    Route::get('/course/detail/{course}/lesson/{lesson?}', [HomeController::class, 'courseDetail'])->name('course.detail');
    Route::get('/course/detail/{course}/quiz/{quiz}', [HomeController::class, 'courseDetailQuiz'])->name('course.detail.quiz');
    Route::get('/course/checkout/{course}', [HomeController::class, 'checkout'])->name('course.checkout');
    Route::get('/quiz/attempt/{attempt}/review', [HomeController::class, 'quizAttemptReview'])->name('quiz.attempt.review');
    Route::post('/quiz/attempt', [HomeController::class, 'attemptQuiz'])->name('quiz.attempt');
    Route::post('/quiz/submit', [HomeController::class, 'submitQuiz'])->name('quiz.submit');
    Route::post('/quiz/attempt/answer/submit', [HomeController::class, 'submitAttemptAnswer'])->name('quiz.attempt.answer.submit');
    Route::get('/course/detail/{course}/quiz/attempt/{attempt}', [HomeController::class, 'courseDetailQuizAttempt'])->name('course.detail.quiz.attempt');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('sub-category', 'SubCategoryController');
    Route::resource('language', 'LanguageController');
    Route::get('course/', 'CourseController@index')->name('course.index');
    Route::put("course/{id}/approve", 'CourseController@approve')->name('course.approve');
});

Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'App\Http\Controllers\Author', 'middleware' => ['auth', 'author']], function () {
    Route::post('course/add-section', 'CourseController@addSection')->name('course.add-section');
    Route::get('course/new-lesson/{courseSection}', 'CourseController@newLesson')->name('course.new-lesson');
    Route::get('course/lesson/{courseLesson}', 'CourseLessonController@show')->name('course.lesson.show');
    Route::get('course/curri/{course}', 'CourseController@editCourseCurriculum')->name('course.curri.edit');
    Route::resource('course', 'CourseController');
    Route::resource('course-lesson', 'CourseLessonController');
    Route::post('profile', 'ProfileController@updateProfile')->name("profile.update");
    Route::get('profile', 'ProfileController@profile')->name("profile.show");
    Route::get("dashboard", 'AuthorController@dashboard')->name("dashboard");
    Route::get("questions", "AuthorController@questions")->name("questions");
    Route::get("tools", "AuthorController@tools")->name("tools");
    Route::get("resources", "AuthorController@resources")->name("resources");
    Route::get("courses", "AuthorController@courses")->name("courses");
});
