@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--sectionIndex--";
    }

    if (!isset($lessonIndex)) {
        $lessonIndex = "--index--";
    }
@endphp
<label class="block my-2 font-semibold" for="body">Content</label>
<textarea id="mce-instance" name="section[{{$sectionIndex}}][lesson][{{$lessonIndex}}][content][content]" placeholder="Enter content here"></textarea>
<script>
    $(document).ready(function () {
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
                    editor.setContent('{!! $courseLesson->body ?? "" !!}');
                });
            }
        });
    })
</script>
