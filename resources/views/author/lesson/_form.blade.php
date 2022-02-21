<div class="bg-white shadow-full p-8">
    <form
        action="{{ !isset($courseLesson) ? route('author.course-lesson.store') :  route('author.course-lesson.update',  $courseSection->id ) }}"
        method="{{ "POST" }}"
        enctype="multipart/form-data">
        @isset($courseLesson->id)
            @method('PATCH')
        @endisset
        @csrf
        <label class="block mb-1 font-semibold" for="input1">Lesson name</label>
        <input id="title"
               name="title"
               value="{{ old('name', isset($courseLesson) ? $courseLesson->title : "") }}"
               required
               class="string required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
               type="text" autofocus placeholder="Lesson name..."/>

        <label class="block mb-1 font-semibold" for="video">Video url</label>
        <input id="video"
               name="video"
               value="{{ old('name', isset($courseLesson) ? $courseLesson->video : "") }}"
               required
               class="string required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
               type="text" autofocus placeholder="Video url ..."/>

        <label class="block mb-1 mt-2 font-semibold" for="body">Content</label>
        <textarea id="mce-instance" name="body" placeholder="Enter content here"></textarea>
        <input type="hidden" name="section_id" value="{{$courseSection->id}}">

        <div class="py-3 text-right px-2 flex justify-between">
            <a href="{{ route('author.course.index') }}"
               class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </a>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>
</div>


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
                //this gets executed AFTER TinyMCE is fully initialized
                editor.setContent('{!! $courseLesson->body !!}');
            });
        }
    });
</script>
