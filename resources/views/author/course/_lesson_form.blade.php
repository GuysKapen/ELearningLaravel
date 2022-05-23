@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--sectionIndex--";
    }

    if (!isset($lessonIndex)) {
        $lessonIndex = "--index--";
    }
@endphp

<div class="m-8 bg-gray-50 relative">
    <div id="lesson-info-{{$lessonIndex}}" class="flex items-center text-sm shadow-sm p-3">
        <span class="ml-2 text-sm">Lecture {{$lessonIndex}}:</span>
        <div class="flex items-start flex-grow-1 w-8/12 ml-2">
            <span class="material-icons outlined text-sm">description</span>
            <span id="lesson-title-{{$lessonIndex}}"
                  class="mx-1 text-sm whitespace-nowrap overflow-hidden text-ellipsis">{{$lesson->title ?? "Introduction"}}</span>
            <span data-id="{{$lessonIndex}}"
                  class="lesson-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
            <span class="icon material-icons text-sm mr-1 mx-2">delete</span>
        </div>
        <div class="flex-end flex items-center ml-auto">
            <div
                data-id="{{$lessonIndex}}"
                class="btn-add-content cursor-pointer bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center mr-2">
                <span class="icon material-icons text-sm mr-1">add</span>
                Content
            </div>
            <span class="icon material-icons text-sm mr-1 mr-2">expand_more</span>
            <span class="icon material-icons text-sm mr-1">menu</span>
        </div>
    </div>

    <div id="lesson-add-list-{{$lessonIndex}}" class="text-sm hidden p-5">
        <div id="lesson-add-content-{{$lessonIndex}}"
             data-id="{{$lessonIndex}}"
             class="btn-add-text-content bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center w-max mr-2 cursor-pointer">
            <span class="icon material-icons text-sm mr-1">add</span>
            Text
        </div>
        <div id="lesson-add-resource-{{$lessonIndex}}"
             data-id="{{$lessonIndex}}"
             class="btn-add-resource bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center w-max mr-2 mt-2 cursor-pointer">
            <span class="icon material-icons text-sm mr-1">add</span>
            Resource
        </div>
        <div id="lesson-add-detail-{{$lessonIndex}}"
             data-id="{{$lessonIndex}}"
             class="btn-add-detail bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center w-max mr-2 mt-2 cursor-pointer">
            <span class="icon material-icons text-sm mr-1">add</span>
            Detail
        </div>
    </div>

    <div id="lesson-input-{{$lessonIndex}}" class="text-sm hidden p-5">
        <div class="flex items-center">
            <label class="block text-sm mr-2"
                   for="input1">Lecture {{$lessonIndex}}: </label>
            <input id="input-lesson-title-{{$lessonIndex}}"
                   name="section[{{$sectionIndex}}][lesson][{{$lessonIndex}}][title]"
                   value="{{$lesson->title ?? "Introduction"}}"
                   class="flex-grow required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                   type="text"/>
            @if(isset($lesson))
                <input type="hidden" name="section[{{$sectionIndex}}][lesson][{{$lessonIndex}}][id]"
                       value="{{$lesson->id}}">
            @endif
        </div>
        <div class="flex-end flex items-center justify-end ml-auto">
            <div
                id="btn-cancel-lesson"
                data-id="{{$lessonIndex}}"
                class="btn-cancel-lesson text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                id="btn-save-lesson"
                data-id="{{$lessonIndex}}"
                class="btn-save-lesson bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>

    <div id="lesson-input-resource-{{$lessonIndex}}" class="text-sm mt-2 p-5 hidden">
        <label class="block text-sm font-bold mr-2"
               for="input1">Resource</label>
        <div class="flex items-center">
            <label class="block text-sm mr-2"
                   for="input1">Video: </label>
            <input id="input-lesson-resource-{{$lessonIndex}}"
                   name="section[{{$sectionIndex}}][lesson][{{$lessonIndex}}][resource][video]"
                   placeholder="https://"
                   value="{{$lesson->resource->video ?? ""}}"
                   class="flex-grow required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                   type="text"/>

            @if(isset($lesson->resource))
                <input name="section[{{$sectionIndex}}][lesson][{{$lessonIndex}}][resource][id]"
                       value="{{$lesson->resource->id}}"
                       type="hidden"/>
            @endif
        </div>
        <div class="flex-end flex items-center justify-end ml-auto mt-2">
            <div
                id="btn-cancel-lesson-resource"
                data-id="{{$lessonIndex}}"
                class="btn-cancel-lesson-resource text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                id="btn-save-lesson-resource"
                data-id="{{$lessonIndex}}"
                class="btn-save-lesson-resource bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>

    <div id="lesson-input-content-{{$lessonIndex}}" class="text-sm mt-2 p-5 hidden">
        @include("author.course._lesson_content_form", ["sectionIndex" => $sectionIndex, "lessonIndex" => $lessonIndex])
        <div class="flex-end flex items-center justify-end ml-auto mt-2">
            <div
                id="btn-cancel-lesson-content"
                data-id="{{$lessonIndex}}"
                class="btn-cancel-lesson-content text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                id="btn-save-lesson-content"
                data-id="{{$lessonIndex}}"
                class="btn-save-lesson-content bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>

    <div id="lesson-input-detail-{{$lessonIndex}}" class="text-sm mt-2 p-5 hidden">
        @include("author.course._lesson_detail_form", ["sectionIndex" => $sectionIndex, "lessonIndex" => $lessonIndex, "timeUnits" => $timeUnits, "lessonDetail" => $lesson->detail ?? null])
        <div class="flex-end flex items-center justify-end ml-auto mt-2">
            <div
                id="btn-cancel-lesson-detail"
                data-id="{{$lessonIndex}}"
                class="btn-cancel-lesson-detail text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                id="btn-save-lesson-detail"
                data-id="{{$lessonIndex}}"
                class="btn-save-lesson-detail bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>

</div>
