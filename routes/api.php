<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\AuthController;
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
});
