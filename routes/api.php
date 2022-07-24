<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChatboxController;
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

Route::group(['middleware' => ['auth:sanctum'], 'as' => 'api.'], function () {
    Route::post('/courses/enroll', [ChatboxController::class, 'enroll'])->name("course.enroll");
    Route::get('/courses/my-courses', [ChatboxController::class, 'myCourses'])->name("course.my-courses");
});
