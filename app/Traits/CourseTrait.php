<?php

namespace App\Traits;

use App\Library\SortType;
use App\Models\Category;
use App\Models\Course;
use App\Models\ProgrammingLanguage;
use App\Models\Tag;
use Illuminate\Http\Request;

/**
 * A helper trait to for course model
 */
trait CourseTrait
{
    public function searchCourses(Request $request, $paginate = false, $strict = null)
    {
        $params = [];
        $categories = [];
        $authors = [];
        $programmingLanguages = [];
        $tags = [];

        $strict = $strict ?? ($request->strict ?? false);

        // Keyword for filter
        if (isset($request->keywords) && is_array($request->keywords) && !empty($request->keywords)) {
            // Check if keyword is category
            foreach ($request->keywords as $key => $value) {
                $model = Category::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($value) . '%'])->first();
                if (isset($model)) {
                    $categories[$key] = $model->id;
                }
            }

            // Check if keyword is programming language
            foreach ($request->keywords as $key => $value) {
                $model = ProgrammingLanguage::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($value) . '%'])->first();
                if (isset($model)) {
                    $programmingLanguages[$key] = $model->id;
                }
            }

            // Check if keyword is tag
            foreach ($request->keywords as $key => $value) {
                $model = Tag::query()->whereRaw("UPPER(tag) LIKE ?", ['%' . strtoupper($value) . '%'])->first();
                if (isset($model)) {
                    $tags[$key] = $model->id;
                }
            }

            if (empty($categories) && empty($programmingLanguages) && empty($tags)) {
                return collect();
            }
        }

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
            $categories = array_merge($categories, array_values($request["cats"]));
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
        }


        // Filter with categories
        if (!empty($categories)) {
            $courses_query = $courses_query
                ->leftJoin("category_course as cc", "cc.course_id", "=", "courses.id");

            // Filter based on strict mode or not
            if ($strict) {
                $courses_query = $courses_query->whereIn("cc.category_id", $categories);
            } else {
                $courses_query = $courses_query->orWhereIn("cc.category_id", $categories);
            }
            $params += ['cats' => $categories];
        }

        // Filter with pro langs
        if (!empty($programmingLanguages)) {
            $courses_query = $courses_query
                ->leftJoin("course_programming_language as cpl", "cpl.course_id", "=", "courses.id");
            if ($strict) {
                $courses_query = $courses_query->whereIn("cpl.programming_language_id", $programmingLanguages);
            } else {
                $courses_query = $courses_query->orWhereIn("cpl.programming_language_id", $programmingLanguages);
            }
            $params += ['codes' => $programmingLanguages];
        }

        // Filter with tags
        if (!empty($tags)) {
            $courses_query = $courses_query
                ->leftJoin("course_tag as ct", "ct.course_id", "=", "courses.id");

            // Filter based on strict mode or not
            if ($strict) {
                $courses_query = $courses_query->whereIn("ct.tag_id", $categories);
            } else {
                $courses_query = $courses_query->orWhereIn("ct.tag_id", $categories);
            }
            $params += ['cats' => $categories];
        }

        // Filter with authors
        $authors = $request->authors;
        if (isset($authors) && !empty($authors)) {
            if ($strict) {
                $courses_query = $courses_query->whereIn("courses.user_id", $authors);
            } else {
                $courses_query = $courses_query->orWhereIn("courses.user_id", $authors);
            }
            $params += ['authors' => $authors];
        }

        $col = 'courses.updated_at';
        $direction = 'desc';
        if (isset($request->sort)) {
            switch ($request->sort) {
                case SortType::Newest:
                    $col = 'courses.updated_at';
                    $direction = 'desc';
                    break;
                case SortType::Oldest:
                    $col = 'courses.updated_at';
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
