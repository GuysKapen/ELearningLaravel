@php
    if (!isset($sectionIndex)) {
        $sectionIndex = "--sectionIndex--";
    }

    if (!isset($lessonIndex)) {
        $lessonIndex = "--index--";
    }
@endphp
<label class="block my-2 font-semibold" for="body">Content</label>
<textarea id="input-lesson-content-{{$lessonIndex}}"
          name="sections[{{$sectionIndex}}][lessons][{{$lessonIndex}}][content][content]"
          placeholder="Enter content here"></textarea>
<script>
    tinymce.init({
        selector: 'textarea#input-lesson-content-{{$lessonIndex}}', // Replace this CSS selector to match the placeholder element for TinyMCE
        statusbar: false,
        image_advtab: true,
        height: "240",
        setup: function (editor) {
            editor.on('init', function () {
                //this gets executed AFTER TinyMCE is fully initialized
                editor.setContent('{!! $lessonContent->content ?? "" !!}');
            });
        }
    });
</script>
