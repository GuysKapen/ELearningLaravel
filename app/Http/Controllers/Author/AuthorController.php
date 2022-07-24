<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function dashboard() {
        return view("author.dashboard");
    }

    public function questions() {
        return view("author.questions");
    }

    public function tools() {
        return view("author.tools");
    }

    public function resources() {
        return view("author.resources");
    }

    public function courses() {
        $courses = Auth::user()->courses;
        return view('author.courses', compact('courses'));
    }
}
