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

    if(!isset($minimize)) {
            $minimize = false;
    }
@endphp
<div id="question-form-container-{{$questionIndex}}" class="mb-4 question-form-container input-question" data-id="{{$questionIndex}}">
    <div id="question-info-{{$questionIndex}}" class="flex items-center text-sm {{$minimize ? '' : 'hidden'}}">
        <span class="text-sm font-bold">{{$questionIndex}}.</span>
        <div id="question-name-{{$questionIndex}}"
             class="mx-1 text-sm whitespace-nowrap overflow-hidden text-ellipsis">{!! $question->question ?? "<p>Question</p>" !!}</div>
        <div class="flex-end flex items-center ml-auto">
        <span data-id="{{$questionIndex}}"
              class="question-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
            <span data-id="{{$questionIndex}}"
                  class="question-delete icon material-icons text-sm mr-1 mx-2 cursor-pointer">delete</span>
            <span class="icon material-icons text-sm mr-1 mx-2">menu</span>
        </div>
    </div>
    <div id="question-form-{{$questionIndex}}" class="{{$minimize ? 'hidden' : ''}}">
        <label class="block my-2 font-semibold" for="body">Question</label>
        <textarea id="input-question-name-{{$sectionIndex}}-{{$lessonIndex}}-{{$questionIndex}}"
                  name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][question]"
                  placeholder="Enter content here"></textarea>
        @if(isset($question))
            <input type="hidden"
                   name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][id]"
                   value="{{$lesson->id}}">
        @endif
        <label class="block my-2 font-semibold" for="body">Options</label>
        @if(isset($question->options))
            @php($i=0)
            @foreach($question->options as $key=>$option)
                <div class="flex items-start mb-4">
                    <input
                        name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][options][{{$i}}][answer]"
                        type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" {{$question->answers->where('question_option_id', '', $option->id)->isEmpty() ? "" : "checked"}}>
                    <textarea
                        class="w-full px-4 ml-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                        name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][options][{{$i}}][option]"
                        placeholder="Add a option">{!! $option->option !!}</textarea>
                    <input
                        name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][options][{{$i}}][id]"
                        type="hidden"
                        value="{{$option->id}}"
                    >
                </div>
                @php($i += 1)
            @endforeach
        @else
            @for($i = 0; $i < 4; $i++)
                <div class="flex items-start mb-4">
                    <input
                        name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][options][{{$i}}][answer]"
                        type="checkbox"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    <textarea
                        class="w-full px-4 ml-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                        name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][options][{{$i}}][option]"
                        placeholder="Add a option"></textarea>
                </div>
            @endfor
        @endif

        <div class="mt-8">
            <label class="block my-2 font-semibold" for="body">Question Description</label>
            <textarea
                class="w-full px-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][detail][description]"
                placeholder="Description">{{$question->detail->description ?? ""}}</textarea>
            <span
                class="input-desc mt-3 block">Brief description about the question</span>
        </div>


        <div class="mt-8">
            <label class="block font-semibold text-sm mt-2 w-4/12"
                   for="input1">Mark Of Question</label>

            <input
                name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][detail][mark]"
                value="{{$question->detail->mark ?? 1}}"
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
                name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][detail][explanation]"
                placeholder="Explanation">{{$question->detail->explanation ?? ""}}</textarea>

            <span
                class="input-desc mt-3 block">Explain why the option is true and other is false. This will be shown when user check answer</span>
        </div>

        <div class="mt-8">
            <label class="block font-semibold text-sm mt-2 w-4/12"
                   for="input1">Question Hint</label>

            <textarea
                class="w-full mt-2 px-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][questions][{{$questionIndex}}][detail][hint]"
                placeholder="Hint">{{$question->detail->hint ?? ""}}</textarea>

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
    <script>
        tinymce.init({
            selector: '#input-question-name-{{$sectionIndex}}-{{$lessonIndex}}-{{$questionIndex}}', // Replace this CSS selector to match the placeholder element for TinyMCE
            statusbar: false,
            menubar: false,
            image_advtab: true,
            height: "160",
            toolbar: 'bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | image',
            setup: function (editor) {
                editor.on('init', function () {
                    //this gets executed AFTER TinyMCE is fully initialized
                    editor.setContent('<?php echo $question->question ?? ""; ?>');
                });
            }
        });
    </script>
</div>
