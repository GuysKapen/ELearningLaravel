@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--index--";
    }
    $index = 1;

@endphp
<div class="input-section bg-gray-100 border py-4 px-2 relative mt-8"
     data-id="{{$sectionIndex}}">

    <div id="section-info-{{$sectionIndex}}" class="mb-4">
        <div data-id="{{$sectionIndex}}"
             class="add-lesson absolute left-0 top-10 bg-white px-2 cursor-pointer hover:bg-indigo-600 hover:text-white">
            <span class="material-icons outlined text-sm">add</span>
        </div>

        <div class="flex items-start text-sm">
            <span class="ml-2 text-sm font-bold text-black">Section {{$sectionIndex}}:</span>
            <div class="flex items-start w-12 flex-shrink-0 ml-2">
                <span class="material-icons outlined text-sm">description</span>
                <span id="section-title-{{$sectionIndex}}"
                      class="mx-1 text-sm flex-shrink-0">{{$section->name ?? "Introduction"}}</span>
                <span data-id="{{$sectionIndex}}"
                      class="section-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
                <span data-id="{{$sectionIndex}}"
                      class="section-delete cursor-pointer icon material-icons text-sm mr-1 mx-2">delete</span>
            </div>
        </div>

        <div id="input-section-content-{{$sectionIndex}}">
            @if(isset($section->lessons))
                @php
                    $lessonIndex = 1;
                    $quizIndex = 0;
                @endphp
                @foreach($section->lessons as $key=>$lesson)
                    @include('author.course._lesson_form', ['sectionIndex' => $sectionIndex, 'lessonIndex' => $lessonIndex, 'lesson' => $lesson, "timeUnits" => $timeUnits])
                    @php
                        $lessonIndex++;
                    @endphp
                    @php
                        $quiz = $section->course->quizzes->where('index', '<=', $lessonIndex)->where('index', '>', $quizIndex)->first();
                    @endphp
                    @if(isset($quiz))
                        @php
                            $quizIndex = $quiz->index;
                        @endphp
                        @include('author.course._quiz_form', ['sectionIndex' => $sectionIndex, 'lessonIndex' => $lessonIndex, 'quiz' => $quiz, "minimize" => true])
                    @endif
                @endforeach
            @else
                @include('author.course._lesson_form', ['lessonIndex' => 1, 'timeUnits' => $timeUnits])
            @endif
        </div>


    </div>

    <div id="section-input-{{$sectionIndex}}" class="text-sm hidden">
        <div class="flex items-center">
            <label class="block text-sm mr-2"
                   for="input">Section {{$sectionIndex}}: </label>
            <input id="input-section-title-{{$sectionIndex}}"
                   name="sections[{{$sectionIndex}}][name]"
                   value="{{$section->name ?? "Introduction"}}"
                   class="flex-grow required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                   type="text"/>
            @if(isset($section))
                <input type="hidden" name="sections[{{$sectionIndex}}][id]" value="{{$section->id}}">
            @endif
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

    <div id="section-content-list-{{$sectionIndex}}" class="hidden flex items-center px-8 py-2">
        <div id="section-add-lesson-{{$sectionIndex}}"
             data-id="{{$sectionIndex}}"
             class="btn-add-lesson bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center w-max mr-2 cursor-pointer">
            <span class="icon material-icons text-sm mr-1">add</span>
            Lesson
        </div>
        <div id="section-add-quiz-{{$sectionIndex}}"
             data-id="{{$sectionIndex}}"
             class="btn-add-quiz bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center w-max mr-2 cursor-pointer">
            <span class="icon material-icons text-sm mr-1">add</span>
            Quiz
        </div>
    </div>
</div>
