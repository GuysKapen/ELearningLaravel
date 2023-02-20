@push('css')
    <link
        href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
        rel="stylesheet"
    />
@endpush

@push('lib-js')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
@endpush

<section class="section">
    <form
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
                                       class="string w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                       type="text" autofocus placeholder="Course name..."/>
                            </div>
                        </div>
                        <div class="field mt-5">
                            <div>
                                <label class="block font-semibold mb-2 text-sm" for="input1">Description</label>
                                <textarea id="course-desc" name="description"
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
                                                       class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                       type="text"
                                                       placeholder="How to ..."/>
                                            @endforeach
                                        @else
                                            <input id="results"
                                                   name="results[]"
                                                   class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
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
                                                       class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                       type="text"
                                                       placeholder="Need to ..."/>
                                            @endforeach
                                        @else
                                            <input id="requirements"
                                                   name="requirements[]"
                                                   class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
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
                                                       class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                       type="text"
                                                       placeholder="Anyone who ..."/>
                                            @endforeach
                                        @else
                                            <input id="targets"
                                                   name="targets[]"
                                                   class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
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
                        <div id="input-curriculum-section" class="mt-8">

                            @if(isset($course->sections) && !$course->sections->isEmpty())
                                @php
                                    $sectionIndex = 1;
                                @endphp
                                @foreach($course->sections as $key=>$section)
                                    @include('author.course._section_form', ['sectionIndex' => $sectionIndex, 'section' => $section, "timeUnits" => $timeUnits])
                                    @php
                                        $sectionIndex++;
                                    @endphp
                                @endforeach
                            @else
                                @include('author.course._section_form', ['sectionIndex' => 1, "timeUnits" => $timeUnits])
                            @endif
                        </div>


                        <div id="add-section" class="cursor-pointer px-2 my-4 inline-block hover:text-white hover:bg-indigo-600">
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                               class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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
                                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
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

                                <!-- Input select -->
                                <div class="max-w-xs w-full">
                                    <div class=""
                                         x-data="Components.customSelect({ open: true, value: 4, selected: 4 })"
                                         x-init="init()">
                                        <input x-ref="input" type="hidden" name="author" id="author">
                                        <div class="relative">
                                                <span class="inline-block w-full rounded-md shadow-sm">
                                                    <button x-ref="button" @click="onButtonClick()" type="button"
                                                            aria-haspopup="listbox" :aria-expanded="open"
                                                            aria-labelledby="assigned-to-label"
                                                            class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-8 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                        <div class="flex items-center space-x-3">
                                            @php
                                                if (!isset($authors)) return;
                                                $authors_str = $authors->map(function ($author) {   return $author->username; });
                                            @endphp

                                            <span
                                                x-text='{{$authors_str}}[value]'
                                                class="block truncate">Secs</span>
                                                        </div>
                                                        <span
                                                            class="absolute inset-y-0 top-0 bottom-0 right-0 flex items-center pr-2 pointer-events-none">
                                                            <svg class="h-5 w-5 text-gray-400" fill="currentColor"
                                                                 viewBox="0 0 20 20">
                                                <path
                                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg></span>
                                                    </button>
                                                </span>
                                            <div x-show="open" @focusout="onEscape()" @click.away="open = false"
                                                 x-description="Select popover, show/hide based on select state."
                                                 x-transition:leave="transition ease-in duration-100"
                                                 x-transition:leave-start="opacity-100"
                                                 x-transition:leave-end="opacity-0"
                                                 class="absolute mt-1 rounded-md bg-white shadow-lg w-full z-10"
                                                 style="display: none;">
                                                <ul @keydown.enter.stop.prevent="onOptionSelect()"
                                                    @keydown.space.stop.prevent="onOptionSelect()"
                                                    @keydown.escape="onEscape()"
                                                    @keydown.arrow-up.prevent="onArrowUp()"
                                                    @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox"
                                                    tabindex="-1"
                                                    role="listbox" aria-labelledby="assigned-to-label"
                                                    :aria-activedescendant="activeDescendant"
                                                    class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                                                    @php
                                                        $id = -1;
                                                    @endphp
                                                    @foreach($authors as $key=>$author)
                                                        @php
                                                            $id++;
                                                        @endphp
                                                        <li id="assigned-to-option-{{$id}}" role="option"
                                                            @click="choose({{$id}},{{$author->id}})"
                                                            @mouseenter="selected = {{$id}}"
                                                            @mouseleave="selected = null"
                                                            :class="{ 'text-white bg-indigo-600': selected === {{$id}}, 'text-gray-900': !(selected === {{$id}}) }"
                                                            class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                                            <div class="flex items-center space-x-3">
                                                                    <span
                                                                        :class="{ 'font-semibold': value === {{$id}}, 'font-normal': !(value === {{$id}}) }"
                                                                        class="font-normal block truncate">
                                                                        {{$author->username}}
                                                                    </span>
                                                            </div>
                                                            <span x-show="value === {{$id}}"
                                                                  :class="{ 'text-white': selected === {{$id}}, 'text-indigo-600': !(selected === {{$id}}) }"
                                                                  class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                                                  style="display: none;">
                                                                    <svg class="h-5 w-5" fill="currentColor"
                                                                         viewBox="0 0 20 20"><path fill-rule="evenodd"
                                                                                                   d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                                                   clip-rule="evenodd"></path>
                                                                    </svg>
                                                                </span>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- !Input select -->

                            </div>

                        </div>

                        <div class="field mt-4">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Co-Author</label>

                                <div class="w-8/12">

                                    <div class="relative flex w-full">
                                        <select
                                            id="select-co-author"
                                            name="co_authors[]"
                                            placeholder="Select co-authors..."
                                            autocomplete="off"
                                            class="block w-full rounded-sm cursor-pointer focus:outline-none"
                                            multiple
                                        >
                                            @foreach($coAuthors as $key=>$author)
                                                <option
                                                    value="{{$author->id}}" {{($course->coAuthors ?? collect())->contains("id", $author->id) ? "selected" : ""}}>{{$author->username}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <span
                                        class="input-desc">The co-authors of the course</span>
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
                                            @foreach($categories as $key=>$category)
                                                <option
                                                    value="{{$category->id}}" {{(($course->categories ?? collect())->contains("id", $category->id) ? "selected" : "") ?? ""}}>{{$category->name}}</option>
                                            @endforeach
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
                                            @foreach($tags as $key=>$tag)
                                                <option
                                                    value="{{$tag->id}}" {{($course->tags ?? collect())->contains("id", $tag->id) ? "selected" : ""}}>{{$tag->tag}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <span
                                        class="input-desc">The tags of the course</span>
                                </div>
                            </div>

                        </div>

                        <div class="field mt-4">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Programming languages</label>
                                <div class="w-8/12">

                                    <div class="relative flex w-full">
                                        <select
                                            id="select-programming-language"
                                            name="programming_languages[]"
                                            placeholder="Select programming languages..."
                                            autocomplete="off"
                                            class="block w-full rounded-sm cursor-pointer focus:outline-none"
                                            multiple
                                        >
                                            @foreach($programmingLanguages as $key=>$proLanguage)
                                                <option
                                                    value="{{$proLanguage->id}}" {{($course->programmingLanguages ?? collect())->contains("id", $proLanguage->id) ? "selected" : ""}}>{{$proLanguage->name}}</option>
                                            @endforeach
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
                                                <label for="feature_img"
                                                       class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="feature_img" name="feature_img" type="file"
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
    <script>
        tinymce.init({
            selector: 'textarea#course-desc', // Replace this CSS selector to match the placeholder element for TinyMCE
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
                    editor.setContent({!! json_encode(preg_replace("/[\n\r|\r\n|\r|\n]/m", "", $course->description ?? "")) !!});
                });
            }
        });
    </script>

    <script>
        $("#add-result").click(function () {
            @php
                $x = '<input id="results" name="results[]" class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full" type="text" placeholder="How to ..."/>';
            @endphp
            $("#course-result").append('{!! $x !!}')
        })

        $("#add-requirement").click(function () {
            @php
                $x = '<input id="requirements" name="requirements[]" class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full" type="text" placeholder="Need to ..."/>';
            @endphp
            $("#course-requirements").append('{!! $x !!}')
        })

        $("#add-target").click(function () {
            @php
                $x = '<input id="targets" name="targets[]" class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full" type="text" placeholder="Anyone who ..."/>';
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

    <!--suppress EqualityComparisonWithCoercionJS -->
    <script>

        function initLecture(sectionId, lectureId) {
            $(".input-section").each(function () {
                const index = $(this).attr("data-id")
                if (index != sectionId && sectionId != -1) return;
                const context = this;

                // btn save and cancel title
                $(".btn-save-lesson", this).each(function () {
                    const index = $(this).attr("data-id")
                    if (index == lectureId || lectureId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-title-${index}`, context).text($(`#input-lesson-title-${index}`, context).val());
                            $(`#lesson-input-${index}`, context).toggleClass("hidden")
                            $(`#lesson-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-cancel-lesson", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-input-${index}`, context).toggleClass("hidden")
                            $(`#lesson-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                // btns resource listener
                $(".btn-save-lesson-resource", this).each(function () {
                    const index = $(this).attr("data-id")
                    if (index == lectureId || lectureId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-input-resource-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-cancel-lesson-resource", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-input-resource-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                // Btn save and cancel content click listener
                $(".btn-save-lesson-content", this).each(function () {
                    const index = $(this).attr("data-id")
                    if (index == lectureId || lectureId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-input-content-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-cancel-lesson-content", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-input-content-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                // btns save and cancel detail listener
                $(".btn-save-lesson-detail", this).each(function () {
                    const index = $(this).attr("data-id")
                    if (index == lectureId || lectureId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-input-detail-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-cancel-lesson-detail", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-input-detail-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-add-content", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-add-list-${index}`, context).toggleClass("hidden")
                            $(`div[id^='lesson-input']`, context).addClass("hidden")
                        })
                    }
                })

                $(".btn-add-text-content", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-add-list-${index}`, context).toggleClass("hidden")
                            $(`#lesson-input-content-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-add-resource", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-add-list-${index}`, context).toggleClass("hidden")
                            $(`#lesson-input-resource-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-add-detail", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-add-list-${index}`, context).toggleClass("hidden")
                            $(`#lesson-input-detail-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".lesson-edit", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-input-${index}`, context).toggleClass("hidden")
                            $(`#lesson-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".lesson-delete", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == lectureId || lectureId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#lesson-form-${index}`, context).remove()
                        })
                    }
                })
            })
        }

        function initQuiz(sectionId, quizId) {
            initQuestion(sectionId, quizId)
            $(".input-quiz").each(function () {
                const index = $(this).attr("data-id")
                if (index != quizId && quizId != -1) return;
                const context = this;

                // btn save and cancel title
                $(".btn-save-quiz", this).each(function () {
                    const index = $(this).attr("data-id")
                    if (index == quizId || quizId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#quiz-name-${index}`, context).text($(`#input-quiz-name-${index}`, context).val());
                            $(`#quiz-input-${index}`, context).toggleClass("hidden")
                            $(`#quiz-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-cancel-quiz", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == quizId || quizId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#quiz-input-${index}`, context).toggleClass("hidden")
                            $(`#quiz-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-add-quiz-content", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == quizId || quizId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#quiz-add-list-${index}`, context).toggleClass("hidden")
                            $(`div[id^='quiz-input']`, context).addClass("hidden")
                        })
                    }
                })

                $(".btn-add-quiz-question", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == quizId || quizId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`div[id^='quiz-add-list']`, context).addClass("hidden")
                            $(`#quiz-add-list-question-${index}`, context).toggleClass("hidden")
                            $(`div[id^='quiz-input']`, context).addClass("hidden")
                        })
                    }
                })

                $(".btn-add-quiz-detail", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == quizId || quizId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`div[id^='quiz-input']`, context).addClass("hidden")
                            $(`div[id^='quiz-add-list']`, context).addClass("hidden")
                            $(`#quiz-input-detail-${index}`).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-add-text-question-multi-choices", this).each(function () {
                    // id of quiz
                    const index = $(this).attr("data-id");
                    const sectionIndex = $(this).attr("data-section-id");
                    if (index == quizId || quizId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`div[id^='quiz-add-list']`, context).addClass("hidden")
                            $(`#quiz-questions-form-container-${index}`, context).removeClass("hidden")
                            @php
                                $html_lecture = json_encode(View::make('author.course._question_form')->render());
                            @endphp
                            let processed = {!! $html_lecture !!};
                            const lesson = $(`#quiz-questions-form-container-${index}`, context)
                            let id = lesson.children().length + 1;
                            lesson.children().each((index, element) => {
                                id = Math.max(id, parseInt($(element).attr("data-id")) + 1)
                            })
                            // Question index
                            processed = processed.replaceAll("--questionIndex--", id);
                            // Quiz index
                            processed = processed.replaceAll("--index--", index);
                            // Section index
                            processed = processed.replaceAll("--sectionIndex--", sectionIndex)
                            lesson.append(processed)
                            initQuestion(index, id)
                        })
                    }
                })

                $(".quiz-edit", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == quizId || quizId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#quiz-input-${index}`, context).toggleClass("hidden")
                            $(`#quiz-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".quiz-delete", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == quizId || quizId == -1) {
                        $(this).click(function () {
                            $(context).remove()
                        })
                    }
                })

                // btns save and cancel detail listener
                $(".btn-save-quiz-detail", this).each(function () {
                    const index = $(this).attr("data-id")
                    if (index == quizId || quizId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#quiz-input-detail-${index}`, context).addClass("hidden")
                        })
                    }
                })

                $(".btn-cancel-lesson-detail", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == quizId || quizId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#quiz-input-detail-${index}`, context).addClass("hidden")
                        })
                    }
                })

            })
        }

        function initQuestion(quizId, questionId) {
            $(".input-quiz").each(function () {
                const index = $(this).attr("data-id")
                if (index != quizId && quizId != -1) return;
                const outContext = this;
                $(".question-form-container", outContext).each(function () {
                    const context = this;
                    const index = $(this).attr("data-id")
                    if (index != questionId && questionId != -1) return;
                    // Btn save and cancel content click listener
                    $(".btn-save-quiz-question", this).each(function () {
                        const index = $(this).attr("data-id")
                        if (index == questionId || questionId == -1) {
                            $(this).on("click", function () {
                                const index = $(this).attr("data-id")
                                $(`#question-name-${index}`, context).html(tinymce.get(`input-question-name-${index}`).getContent());
                                $(`#question-form-${index}`, context).toggleClass("hidden")
                                $(`#question-info-${index}`, context).toggleClass("hidden")
                            })
                        }
                    })

                    $(".btn-cancel-quiz-question", this).each(function () {
                        const index = $(this).attr("data-id");
                        if (index == questionId || questionId == -1) {
                            $(this).on("click", function () {
                                const index = $(this).attr("data-id")
                                $(`#question-form-${index}`, context).toggleClass("hidden")
                                $(`#question-info-${index}`, context).toggleClass("hidden")
                            })
                        }
                    })

                    $(".question-edit", this).each(function () {
                        const index = $(this).attr("data-id");
                        if (index == questionId || questionId == -1) {
                            $(this).click(function () {
                                const index = $(this).attr("data-id")
                                $(`#question-form-${index}`, context).toggleClass("hidden")
                                $(`#question-info-${index}`, context).toggleClass("hidden")
                            })
                        }
                    })

                    $(".question-delete", this).each(function () {
                        const index = $(this).attr("data-id");
                        if (index == questionId || questionId == -1) {
                            $(this).click(function () {
                                $(context).remove()
                            })
                        }
                    })
                })
            })
        }

        // init curriculum with js - pass -1 to init all sections or lessons
        function initCurriculum(sectionId, lectureId, quizId) {
            initLecture(sectionId, lectureId)
            if (quizId != null) {
                initQuiz(sectionId, quizId)
            }

            $(".input-section").each(function () {
                const index = $(this).attr("data-id")
                if (index != sectionId && sectionId != -1) return;
                const context = this;

                $(".add-lesson", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == sectionId || sectionId == -1) {
                        const validId = sectionId == -1 ? 1 : sectionId;
                        $(this).on("click", function () {
                            $(`#section-content-list-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-add-lesson", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == sectionId || sectionId == -1) {
                        const validId = sectionId == -1 ? index : sectionId;
                        $(this).on("click", function () {
                            @php
                                $html_lecture = json_encode(View::make('author.course._lesson_form', ["timeUnits" => $timeUnits])->render());
                            @endphp
                            let processed = {!! $html_lecture !!};
                            const lesson = $(`#input-section-content-${validId}`, context)
                            let id = lesson.children().length + 1;
                            console.log(lesson)
                            lesson.children().each((index, element) => {
                                id = Math.max(id, parseInt($(element).attr("data-id")) + 1)
                            })
                            processed = processed.replaceAll("--index--", id);
                            processed = processed.replaceAll("--sectionIndex--", validId)
                            lesson.append(processed)
                            initLecture(sectionId, id)
                            $(`#section-content-list-${index}`, context).addClass("hidden")
                        })
                    }
                })

                $(".btn-add-quiz", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == sectionId || sectionId == -1) {
                        const validSectionId = sectionId == -1 ? index : sectionId;
                        $(this).on("click", function () {
                            @php
                                $html_lecture = json_encode(View::make('author.course._quiz_form', ["timeUnits" => $timeUnits])->render());
                            @endphp
                            let processed = {!! $html_lecture !!};
                            const lesson = $(`#input-section-content-${validSectionId}`, context)
                            let id = lesson.children().length + 1;
                            lesson.children().each((index, element) => {
                                id = Math.max(id, parseInt($(element).attr("data-id")) + 1)
                            })
                            processed = processed.replaceAll("--index--", id);
                            processed = processed.replaceAll("--sectionIndex--", validSectionId)
                            lesson.append(processed)
                            initQuiz(validSectionId, id)
                            $(`#section-content-list-${index}`, context).addClass("hidden")
                        })
                    }
                })

                $(".section-edit", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == sectionId || sectionId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(`#section-input-${index}`, context).toggleClass("hidden")
                            $(`#section-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                // Remove section
                $(".section-delete", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == sectionId || sectionId == -1) {
                        $(this).click(function () {
                            const index = $(this).attr("data-id")
                            $(context).remove()
                        })
                    }
                })

                $(".btn-save-section", this).each(function () {
                    const index = $(this).attr("data-id")
                    if (index == sectionId || sectionId != -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#section-title-${index}`, context).text($(`#input-section-title-${index}`, context).val());
                            $(`#section-input-${index}`, context).toggleClass("hidden")
                            $(`#section-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

                $(".btn-cancel-section", this).each(function () {
                    const index = $(this).attr("data-id");
                    if (index == sectionId || sectionId == -1) {
                        $(this).on("click", function () {
                            const index = $(this).attr("data-id")
                            $(`#section-input-${index}`, context).toggleClass("hidden")
                            $(`#section-info-${index}`, context).toggleClass("hidden")
                        })
                    }
                })

            })
        }

        initCurriculum(-1, -1, -1)

        $("#add-section").click(function () {
            @php
                use Illuminate\Support\Facades\View;$html = json_encode(View::make('author.course._section_form', ["timeUnits" => $timeUnits])->render());
            @endphp
            let processed = {!! $html !!};
            const section = $("#input-curriculum-section")
            const id = section.children().length + 1;
            processed = processed.replaceAll("--index--", id);
            section.append(processed)
            initCurriculum(id, 1, null)
        })

    </script>

    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect('#select-category');
        new TomSelect('#select-tag');
        new TomSelect('#select-programming-language');
        new TomSelect("#select-co-author");
    </script>


@endpush
