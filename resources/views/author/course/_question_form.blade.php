@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--sectionIndex--";
    }

    if (!isset($lessonIndex)) {
        $lessonIndex = "--index--";
    }
@endphp
<div class="question-form-container-{{$lessonIndex}}" data-id="{{$lessonIndex}}">
    <div id="question-info-{{$lessonIndex}}" class="flex items-center text-sm hidden">
        <span class="text-sm font-bold">{{$lessonIndex}}.</span>
        <div id="question-name-{{$lessonIndex}}"
              class="mx-1 text-sm whitespace-nowrap overflow-hidden text-ellipsis">{{$question->name ?? "Question"}}</div>
        <div class="flex-end flex items-center ml-auto">
        <span data-id="{{$lessonIndex}}"
              class="question-edit icon material-icons text-sm mr-1 mx-2 cursor-pointer">edit</span>
            <span class="icon material-icons text-sm mr-1 mx-2">delete</span>
            <span class="icon material-icons text-sm mr-1 mx-2">menu</span>
        </div>
    </div>
    <div id="question-form-{{$lessonIndex}}">
        <label class="block my-2 font-semibold" for="body">Question</label>
        <textarea id="input-question-name-{{$lessonIndex}}" name="section[{{$sectionIndex}}][quiz][{{$lessonIndex}}][question][question]"
                  placeholder="Enter content here"></textarea>
        <label class="block my-2 font-semibold" for="body">Options</label>
        @for($i = 0; $i < 4; $i++)
            <div class="flex items-start mb-4">
                <input name="section[{{$sectionIndex}}][quiz][{{$lessonIndex}}][question][option][answer]"
                       type="checkbox"
                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                <textarea
                    class="w-full px-4 ml-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                    name="section[{{$sectionIndex}}][quiz][{{$lessonIndex}}][question][option][option]"
                    placeholder="Add a option"></textarea>
            </div>
        @endfor

        <div class="mt-8">
            <label class="block my-2 font-semibold" for="body">Question Description</label>
            <textarea
                class="w-full px-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                name="section[{{$sectionIndex}}][quiz][{{$lessonIndex}}][question][detail][description]"
                placeholder="Description"></textarea>
            <span
                class="input-desc mt-3 block">Brief description about the question</span>
        </div>


        <div class="mt-8">
            <label class="block font-semibold text-sm mt-2 w-4/12"
                   for="input1">Mark Of Question</label>

            <input name="section[{{$sectionIndex}}][quiz][{{$lessonIndex}}][question][detail][mark]"
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
                name="section[{{$sectionIndex}}][quiz][{{$lessonIndex}}][question][detail][explain]"
                placeholder="Description"></textarea>

            <span
                class="input-desc mt-3 block">Explain why the option is true and other is false. This will be shown when user check answer</span>
        </div>

        <div class="mt-8">
            <label class="block font-semibold text-sm mt-2 w-4/12"
                   for="input1">Question Hint</label>

            <textarea
                class="w-full mt-2 px-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                name="section[{{$sectionIndex}}][quiz][{{$lessonIndex}}][question][detail][hint]"
                placeholder="Description"></textarea>

            <span
                class="input-desc mt-3 block">Instruction to help student select right answer. This will be shown when user click 'Hint' button</span>
        </div>

        <div class="flex-end flex items-center justify-end ml-auto mt-2">
            <div
                id="btn-cancel-question-form"
                data-id="{{$lessonIndex}}"
                class="btn-cancel-quiz-question text-xxs px-2 py-1 flex items-center mr-2 cursor-pointer">
                Cancel
            </div>
            <div
                id="btn-save-question-form"
                data-id="{{$lessonIndex}}"
                class="btn-save-quiz-question bg-indigo-600 cursor-pointer text-white text-xxs px-2 py-1 flex items-center">
                Save
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        tinymce.init({
            selector: 'textarea#mce-instance', // Replace this CSS selector to match the placeholder element for TinyMCE
            statusbar: false,
            menubar: false,
            image_advtab: true,
            height: "160",
            toolbar: 'bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | image',
            setup: function (editor) {
                editor.on('init', function () {
                    //this gets executed AFTER TinyMCE is fully initialized
                    editor.setContent('{!! $courseLesson->body ?? "" !!}');
                });
            }
        });
    })
</script>
