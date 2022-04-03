@push('css')
    <link
        href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
        rel="stylesheet"
    />
@endpush

<section class="section">
    <form class="simple_form new_course" id="new_course" novalidate="novalidate"
          enctype="multipart/form-data"
          action="{{ !isset($course) ? route('author.course.store') :  route('author.course.update',  $course->id ) }}"
          accept-charset="UTF-8"
          method="post"
          data-dashlane-rid="e79702557837d0d6" data-form-type="identity">

        @isset($course->id)
            @method('PATCH')
        @endisset

        @csrf

        <div class="flex background-white-grey tab-view">
            <div class="w-full flex">
                <div class="w-9/12 px-8 tabs-content mt-4">

                    <div class="tab-content active">
                        <div class="field">
                            <div class="control">
                                <label class="block font-semibold text-sm" for="input1">Course name</label>
                                <input id="name"
                                       name="name"
                                       value="{{ old('name', isset($course) ? $course->name : "") }}"
                                       required
                                       class="string required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                       type="text" autofocus placeholder="Course name..."/>
                            </div>
                        </div>
                        <div class="field mt-5">
                            <div>
                                <label class="block font-semibold mb-2 text-sm" for="input1">Description</label>
                                <textarea id="mce-instance" name="description"
                                          placeholder="Enter content here"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Mores -->
                    <div id="input-author" class="tab-content">
                        <div class="field">
                            <div class="control mt-2">
                                <label class="block font-semibold text-sm mt-2"
                                       for="input1">What will students learn in your course?</label>

                                <div class="">

                                    <div id="course-result">

                                        @if(isset($course->results) && !$course->results->isEmpty())
                                            @foreach($course->results as $key=>$result)
                                                <input id="results"
                                                       name="results[]"
                                                       value="{{ old('result', ($result->result ?? "")) }}"
                                                       class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                       type="text"
                                                       placeholder="How to ..."/>
                                            @endforeach
                                        @else
                                            <input id="results"
                                                   name="results[]"
                                                   class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                   type="text"
                                                   placeholder="How to ..."/>
                                        @endif

                                    </div>

                                    <div
                                        class="text-sm cursor-pointer text-indigo-600 flex items-center mt-2"
                                        id="add-result">
                                        <span class="text-base material-icons outlined">add</span>
                                        <span class="text-sm ml-2">
                                                                Add answer
                                                            </span>
                                    </div>

                                    <span
                                        class="input-desc">The results of the course after complete the course</span>
                                </div>


                            </div>

                        </div>

                        <div class="mt-8">
                            <div class="control mt-2">
                                <label class="block font-semibold text-sm mt-2"
                                       for="input1">Are there any course requirements or
                                    prerequisites?</label>

                                <div class="">

                                    <div id="course-requirements">
                                        @if(isset($course->requirements) && !$course->requirements->isEmpty())
                                            @foreach($course->requirements as $key=>$requirement)
                                                <input id="requirements"
                                                       name="requirements[]"
                                                       value="{{ old('$requirement', ($requirement->requirement ?? "")) }}"
                                                       class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                       type="text"
                                                       placeholder="Need to ..."/>
                                            @endforeach
                                        @else
                                            <input id="requirements"
                                                   name="requirements[]"
                                                   class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                   type="text"
                                                   placeholder="Need to ..."/>
                                        @endif

                                    </div>

                                    <div
                                        class="text-sm cursor-pointer text-indigo-600 flex items-center mt-2"
                                        id="add-requirement">
                                        <span class="text-base material-icons outlined">add</span>
                                        <span class="text-sm ml-2">
                                                                Add answer
                                                            </span>
                                    </div>

                                    <span
                                        class="input-desc">The requirements for the course</span>
                                </div>


                            </div>

                        </div>

                        <div class="mt-8">
                            <div class="control mt-2">
                                <label class="block font-semibold text-sm mt-2"
                                       for="input1">Who are your target students?</label>

                                <div class="">

                                    <div id="course-targets">
                                        @if(isset($course->targets) && !$course->targets->isEmpty())
                                            @foreach($course->targets as $key=>$target)
                                                <input id="targets"
                                                       name="targets[]"
                                                       value="{{ old('target', ($target->target ?? "")) }}"
                                                       class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                       type="text"
                                                       placeholder="Anyone who ..."/>
                                            @endforeach
                                        @else
                                            <input id="targets"
                                                   name="targets[]"
                                                   class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                   type="text"
                                                   placeholder="Anyone who ..."/>
                                        @endif

                                    </div>

                                    <div
                                        class="text-sm cursor-pointer text-indigo-600 flex items-center mt-2"
                                        id="add-target">
                                        <span class="text-base material-icons outlined">add</span>
                                        <span class="text-sm ml-2">
                                                                Add answer
                                                            </span>
                                    </div>

                                    <span
                                        class="input-desc">The targets students of your course</span>
                                </div>


                            </div>

                        </div>

                    </div>
                    <!-- !Mores -->

                    <div id="input-curriculum" class="tab-content">
                        <div id="input-curriculum-section">
                            <div data-id="1" class="input-section bg-gray-100 border py-4 px-2 relative">

                                <div data-id="1"
                                     class="add-lecture absolute left-0 top-10 bg-white px-2 cursor-pointer opacity-0 hover:opacity-100">
                                    <span class="material-icons outlined text-sm">add</span>
                                </div>

                                <div class="flex items-start text-sm">
                                    <span class="ml-2 text-sm font-bold text-black">Section 1:</span>
                                    <div class="flex items-start w-12 flex-shrink-0 ml-2">
                                        <span class="material-icons outlined text-sm">description</span>
                                        <span class="mx-1 text-sm">Introduction</span>
                                    </div>
                                </div>

                                <div id="input-lecture-1">
                                    <div class="m-8 p-3 bg-gray-50 relative">
                                        <div id="lecture-info-1" class="flex items-center text-sm">
                                            <span class="ml-2 text-sm">Lecture 1:</span>
                                            <div class="flex items-start w-12 flex-shrink-0 ml-2">
                                                <span class="material-icons outlined text-sm">description</span>
                                                <span id="lecture-title-1"
                                                      class="mx-1 text-sm flex-shrink-0">Introduction</span>
                                                <span data-id="1"
                                                      class="lecture-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
                                                <span class="icon material-icons text-sm mr-1 mx-2">delete</span>
                                            </div>
                                            <div class="flex-end flex items-center ml-auto">
                                                <button
                                                    class="bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center mr-2">
                                                    <span class="icon material-icons text-sm mr-1">add</span>
                                                    Content
                                                </button>
                                                <span class="icon material-icons text-sm mr-1 mr-2">expand_more</span>
                                                <span class="icon material-icons text-sm mr-1">menu</span>
                                            </div>
                                        </div>

                                        <div id="lecture-input-1" class="text-sm hidden">
                                            <div class="flex items-center">
                                                <label class="block text-sm mr-2"
                                                       for="input1">Lecture 1: </label>
                                                <input id="input-lecture-title-1"
                                                       name="lecture_title"
                                                       class="flex-grow required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                                       type="text"/>
                                            </div>
                                            <div class="flex-end flex items-center justify-end ml-auto">
                                                <div
                                                    id="btn-cancel-lecture"
                                                    data-id="1"
                                                    class="btn-cancel-lecture text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                                                    Cancel
                                                </div>
                                                <div
                                                    id="btn-save-lecture"
                                                    data-id="1"
                                                    class="btn-save-lecture bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                                                    Save
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="add-section" class="cursor-pointer opacity-0 my-4 hover:opacity-100">
                            <span class="material-icons outlined text-base">add</span>
                        </div>

                    </div>

                    <!-- General Attribute -->
                    <div id="input-general" class="tab-content">
                        <div class="field">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Duration</label>
                                <div class="w-8/12">

                                    <input id="duration"
                                           name="duration"
                                           value="{{ old('duration', isset($courseDetail) ? $courseDetail->duration : "10") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="number"
                                           placeholder="Duration"/>

                                    <span
                                        class="input-desc">The duration of the course</span>
                                </div>
                            </div>

                        </div>


                        <div class="field mt-2">
                            <div class="control flex mt-2 justify-start">
                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                       for="input1">Maximum Students</label>
                                <div class="w-8/12">

                                    <input id="max_student"
                                           name="max_student"
                                           value="{{ old('max_student', isset($courseDetail) ? $courseDetail->max_student : "1000") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="number"
                                           placeholder="Max students"/>

                                    <span class="input-desc">Maximum number of students who can enroll the course</span>
                                </div>
                            </div>
                        </div>

                        <div class="field mt-2">
                            <div class="control flex mt-2 justify-start">
                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                       for="input1">Retake Course</label>
                                <div class="w-8/12">

                                    <input id="retake_course"
                                           name="retake_course"
                                           value="{{ old('retake_course', isset($courseDetail) ? $courseDetail->retake_course : "0") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="number"
                                           placeholder="Duration"/>

                                    <span class="input-desc">How many times the user can re take the course. Set to 0 to disable re-taking</span>
                                </div>
                            </div>

                        </div>

                        <div class="field mt-2">
                            <div class="control flex mt-2 justify-start">
                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                       for="input1">Duration Info</label>
                                <div class="w-8/12">

                                    <input id="duration_info"
                                           name="duration_info"
                                           value="{{ old('duration_info', isset($courseDetail) ? $courseDetail->duration_info : "50 hours") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="text"
                                           placeholder="Duration"/>

                                    <span
                                        class="input-desc">Display duration info</span>
                                </div>
                            </div>
                        </div>

                        <div class="field mt-2">
                            <div class="control flex mt-2 justify-start">
                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                       for="input1">Skill Level</label>
                                <div class="w-8/12">

                                    <input id="skill_level"
                                           name="skill_level"
                                           value="{{ old('skill_level', isset($courseDetail) ? $courseDetail->skill_level : "All level") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="text"
                                           placeholder="Skill level"/>

                                    <span
                                        class="input-desc">A passable level with this course</span>
                                </div>
                            </div>
                        </div>

                        <div class="field mt-2">
                            <div class="control flex mt-2 justify-start">
                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                       for="input1">Language</label>
                                <div class="w-8/12">

                                    <input id="duration"
                                           name="language"
                                           value="{{ old('language', isset($courseDetail) ? $courseDetail->language : "English") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="text"
                                           placeholder="Duration"/>

                                    <span
                                        class="input-desc">Language used for studying</span>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- !General Attribute -->

                    <!-- Assessment Input -->
                    <div id="input-inventory" class="tab-content ">

                        <div class="field">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Course Result</label>
                                <div class="w-8/12">

                                    <div class="block">
                                        <div class="mt-2">
                                            @foreach($evaluateTypes as $key=>$type)
                                                <div>
                                                    <label class="inline-flex text-sm items-center">
                                                        <input type="radio"
                                                               class="form-radio w-4 h-4"
                                                               name="evaluate_type_id"
                                                               value="{{$type->id}}"
                                                            {{ $type->id == $courseAssessment->evaluate_type_id ?? -1 ? 'checked' : '' }}>
                                                        <span class="ml-2">{{$type->name}}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <span
                                        class="input-desc">The method to assess the result of a student for a course</span>
                                </div>
                            </div>

                        </div>

                        <div class="field mt-2">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Passing condition (%)</label>
                                <div class="w-8/12">

                                    <div class="flex items-center">
                                        <input id="pass_condition"
                                               name="pass_condition"
                                               value="{{ old('pass_condition', isset($course->courseAssessment) ? $courseAssessment->pass_condition : "75") }}"
                                               required
                                               class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                               type="number"
                                               placeholder="80"/>

                                        <span class="ml-2">%</span>
                                    </div>
                                    <span
                                        class="input-desc">The percentage of quiz result or completed lesson required to finish the course</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- !Assessment Input -->

                    <!-- Pricing Input -->
                    <div id="input-pricing" class="tab-content">
                        <div class="field">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Price</label>
                                <div class="w-8/12">

                                    <input id="price"
                                           name="price"
                                           value="{{ old('price', isset($coursePrice) ? $coursePrice->price : "") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="number"
                                           placeholder="Price"/>

                                    <span
                                        class="input-desc">The price of the course</span>
                                </div>
                            </div>

                        </div>

                        <div class="field mt-2">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Sale Price</label>
                                <div class="w-8/12">

                                    <input id="duration"
                                           name="attr"
                                           value="{{ old('sale_price', isset($courseSalePrice) ? $courseSalePrice->sale_price : "") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="number"
                                           placeholder="Sale Price"
                                    />

                                    <span
                                        class="input-desc">Course sale price. Leave blank to remove sale price</span>
                                </div>
                            </div>

                        </div>

                        <div class="field mt-2">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Sale Start Date</label>
                                <div class="w-8/12">

                                    <input id="duration"
                                           name="attr"
                                           value="{{ old('duration', isset($course) ? $course->duration : "10") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="date"
                                    />

                                    <span
                                        class="input-desc">Course sale price. Leave blank to remove sale price</span>
                                </div>
                            </div>

                        </div>

                        <div class="field mt-2">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Sale Date End</label>
                                <div class="w-8/12">

                                    <input id="duration"
                                           name="attr"
                                           value="{{ old('duration', isset($course) ? $course->duration : "10") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="date"
                                    />

                                    <span
                                        class="input-desc">Course sale price. Leave blank to remove sale price</span>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- !Pricing Input -->

                    <!-- Author -->
                    <div id="input-author" class="tab-content">
                        <div class="field">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Author</label>
                                <div class="w-8/12">

                                    <input id="duration"
                                           name="attr"
                                           value="{{ old('duration', isset($course) ? $course->duration : "10") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="text"
                                           placeholder="Price"/>

                                    <span
                                        class="input-desc">The author of the course</span>
                                </div>
                            </div>

                        </div>

                        <div class="field mt-2">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Co-Author</label>
                                <div class="w-8/12">

                                    <input id="duration"
                                           name="attr"
                                           value="{{ old('duration', isset($course) ? $course->duration : "10") }}"
                                           required
                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                           type="text"
                                           placeholder="Price"/>

                                    <span
                                        class="input-desc">The author of the course</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- !Author -->

                    <!-- Meta -->
                    <div id="input-meta" class="tab-content">
                        <div class="field">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Categories</label>
                                <div class="w-8/12">

                                    <div class="relative flex w-full">
                                        <select
                                            id="select-category"
                                            name="categories[]"
                                            placeholder="Select categories..."
                                            autocomplete="off"
                                            class="block w-full rounded-sm cursor-pointer focus:outline-none"
                                            multiple
                                        >
                                            <option value="1">super admin</option>
                                            <option value="2">admin</option>
                                            <option value="3">writer</option>
                                            <option value="4">user</option>
                                        </select>
                                    </div>

                                    <span
                                        class="input-desc">The categories of the course</span>
                                </div>
                            </div>

                        </div>

                        <div class="field mt-4">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Tags</label>
                                <div class="w-8/12">

                                    <div class="relative flex w-full">
                                        <select
                                            id="select-tag"
                                            name="tags[]"
                                            placeholder="Select tags..."
                                            autocomplete="off"
                                            class="block w-full rounded-sm cursor-pointer focus:outline-none"
                                            multiple
                                        >
                                            <option value="1">super admin</option>
                                            <option value="2">admin</option>
                                            <option value="3">writer</option>
                                            <option value="4">user</option>
                                        </select>
                                    </div>

                                    <span
                                        class="input-desc">The tags of the course</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- !Meta -->

                    <div id="input-author" class="tab-content">
                        <div class="field">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Image Feature</label>
                                <div class="w-8/12">

                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                 fill="none"
                                                 viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="cover"
                                                       class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="image_feature" name="image_feature" type="file"
                                                           class="sr-only">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>

                                    <span
                                        class="input-desc mt-2">The feature image of the course</span>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>
                <div class="w-3/12 overflow-hidden bg-white pt-6 tabs-panel">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <h3 class="text-base font-medium text-gray-900">Setup your course</h3>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-start tab-panel active">
                                <div class="flex items-center h-5">
                                    <input id="comments" name="comments" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Course landing page</p>
                                </div>
                            </div>
                            <div class="flex items-start tab-panel">
                                <div class="flex items-center h-5">
                                    <input id="candidates" name="candidates" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Target your students</p>
                                </div>
                            </div>
                            <div class="flex items-start tab-panel">
                                <div class="flex items-center h-5">
                                    <input id="offers" name="offers" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Course curriculum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <h3 class="text-base font-medium text-gray-900">Course settings</h3>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-start tab-panel">
                                <div class="flex items-center h-5">
                                    <input id="comments" name="comments" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">General settings</p>
                                </div>
                            </div>
                            <div class="flex items-start tab-panel">
                                <div class="flex items-center h-5">
                                    <input id="candidates" name="candidates" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Course assessment</p>
                                </div>
                            </div>
                            <div class="flex items-start tab-panel">
                                <div class="flex items-center h-5">
                                    <input id="offers" name="offers" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Course pricing</p>
                                </div>
                            </div>

                            <div class="flex items-start tab-panel">
                                <div class="flex items-center h-5">
                                    <input id="offers" name="offers" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Course author</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <h3 class="text-base font-medium text-gray-900">Organize your course</h3>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-start tab-panel">
                                <div class="flex items-center h-5">
                                    <input id="comments" name="comments" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Course meta data</p>
                                </div>
                            </div>
                            <div class="flex items-start tab-panel">
                                <div class="flex items-center h-5">
                                    <input id="candidates" name="candidates" type="checkbox"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <p class="text-gray-500">Course feature</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 sm:px-6 text-center w-full">
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-8 w-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>


</section>

@push('js')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#mce-instance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            // toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true,
            height: "480",
            setup: function (editor) {
                editor.on('init', function () {
                    editor.setContent('{!! preg_replace("/[\n\r|\r\n|\r|\n]/m", "", $course->description ?? "") !!}');
                });
            }
        });
    </script>

    <script>
        $("#add-result").click(function () {
            @php
                $x = '<input id="results" name="results[]" class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full" type="text" placeholder="How to ..."/>';
            @endphp
            $("#course-result").append('{!! $x !!}')
        })

        $("#add-requirement").click(function () {
            @php
                $x = '<input id="requirements" name="requirements[]" class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full" type="text" placeholder="Need to ..."/>';
            @endphp
            $("#course-requirements").append('{!! $x !!}')
        })

        $("#add-target").click(function () {
            @php
                $x = '<input id="targets" name="targets[]" class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full" type="text" placeholder="Anyone who ..."/>';
            @endphp
            $("#course-targets").append('{!! $x !!}')
        })
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    <script>
        $(function () {
            $("#dialog").dialog({
                autoOpen: false

            });

            $("#opener").click(function () {
                $("#dialog").dialog('open');
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("form").submit(function (event) {
                event.preventDefault();

                const formData = {
                    _token: "{{ csrf_token() }}",
                    name: $("#name").val(),
                    course_id: $("#course_id").val(),
                };

                $.ajax({
                    type: "POST",
                    url: "{!! route('author.course.add-section') !!}",
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            $("#dialog").dialog('close');
                            $("#accordionExample").append('<div class="overflow-hidden shadow-full mb-4 bg-transparent border-none relative flex flex-col rounded-md">' +
                                '<div class="bg-transparent border-none py-2 px-4" id="heading-3">' +
                                '<h2 class="mb-0">' +
                                '<button' +
                                ' class="cursor-pointer w-full h-16 text-black font-bold text-left block bg-transparent border-0 px-4 py-2 text-base rounded-md outline-none"' +
                                ' type="button" data-toggle="collapse"' +
                                ' data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">' +
                                'Chapter 2 : Manipulating Data types' +
                                '</button>' +
                                '</h2>' +
                                '</div>' +
                                '</div>');
                        }
                    },
                    error: function (error) {
                        console.log("xxxx");
                    }
                });

            });
        });
    </script>


    <!--suppress EqualityComparisonWithCoercionJS -->
    <script>

        function initCurriculum(sectionId, lectureId) {

            $(".input-section").each(function () {
                const index = $(this).attr("data-id")
                if (index != sectionId) return;
                const context = this;

                $(".btn-save-lecture", this).each(function () {
                    const index = $(this).attr("data-id")
                    if (index == lectureId) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lecture-title-${index}`, context).text($(`#input-lecture-title-${index}`).val());
                            $(`#lecture-input-${index}`, context).toggleClass("hidden")
                            $(`#lecture-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-cancel-lecture", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lecture-input-${index}`, context).toggleClass("hidden")
                            $(`#lecture-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".lecture-edit", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#lecture-input-${index}`, context).toggleClass("hidden")
                            $(`#lecture-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                console.log($(".lecture-edit", this))
                $(".add-lecture", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == sectionId) {
                        $(this).on("click", function () {
                            @php
                                $html_lecture = json_encode(View::make('author.course._lecture_form')->render());
                            @endphp
                            let processed = {!! $html_lecture !!};
                            const lecture = $(`#input-lecture-${sectionId}`, context)
                            const id = lecture.children().length + 1;
                            processed = processed.replaceAll("--index--", id);
                            lecture.append(processed)
                            initCurriculum(sectionId, id)
                        })
                    }
                })
            })


        }

        initCurriculum(1, 1)

        $("#add-section").click(function () {
            @php
                use Illuminate\Support\Facades\View;$html = json_encode(View::make('author.course._section_form', ['index' => 2])->render());
            @endphp
            let processed = {!! $html !!};
            const section = $("#input-curriculum-section")
            const id = section.children().length + 1;
            processed = processed.replaceAll("--index--", id);
            section.append(processed)
            initCurriculum(id, 1)
        })

    </script>

    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect('#select-category');
        new TomSelect('#select-tag');
    </script>

@endpush
