<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\ChatboxController;
use App\Http\Controllers\API\ViewUtilsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/courses', [ChatBoxController::class, 'courses'])->name("chatbox.courses");
Route::get('/similar-courses', [ChatBoxController::class, 'searchSimilar'])->name("chatbox.similar-courses");
Route::post('/show-courses', [ChatBoxController::class, 'showCourses'])->name('chatbox.courses.show');

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

// View utils
Route::controller(ViewUtilsController::class)->group(function () {
    Route::get('/render-table', 'renderTable');
});

Route::group(['middleware' => ['auth:sanctum'], 'as' => 'api.'], function () {
    Route::get('/is-admin', [AuthController::class, "isAdmin"])->name("is-admin");
    Route::get('/is-author', [AuthController::class, "isAuthor"])->name("is-author");
    Route::post('/courses/enroll', [ChatboxController::class, 'enroll'])->name("course.enroll");
    Route::get('/courses/my-courses', [ChatboxController::class, 'myCourses'])->name("course.my-courses");
    Route::get('/courses/progress', [ChatboxController::class, 'courseProgress'])->name("course.progress");
});

Route::group(['middleware' => ['auth:sanctum', 'admin'], 'as' => 'api.admin.', 'prefix' => 'admin'], function () {
    Route::get('/courses/pending', [AdminController::class, 'pendingCourses'])->name("course.pending");
    Route::put('/courses/approve', [AdminController::class, 'approve'])->name("course.approve");

    Route::get('/categories', [AdminController::class, 'listCategory'])->name("category.index");
    Route::get('/category', [AdminController::class, 'getCategory'])->name("category.show");
    Route::get('/category/similar', [AdminController::class, 'searchSimilarCategories'])->name("category.similar");
    Route::post('/category', [AdminController::class, 'saveCategory'])->name("category.store");
    Route::delete('/category', [AdminController::class, 'deleteCategory'])->name("category.destroy");

    Route::get('/languages', [AdminController::class, 'listLanguage'])->name("language.index");
    Route::get('/language', [AdminController::class, 'getLanguage'])->name("language.show");
    Route::get('/language/similar', [AdminController::class, 'searchSimilarLanguages'])->name("language.similar");
    Route::post('/language', [AdminController::class, 'saveLanguage'])->name("langauge.store");
    Route::delete('/language', [AdminController::class, 'deleteLanguage'])->name("language.destroy");

    Route::get('/programming-languages', [AdminController::class, 'listProgrammingLanguage'])->name("programming-language.index");
    Route::get('/programming-language', [AdminController::class, 'getProgrammingLanguage'])->name("programming-language.show");
    Route::get('/programming-language/similar', [AdminController::class, 'searchSimilarProgrammingLanguages'])->name("programming-language.similar");
    Route::post('/programming-language', [AdminController::class, 'saveProgrammingLanguage'])->name("programming-langauge.store");
    Route::delete('/programming-language', [AdminController::class, 'deleteProgrammingLanguage'])->name("programming-language.destroy");
});


Route::group(['middleware' => ['auth:sanctum', 'author'], 'as' => 'api.author.', 'prefix' => 'author'], function () {
    Route::get('/courses/statistic', [AuthorController::class, 'courseStatistic'])->name("course.statistic");
});
