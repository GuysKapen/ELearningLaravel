<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
