@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--sectionIndex--";
    }

    if (!isset($lessonIndex)) {
        $lessonIndex = "--index--";
    }
@endphp

<div class="input-quiz m-8 bg-gray-50 relative" data-id="{{$lessonIndex}}">
    <div id="quiz-info-{{$lessonIndex}}" class="flex items-center text-sm shadow-sm p-3">
        <span class="ml-2 text-sm">Quiz :</span>
        <div class="flex items-start flex-grow-1 w-8/12 ml-2">
            <span class="material-icons outlined text-sm">description</span>
            <span id="quiz-name-{{$lessonIndex}}"
                  class="mx-1 text-sm whitespace-nowrap overflow-hidden text-ellipsis">{{$quiz->name ?? "Quiz"}}</span>
            <span data-id="{{$lessonIndex}}"
                  class="quiz-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
            <span data-id="{{$lessonIndex}}" class="quiz-delete icon material-icons text-sm mr-1 mx-2 cursor-pointer">delete</span>
        </div>
        <div class="flex-end flex items-center ml-auto">
            <div
                data-id="{{$lessonIndex}}"
                class="btn-add-quiz-content cursor-pointer bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center mr-2">
                <span class="icon material-icons text-sm mr-1">add</span>
                Content
            </div>
            <span class="icon material-icons text-sm mr-1 mr-2">expand_more</span>
            <span class="icon material-icons text-sm mr-1">menu</span>
        </div>
    </div>

    <div id="quiz-input-{{$lessonIndex}}" class="text-sm hidden p-5">
        <div class="flex items-center">
            <label class="block text-sm mr-2"
                   for="input1">Quiz {{$lessonIndex}}: </label>
            <input id="input-quiz-name-{{$lessonIndex}}"
                   name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][name]"
                   value="{{$quiz->name ?? "Quiz " . $lessonIndex}}"
                   class="flex-grow required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                   type="text"/>
            <input name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][index]"
                   value="{{$quiz->index ?? $lessonIndex}}"
                   type="hidden"/>

            @if(isset($quiz))
                <input type="hidden" name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][id]"
                       value="{{$quiz->id}}">
            @endif
        </div>
        <div class="flex-end flex items-center justify-end ml-auto">
            <div
                id="btn-cancel-lesson"
                data-id="{{$lessonIndex}}"
                class="btn-cancel-quiz text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                id="btn-save-lesson"
                data-id="{{$lessonIndex}}"
                class="btn-save-quiz bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>

    <div id="quiz-questions-form-container-{{$lessonIndex}}" class="text-sm p-5">

        @if(isset($quiz->questions))
            @php
                $questionIndex = 1;
            @endphp
            @foreach($quiz->questions as $key=>$question)
                @include('author.course._question_form', ['sectionIndex' => $sectionIndex, 'lessonIndex' => $lessonIndex, 'questionIndex' => $questionIndex, 'question' => $question,])
                @php
                    $questionIndex++;
                @endphp
            @endforeach
        @endif
    </div>


    <div id="quiz-add-list-question-{{$lessonIndex}}" class="text-sm hidden p-5">
        <div id="quiz-add-content-{{$lessonIndex}}"
             data-id="{{$lessonIndex}}"
             data-section-id="{{$sectionIndex}}"
             class="btn-add-text-question-multi-choices bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center w-max mr-2 cursor-pointer">
            <span class="icon material-icons text-sm mr-1">add</span>
            Multi choices
        </div>
    </div>

    <div id="quiz-add-list-{{$lessonIndex}}" class="text-sm hidden p-5">
        <div id="quiz-add-question-{{$lessonIndex}}"
             data-id="{{$lessonIndex}}"
             data-section-id="{{$sectionIndex}}"
             class="btn-add-quiz-question bg-indigo-600 text-white text-xxs px-2 py-1 flex items-center w-max mr-2 cursor-pointer">
            <span class="icon material-icons text-sm mr-1">add</span>
            Question
        </div>

        <div id="btn-add-quiz-detail-{{$lessonIndex}}"
             data-id="{{$lessonIndex}}"
             data-section-id="{{$sectionIndex}}"
             class="btn-add-quiz-detail bg-indigo-600 mt-2 text-white text-xxs px-2 py-1 flex items-center w-max mr-2 cursor-pointer">
            <span class="icon material-icons text-sm mr-1">add</span>
            Detail
        </div>
    </div>

    <div id="quiz-input-detail-{{$lessonIndex}}" class="text-sm mt-2 p-5 hidden">
        @include("author.course._quiz_detail_form", ["sectionIndex" => $sectionIndex, "lessonIndex" => $lessonIndex, "timeUnits" => $timeUnits, "quizDetail" => $quiz->detail ?? null])
        <div class="flex-end flex items-center justify-end ml-auto mt-2">
            <div
                id="btn-cancel-quiz-detail"
                data-id="{{$lessonIndex}}"
                class="btn-cancel-quiz-detail text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                id="btn-save-quiz-detail"
                data-id="{{$lessonIndex}}"
                class="btn-save-quiz-detail bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>

</div>
