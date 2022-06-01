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
            statusbar: false,
            image_advtab: true,
            height: "240",
            setup: function (editor) {
                editor.on('init', function () {
                    //this gets executed AFTER TinyMCE is fully initialized
                    editor.setContent('{!! $courseLesson->body ?? "" !!}');
                });
            }
        });
    })
</script>
