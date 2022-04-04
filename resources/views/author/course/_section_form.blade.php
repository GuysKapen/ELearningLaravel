@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--index--";
    }
    $index = 1;
@endphp
<div class="input-section bg-gray-100 border py-4 px-2 relative mt-8" data-id="{{$sectionIndex}}">

    <div id="section-info-{{$sectionIndex}}">
        <div data-id="{{$sectionIndex}}"
             class="add-lesson absolute left-0 top-10 bg-white px-2 cursor-pointer opacity-0 hover:opacity-100">
            <span class="material-icons outlined text-sm">add</span>
        </div>

        <div class="flex items-start text-sm">
            <span class="ml-2 text-sm font-bold text-black">Section {{$sectionIndex}}:</span>
            <div class="flex items-start w-12 flex-shrink-0 ml-2">
                <span class="material-icons outlined text-sm">description</span>
                <span id="section-title-{{$sectionIndex}}"
                      class="mx-1 text-sm flex-shrink-0">{{$sectionTitle ?? "Introduction"}}</span>
                <span data-id="{{$sectionIndex}}"
                      class="section-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
                <span class="icon material-icons text-sm mr-1 mx-2">delete</span>
            </div>
        </div>

        @if(isset($lessons))
            @php
                $lessonIndex = 1;
            @endphp
            @foreach($lessons as $key=>$lesson)
                @include('author.course._lesson_form', ['sectionIndex' => $sectionIndex, 'lessonIndex' => $lessonIndex, 'lessonTitle' => $lesson->title])
                @php
                    $lessonIndex++;
                @endphp
            @endforeach
        @else
            <div id="input-lesson-{{$sectionIndex}}">
                <div class="m-8 p-3 bg-gray-50 relative">
                    <div id="lesson-info-{{$index}}" class="flex items-center text-sm">
                        <span class="ml-2 text-sm">Lecture 1:</span>
                        <div class="flex items-start w-12 flex-shrink-0 ml-2">
                            <span class="material-icons outlined text-sm">description</span>
                            <span id="lesson-title-{{$index}}"
                                  class="mx-1 text-sm flex-shrink-0">Introduction</span>
                            <span data-id="{{$index}}"
                                  class="lesson-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
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

                    <div id="lesson-input-{{$index}}" class="text-sm hidden">
                        <div class="flex items-center">
                            <label class="block text-sm mr-2"
                                   for="input1">Lecture {{$index}}: </label>
                            <input id="input-lesson-title-{{$index}}"
                                   name="section[{{$sectionIndex}}][lesson][{{$index}}][title]"
                                   class="flex-grow required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                   type="text"/>
                        </div>
                        <div class="flex-end flex items-center justify-end ml-auto">
                            <div
                                id="btn-cancel-lesson"
                                data-id="{{$index}}"
                                class="btn-cancel-lesson text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                                Cancel
                            </div>
                            <div
                                id="btn-save-lesson"
                                data-id="{{$index}}"
                                class="btn-save-lesson bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                                Save
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <div id="section-input-{{$sectionIndex}}" class="text-sm hidden">
        <div class="flex items-center">
            <label class="block text-sm mr-2"
                   for="input">Section {{$sectionIndex}}: </label>
            <input id="input-section-title-{{$sectionIndex}}"
                   name="section[{{$sectionIndex}}][title]"
                   value="{{$sectionTitle ?? "Introduction"}}"
                   class="flex-grow required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                   type="text"/>
        </div>
        <div class="flex-end flex items-center justify-end ml-auto">
            <div
                data-id="{{$sectionIndex}}"
                class="btn-cancel-section text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                data-id="{{$sectionIndex}}"
                class="btn-save-section bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>

</div>
