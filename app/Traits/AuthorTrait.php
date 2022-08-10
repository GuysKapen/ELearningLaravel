<?php

namespace App\Traits;

use App\Http\Resources\CourseStatisticResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * A helper trait to for course model
 */
trait AuthorTrait
{
    public function courses(Request $request)
    {
        return $request->user()->courses;
    }
}
