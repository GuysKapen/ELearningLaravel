<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\LanguageResource;
use App\Http\Resources\ProgrammingLanguageResource;
use App\Models\Category;
use App\Models\Course;
use App\Models\Language;
use App\Models\ProgrammingLanguage;
use App\Traits\AdminTrait;
use App\Traits\CourseTrait;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    use CourseTrait;
    use AdminTrait;

    public function pendingCourses(Request $request)
    {
        $pendingCourses = Course::where("is_approved", "=", false)->get();
        return $this->sendResponse(CourseResource::collection($pendingCourses), "Succeed");
    }

    public function approve(Request $request)
    {
        $this->validate($request, ["course_id" => "required"]);
        if ($this->approveCourse($request["course_id"])) {
            return $this->sendResponse([], "Succeed approve course");
        } else {
            return $this->sendError("Failed to approve course");
        }
    }

    /**
     * List all categories
     */
    public function listCategory()
    {
        return CategoryResource::collection($this->categories());
    }
    /**
     * Admin add category
     */
    public function saveCategory(Request $request)
    {
        if ($this->storeCategory($request)) {
            return $this->sendResponse([], "Succeed add category");
        } else {
            return $this->sendError("Failed to add category");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->name;
        if ($this->destroyCategory($name)) {
            return $this->sendResponse([], "Succeed delete category");
        } else {
            return $this->sendError("Failed to delete category");
        }
    }

    public function getSimilarCategoriesResource(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->name;
        $categories = $this->similarCategories($name);
        return CategoryResource::collection($categories);
    }

    public function searchSimilarCategories(Request $request)
    {
        $name = $request["name"];
        $resource = Category::query()->whereRaw("UPPER(name) = ?", [strtoupper($name)])->first();
        if (isset($resource)) {
            return $this->sendResponse(["resource" => new CategoryResource($resource), "extras" => null], "Succeed");
        }
        $resources = Category::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($name) . '%'])->get();
        if (isset($resources) && !$resources->isEmpty()) {
            return $this->sendResponse(["resource" => null, "extras" => CategoryResource::collection($resources)], "Not found");
        }
        return $this->sendResponse(["resource" => null, "extras" => $this->getSimilarCategoriesResource($request)], "Not found");
    }

    # Languages
     /**
     * List all categories
     */
    public function listLanguage()
    {
        return LanguageResource::collection($this->languages());
    }
    /**
     * Admin add category
     */
    public function saveLanguage(Request $request)
    {
        if ($this->storeLanguage($request)) {
            return $this->sendResponse([], "Succeed add language");
        } else {
            return $this->sendError("Failed to add language");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteLanguage(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->name;
        if ($this->destroyLanguage($name)) {
            return $this->sendResponse([], "Succeed delete language");
        } else {
            return $this->sendError("Failed to delete language");
        }
    }

    public function getSimilarLanguagesResource(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->name;
        $categories = $this->similarLanguages($name);
        return LanguageResource::collection($categories);
    }

    public function searchSimilarLanguages(Request $request)
    {
        $name = $request["name"];
        $resource = Language::query()->whereRaw("UPPER(name) = ?", [strtoupper($name)])->first();
        if (isset($resource)) {
            return $this->sendResponse(["resource" => new LanguageResource($resource), "extras" => null], "Succeed");
        }
        $resources = Language::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($name) . '%'])->get();
        if (isset($resources) && !$resources->isEmpty()) {
            return $this->sendResponse(["resource" => null, "extras" => LanguageResource::collection($resources)], "Not found");
        }
        return $this->sendResponse(["resource" => null, "extras" => $this->getSimilarLanguagesResource($request)], "Not found");
    }

    # Programming languages
     /**
     * List all categories
     */
    public function listProgrammingLanguage()
    {
        return ProgrammingLanguageResource::collection($this->programmingLanguages());
    }
    /**
     * Admin add category
     */
    public function saveProgrammingLanguage(Request $request)
    {
        if ($this->storeProgrammingLanguage($request)) {
            return $this->sendResponse([], "Succeed add programming language");
        } else {
            return $this->sendError("Failed to add programming language");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProgrammingLanguage(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->name;
        if ($this->destroyProgrammingLanguage($name)) {
            return $this->sendResponse([], "Succeed delete programming language");
        } else {
            return $this->sendError("Failed to delete programming language");
        }
    }

    public function getSimilarProgrammingLanguagesResource(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $name = $request->name;
        $resources = $this->similarProgrammingLanguages($name);
        return ProgrammingLanguageResource::collection($resources);
    }

    public function searchSimilarProgrammingLanguages(Request $request)
    {
        $name = $request["name"];
        $resource = ProgrammingLanguage::query()->whereRaw("UPPER(name) = ?", [strtoupper($name)])->first();
        if (isset($resource)) {
            return $this->sendResponse(["resource" => new ProgrammingLanguageResource($resource), "extras" => null], "Succeed");
        }
        $resources = ProgrammingLanguage::query()->whereRaw("UPPER(name) LIKE ?", ['%' . strtoupper($name) . '%'])->get();
        if (isset($resources) && !$resources->isEmpty()) {
            return $this->sendResponse(["resource" => null, "extras" => ProgrammingLanguageResource::collection($resources)], "Not found");
        }
        return $this->sendResponse(["resource" => null, "extras" => $this->getSimilarProgrammingLanguagesResource($request)], "Not found");
    }

}
