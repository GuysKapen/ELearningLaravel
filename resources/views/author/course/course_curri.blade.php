<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Learn Academy</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

<div id="dialog" title="Add section">
    @include('author.course_section._form')
</div>

<div class="topnav" id="myTopnav">
    <?php
    if (isset($_SESSION['userId'])) {
        echo '<a href="../../profile.php" name="profile">Profile</a>
               <a href="../../../includes/logout.inc.php" name="logout-submit">SIGN OUT</a>';
    }
    ?>
</div>

<div class="py-4 px-8 mb-8 flex bg-white shadow-full">
    <a class="text-indigo-600" href="{{url("home")}}">Home > &nbsp;</a>
    <h3>Computer Science <span class="text-gray-500">&nbsp;/&nbsp;C++&nbsp;/&nbsp; Learn C++ Programming | Video Tutorial for Beginners</span>
    </h3>
</div>

<div class="accordion" id="accordionExample">

    @php
        $i = 1;
    @endphp
    @foreach($course->sections as $key=>$section)
        <div class="overflow-hidden shadow-full mb-4 bg-transparent border-none relative flex flex-col rounded-md">
            <div class="bg-transparent border-none py-2 px-4 flex items-center justify-between" id="heading-{{$i}}">
                <h2 class="mb-0">
                    <button
                        class="cursor-pointer w-full h-16 text-black font-bold text-left block bg-transparent border-0 px-4 py-2 text-base rounded-md outline-none"
                        type="button" data-toggle="collapse"
                        data-target="#collapse-{{$i}}" aria-expanded="true" aria-controls="collapse-{{$i}}">
                        Chapter {{$i}} : {{$section->name}}
                    </button>
                </h2>
                <a href="{{route('author.course.new-lesson', $section->id)}}">
                    <button type="submit" class="px-6 py-2 bg-indigo-600 rounded-full text-white text-sm font-black">
                        Add topic
                    </button>
                </a>
            </div>

            <div id="collapse-{{$i}}" class="transition-all duration-1000 collapse"
                 aria-labelledby="heading-{{$i}}"
                 data-parent="#accordionExample">
                <div class="bg-gray-100 p-4">
                    @foreach($section->lessons as $key=>$lesson)
                        <div class="flex justify-between items-center">
                            <a class="link-blue"
                                href="{{route('author.course.lesson.show', $lesson->id)}}">&#10170 {{$lesson->title}}</a>
                            <a href="{{route('author.course-lesson.edit', $lesson->id)}}"
                               class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                <span class="material-icons text-sm mr-2">edit</span> Edit
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @php
            /** @noinspection PhpUndefinedVariableInspection */$i++;
        @endphp
    @endforeach

</div>

<div id="opener"
     class="cursor-pointer rounded-full bg-indigo-600 w-12 h-12 flex justify-center items-center text-white fixed right-4 bottom-4">
    <span class="material-icons">add</span>
</div>

</body>


<footer>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script>
    $(function () {
        $("#dialog").dialog({
            autoOpen: false

        });

        $("#opener").click(function () {
            $("#dialog").dialog('open');
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("form").submit(function (event) {
            event.preventDefault();

            const formData = {
                _token: "{{ csrf_token() }}",
                name: $("#name").val(),
                course_id: $("#course_id").val(),
            };

            $.ajax({
                type: "POST",
                url: "{!! route('author.course.add-section') !!}",
                data: formData,
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        $("#dialog").dialog('close');
                        $("#accordionExample").append('<div class="overflow-hidden shadow-full mb-4 bg-transparent border-none relative flex flex-col rounded-md">' +
                            '<div class="bg-transparent border-none py-2 px-4" id="heading-3">' +
                            '<h2 class="mb-0">' +
                            '<button' +
                            ' class="cursor-pointer w-full h-16 text-black font-bold text-left block bg-transparent border-0 px-4 py-2 text-base rounded-md outline-none"' +
                            ' type="button" data-toggle="collapse"' +
                            ' data-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">' +
                            'Chapter 2 : Manipulating Data types' +
                            '</button>' +
                            '</h2>' +
                            '</div>' +
                            '</div>');
                    }
                },
                error: function (error) {
                    console.log("xxxx");
                }
            });

        });
    });
</script>

</html>

