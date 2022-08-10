<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseStatisticResource;
use App\Traits\AuthorTrait;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use AuthorTrait;

    public function courseStatistic(Request $request)
    {
        return CourseStatisticResource::collection($this->courses($request));
    }
}
