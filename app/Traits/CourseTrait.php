<?php

namespace App\Traits;

use App\Library\SortType;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

/**
 * A helper trait to for course model
 */
trait CourseTrait
{
    public function searchCourses(Request $request, $paginate = false)
    {
        $params = [];
        if (isset($request->search)) {
            $courses_query = Course::query()
                ->leftJoin("course_prices as cp", "cp.course_id", "=", "courses.id")
                ->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($request->search) . '%']);

            $params[] = ['search' => $request->search];
        } else {
            $courses_query = Course::query()
                ->leftJoin("course_prices as cp", "cp.course_id", "=", "courses.id");
        }

        if (isset($request["cats"]) && is_array($request["cats"]) && !empty($request["cats"])) {
            $categories = array_values($request["cats"]);

            foreach ($categories as $key => $cat) {
                if (!is_int($cat)) {
                    $model = Category::query()->whereRaw("UPPER(name) = ?", [strtoupper($cat)])->first();
                    if (isset($model)) {
                        $categories[$key] = $model->id;
                    } else {
                        unset($categories[$key]);
                    }
                }
            }


            $courses_query = $courses_query
                ->leftJoin("category_course as cc", "cc.course_id", "=", "courses.id");
            $courses_query = $courses_query->whereIn("cc.category_id", $categories);
            $params += ['cats' => $categories];
        }

        $authors = $request->authors;
        if (isset($authors) && !empty($authors)) {
            $courses_query = $courses_query->whereIn("courses.user_id", $authors);
            $params += ['authors' => $authors];
        }

        $col = 'updated_at';
        $direction = 'desc';
        if (isset($request->sort)) {
            switch ($request->sort) {
                case SortType::Newest:
                    $col = 'updated_at';
                    $direction = 'desc';
                    break;
                case SortType::Oldest:
                    $col = 'updated_at';
                    $direction = 'asc';
                    break;
                case SortType::Cheapest:
                    $col = 'price';
                    $direction = 'desc';
                    break;
                case SortType::Expest:
                    $col = 'price';
                    $direction = 'asc';
                    break;
            }

            $params += ['sort' => $request->sort];
        }

        if ($paginate) {
            $courses = $courses_query->select("courses.*")->distinct()->orderBy($col, $direction)->simplePaginate(12)->appends($params);
        } else {
            $courses = $courses_query->select("courses.*")->distinct()->orderBy($col, $direction)->get();
        }

        return $courses;
    }
}
