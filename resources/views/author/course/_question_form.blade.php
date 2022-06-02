@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--sectionIndex--";
    }

    if (!isset($lessonIndex)) {
        $lessonIndex = "--index--";
    }

    if (!isset($questionIndex)) {
        $questionIndex = "--questionIndex--";
    }
@endphp
<div class="question-form-container-{{$questionIndex}} mb-4" data-id="{{$questionIndex}}">
    <div id="question-info-{{$questionIndex}}" class="flex items-center text-sm hidden">
        <span class="text-sm font-bold">{{$questionIndex}}.</span>
        <div id="question-name-{{$questionIndex}}"
              class="mx-1 text-sm whitespace-nowrap overflow-hidden text-ellipsis">{{$question->name ?? "Question"}}</div>
        <div class="flex-end flex items-center ml-auto">
        <span data-id="{{$questionIndex}}"
              class="question-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
            <span class="icon material-icons text-sm mr-1 mx-2">delete</span>
            <span class="icon material-icons text-sm mr-1 mx-2">menu</span>
        </div>
    </div>
    <div id="question-form-{{$questionIndex}}">
        <label class="block my-2 font-semibold" for="body">Question</label>
        <textarea id="input-question-name-{{$questionIndex}}" name="section[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][question]"
                  placeholder="Enter content here"></textarea>
        <label class="block my-2 font-semibold" for="body">Options</label>
        @for($i = 0; $i < 4; $i++)
            <div class="flex items-start mb-4">
                <input name="section[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][options][{{$i}}][answer]"
                       type="checkbox"
                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                <textarea
                    class="w-full px-4 ml-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                    name="section[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][options][{{$i}}][option]"
                    placeholder="Add a option"></textarea>
            </div>
        @endfor

        <div class="mt-8">
            <label class="block my-2 font-semibold" for="body">Question Description</label>
            <textarea
                class="w-full px-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                name="section[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][detail][description]"
                placeholder="Description"></textarea>
            <span
                class="input-desc mt-3 block">Brief description about the question</span>
        </div>


        <div class="mt-8">
            <label class="block font-semibold text-sm mt-2 w-4/12"
                   for="input1">Mark Of Question</label>

            <input name="section[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][detail][mark]"
                   value="1"
                   class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                   type="number"
            />

            <span
                class="input-desc mt-3 block">Mark for choosing the correct answer</span>
        </div>

        <div class="mt-8">
            <label class="block font-semibold text-sm mt-2 w-4/12"
                   for="input1">Question Explanation</label>

            <textarea
                class="w-full mt-2 px-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                name="section[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][detail][explain]"
                placeholder="Description"></textarea>

            <span
                class="input-desc mt-3 block">Explain why the option is true and other is false. This will be shown when user check answer</span>
        </div>

        <div class="mt-8">
            <label class="block font-semibold text-sm mt-2 w-4/12"
                   for="input1">Question Hint</label>

            <textarea
                class="w-full mt-2 px-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                name="section[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][detail][hint]"
                placeholder="Description"></textarea>

            <span
                class="input-desc mt-3 block">Instruction to help student select right answer. This will be shown when user click 'Hint' button</span>
        </div>

        <div class="flex-end flex items-center justify-end ml-auto mt-2">
            <div
                id="btn-cancel-question-form"
                data-id="{{$questionIndex}}"
                class="btn-cancel-quiz-question text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                id="btn-save-question-form"
                data-id="{{$questionIndex}}"
                class="btn-save-quiz-question bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>
</div>
