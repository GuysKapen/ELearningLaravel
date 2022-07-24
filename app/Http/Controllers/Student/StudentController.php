<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function courses() {
        $courses = Auth::user()->enrolledCourses;
        return view("student.courses", compact("courses"));
    }
}
