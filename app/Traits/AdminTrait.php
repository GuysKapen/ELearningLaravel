<?php

namespace App\Traits;

use App\Library\SortType;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\ProgrammingLanguage;
use App\Models\Tag;
use App\Notifications\AuthorCourseApproved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * A helper trait to for course model
 */
trait AdminTrait
{

    public function categories()
    {
        $categories = Category::latest()->get();
        return $categories;
    }

    public function storeCategory(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        $name = $request->name;

        $slug = Str::slug($name);

        $category = new Category();
        $category->name = $name;
        $category->slug = $slug;

        if ($category->save()) {
            return true;
        }
        return false;
    }

    public function destroyCategory($name)
    {
        $slug = Str::slug($name);
        $category = Category::where('slug', '=', $slug);
        if (!isset($category)) {
            return false;
        }
        if ($category->delete()) {
            return true;
        }

        return false;
    }

    public function getCategory($name)
    {
        $slug = Str::slug($name);
        $category = Category::where('slug', '=', $slug);
        return $category;
    }

    public function similarCategories($name, $paginate = false)
    {

        $col = "name";

        if (isset($name)) {
            // Need to use expression instead of similarity to work
            $query = Category::selectRaw("categories.*, levenshtein(name, ?) as similarity", [$name])
                ->whereRaw("levenshtein(name, ?) < greatest(length(?) / 2, 10)", [$name, $name]);
            $col = "similarity";
        } else {
            $query = Course::query();
        }

        if ($paginate) {
            $resources = $query->orderBy($col)->simplePaginate(12);
        } else {
            $resources = $query->orderBy($col)->get();
        }

        return $resources;
    }
}
