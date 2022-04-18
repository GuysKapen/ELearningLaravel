<?php

use App\Http\Controllers\Author\CourseController;
use App\Http\Controllers\HomeController;
use Brian2694\Toastr\Facades\Toastr;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/course/{course}', [HomeController::class, 'course'])->name('course');
Route::get('/courses/', [HomeController::class, 'courses'])->name('courses');
Route::post('/courses/filter', [HomeController::class, 'filter'])->name("course.filter");
Route::post('/courses/search', [HomeController::class, 'search'])->name("course.search");

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category', 'CategoryController');
    Route::resource('sub-category', 'SubCategoryController');
    Route::resource('language', 'LanguageController');
    Route::get('course/', 'CourseController@index')->name('course.index');
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
});
