@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--sectionIndex--";
    }

    if (!isset($index)) {
        $index = "--index--";
    }
@endphp

<div class="m-8 p-3 bg-gray-50 relative">
    <div id="lesson-info-{{$index}}" class="flex items-center text-sm">
        <span class="ml-2 text-sm">Lecture {{$index}}:</span>
        <div class="flex items-start w-12 flex-shrink-0 ml-2">
            <span class="material-icons outlined text-sm">description</span>
            <span id="lesson-title-{{$index}}"
                  class="mx-1 text-sm flex-shrink-0">{{$lessonTitle ?? "Introduction"}}</span>
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
                   value="{{$lessonTitle ?? "Introduction"}}"
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
