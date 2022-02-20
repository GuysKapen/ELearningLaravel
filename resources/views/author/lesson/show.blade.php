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

<div class="py-4 px-8 mb-8 flex bg-white shadow-full">
    <a class="text-indigo-600" href="{{url("home")}}">Home > &nbsp;</a>
    <h3>Computer Science <span
            class="text-gray-500">&nbsp;/&nbsp;C++&nbsp;/&nbsp; {{$courseLesson->section->course->name}} &nbsp;/&nbsp; {{$courseLesson->section->name}} &nbsp;/&nbsp; {{$courseLesson->title}}</span>
    </h3>
</div>


<section class="px-8 mx-auto pb-8">
    <div class="flex">
        <div class="md:w-8/12 pr-4">
            <!-- The actual video content -->
            <div class="iframe-container flex justify-center items-center">
                <iframe src="{{$courseLesson->video}}"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen="" width="950" height="550" frameborder="0"></iframe>
            </div>
        </div>
        <div class="md:w-4/12 pl-4">
            <div class="overflow-hidden shadow-full mb-4 bg-transparent border-none relative flex flex-col rounded-md">
                <div class="bg-transparent border-none py-2 px-4 flex items-center justify-between" id="heading">
                    <h2 class="mb-0">
                        <button
                            class="cursor-pointer w-full h-16 text-black font-bold text-left block bg-transparent border-0 px-4 py-2 text-base rounded-md outline-none"
                            type="button" data-toggle="collapse"
                            data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                            Chapter {{$courseLesson->section->index}} : {{$courseLesson->section->name}}
                        </button>
                    </h2>
                </div>

                <div id="collapse" class="transition-all duration-1000 collapse show"
                     aria-labelledby="heading"
                     data-parent="#accordionExample">
                    <div class="bg-gray-100 p-4 child-link-blue">
                        @foreach($courseLesson->section->lessons as $key=>$lesson)
                            <a class="block"
                               href="actualvideocontent_learninglad.php?video=1">&#10170 {{$lesson->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="mt-8">
        <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Description</h2>
        {!! $courseLesson->body !!}
    </div>
</section>

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

</html>

