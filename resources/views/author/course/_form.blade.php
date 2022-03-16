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

        <div class="flex background-white-grey">
            <div class="ml-3 w-9/12">
                <div class="">


                    <div class="field">
                        <div class="control">
                            <label class="block font-semibold" for="input1">Course name</label>
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
                            <label class="block font-semibold" for="input1">Description</label>
                            <textarea id="mce-instance" name="description"
                                      placeholder="Enter content here"></textarea>
                        </div>
                    </div>

                    <div class="section mt-5 bg-white sm:rounded-md shadow overflow-hidden">
                        <div class="">
                            <div class="p-4 px-2 m-0-imp bg-white border-b border-b-2">
                                <p class="ml-1 m-0 font-bold">Setting</p>
                            </div>

                            <div id="form-meta">
                                <input type="hidden" name="authenticity_token"
                                       value="crFehCD75WsS8gf2gdBhBtS7j7XG9jUuXHhWEJa8RGyKJyMDdt20JXyfet3uZ8ID/n31mFdwPlCpT84RuguPJA==">

                                <div class="flex mb-3 mx-0 tab-view pr-2">

                                    <div
                                        class="flex-grow mx-0 px-0 border-right bg-gray-50 child-my-2 tabs-panel">

                                        <div
                                            class="flex mt-0-imp mx-0 flex cursor-pointer active tab-panel py-2">
                                            <p class="ml-3 text-base">General</p>
                                        </div>

                                        <div
                                            class="flex mt-1 mx-0 flex cursor-pointer tab-panel py-2">
                                            <p class="ml-3 text-base">Assessment</p>
                                        </div>

                                        <div
                                            class="flex mx-0 mt-1 flex cursor-pointer tab-panel py-2">
                                            <p class="ml-3 text-base">Pricing</p>
                                        </div>

                                        <div
                                            class="flex mx-0 mt-1 flex cursor-pointer tab-panel py-2">
                                            <p class="ml-3 text-base">Author</p>
                                        </div>

                                        <div
                                            class="flex mx-0 mt-1 flex cursor-pointer tab-panel py-2">
                                            <p class="ml-3 text-base">Mores</p>
                                        </div>

                                    </div>

                                    <div class="w-8/12 ml-3 mx-0 px-0 tabs-content">
                                        <!-- General Attribute -->
                                        <div id="input-general" class="active tab-content ">
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
                                                               value="{{ old('duration', isset($course) ? $course->duration : "10") }}"
                                                               required
                                                               class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                                               type="number"
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

                                        <!-- Mores -->
                                        <div id="input-author" class="tab-content">
                                            <div class="field">
                                                <div class="control mt-2">
                                                    <label class="block font-semibold text-sm mt-2"
                                                           for="input1">What will students learn in your course?</label>

                                                    <div class="">

                                                        <div id="course-result">

                                                            @for($i = 0; $i < 2; $i++)
                                                                <input id="results"
                                                                       name="results[]"
                                                                       value="{{ old('result', isset($course->results) ? ($course->results[$i]->result ?? "") : "") }}"
                                                                       class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 w-full"
                                                                       type="text"
                                                                       placeholder="How to ..."/>
                                                            @endfor
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

                                        </div>
                                        <!-- !Mores -->


                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <section class="mx-3 child-bg-white">
                <!-- Public -->
                <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md">
                    <div class="p-1 py-2 m-0-imp bg-white">
                        <p class="ml-1 f4 m-0 font-bold">Publish</p>
                    </div>

                    <div class="border-bottom mb-4">
                        <div class="mx-0 mt-3 flex cursor-pointer text-base">
                            <span class="f5 fw3">Status: &nbsp;</span><span class="font-bold">Draft</span>
                        </div>
                        <div class="mx-0 mt-3 flex cursor-pointer text-base">
                            <span class="f5 fw3">Visibility: &nbsp;</span><span
                                class="font-bold">Public</span>
                        </div>
                        <div class="mx-0 mt-3 flex cursor-pointer text-base">
                            <span class="f5 fw3">Publish: &nbsp;</span><span
                                class="font-bold">Immediately</span>
                        </div>
                    </div>

                    <div class="flex justify-between py-3 items-center m-0-imp px-2 mt-4">
                        <a href="" class="text-sm text-red-600">Move to trash</a>
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
                <!-- !Public -->

                <!-- Product categories -->
                <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md mt-8">
                    <div class="p-1 py-2 m-0-imp bg-white">
                        <p class="f4 m-0 ml-1 font-bold">Product categories</p>
                    </div>
                    <div class="border mt-3 p-2">
                        <div class="flex text-base">
                            <div>All categories</div>
                            <div class="ml-2">Most used</div>
                        </div>
                        <div id="container-product-form-categories" class="mt-2">
                            <input type="hidden" name="product[category_ids][]" value="">
                        </div>
                    </div>

                    <div class="my-3" id="add_new_category">
                        <div id="add_new_category" class="f6 flex cursor-pointer items-center text-sm">
                            <i class="fa fa-plus"></i><span class="ml-1">Add new category</span>
                        </div>
                        <div class="mt-2">
                            <div id="container-new-category" class=" hidden">
                                <input type="text" name="category_name" id="input_new_category"
                                       placeholder="New Category"
                                       class="w-full px-2 py-1 font-medium border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800 my-2">
                                <div class="inline-block">
                                    <div id="btn-add-new-category"
                                         class="custom-btn-normal inline-block f6">Add new category
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- !Product categories -->

                <!-- Product Tag -->
                <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md mt-4">
                    <div class="p-1 py-2 m-0-imp bg-white">
                        <p class="f4 ml-1 m-0 font-bold font-josesans">Product Tags</p>
                    </div>

                    <div class="px-2">
                        <div class="my-4 flex">
                            <input placeholder="Tags" type="text"
                                   class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                                   data-dashlane-rid="d883f4e36d5d2b8b" data-form-type="other">

                            <button type="submit"
                                    class="inline-flex justify-center ml-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add
                            </button>
                        </div>
                        <div class="my-3 custom-btn-wide rounded-extra-lg width-max text-base">Choose from
                            the most
                            used
                        </div>
                    </div>

                </div>
                <!-- !Product Tag -->

                <!-- Product image -->
                <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md mt-4">
                    <div class="p-1 py-2 m-0-imp bg-white">
                        <p class="f4 ml-1 m-0 font-bold font-josesans">Product Image</p>
                    </div>
                    <p class="custom-btn-wide rounded-extra-lg my-3 text-base inline-block" href="#">Set
                        product
                        image</p>
                </div>
                <!-- !Product image -->

                <!-- Product gallery -->
                <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md mt-4">
                    <div class="p-1 py-2 m-0-imp bg-white">
                        <p class="f4 ml-1 m-0 font-bold font-josesans">Product Gallery</p>
                    </div>
                    <p class="custom-btn-wide rounded-extra-lg my-3 text-base inline-block" href="#">Set
                        product gallery</p>
                </div>
                <!-- !Product gallery -->


            </section>

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
    </script>
@endpush
