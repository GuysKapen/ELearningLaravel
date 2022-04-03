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


<section class="pb-8">
    <div class="flex">
        <div class="md:w-3/12">
            <div class="px-4">
                <div class="flex items-center text-sm font-black text-indigo-400">
                    <h3>COURSE</h3>
                    <span class="material-icons outlined text-sm">chevron_right</span>
                    <h3>TECHNOLOGY</h3>
                    <span class="material-icons outlined text-sm">chevron_right</span>
                </div>
                <p class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4">Learn C++ Programming</p>
            </div>

            @php
                $i = 0;
            @endphp
            @foreach($courseLesson->section->course->sections as $key=>$section)
                @php
                    $i++;
                @endphp
                <div
                    class="overflow-hidden shadow-full my-4 bg-transparent border-none relative flex flex-col rounded-md"
                    id="accordionExample-{{$i}}">
                    <div class="bg-transparent border-none py-2 px-4 flex items-center justify-between"
                         id="heading-{{$i}}">
                        <div class="flex items-center">
                            <span id="indicator-{{$i}}" aria-labelledby="heading-{{$i}}"
                                  data-parent="#accordionExample-{{$i}}"
                                  class="mul-collapse-{{$i}} transition-all duration-300 material-icons outlined text-xl expand collapse">expand_more</span>
                            <h2 class="mb-0 ml-2 title-expand">
                                <button
                                    class="cursor-pointer w-full h-16 text-black font-bold text-left block bg-transparent border-0 py-2 text-base rounded-md outline-none"
                                    type="button" data-toggle="collapse"
                                    data-target=".mul-collapse-{{$i}}" aria-expanded="false"
                                    aria-controls="collapse-{{$i}}">
                                    Section {{$section->index}}: {{$section->name}}
                                </button>
                            </h2>
                        </div>
                    </div>

                    <div id="collapse-{{$i}}" class="transition-all duration-1000 collapse mul-collapse-{{$i}}"
                         aria-labelledby="heading-{{$i}}"
                         data-parent="#accordionExample-{{$i}}">
                        <div class="bg-gray-100 px-4 py-2">
                            @foreach($section->lessons as $key=>$lesson)
                                <div class="pb-2 border-b mt-2">
                                    <div class="flex items-start">
                                        <div class="flex items-center w-12 flex-shrink-0">
                                            <span class="material-icons outlined text-base">description</span>
                                            <span class="ml-2 text-sm font-bold">1.1</span>
                                        </div>
                                        <a href="{{route('author.course.lesson.show', $lesson->id)}}" class="mx-2 text-sm">
                                            <span class="text-sm font-bold text-black">{{$lesson->title}}</span>
                                        </a>
                                        <span class="icon-wrap small mr-3 flex-end ml-auto"><span
                                                class="icon material-icons">visibility</span></span>
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="w-12"></div>
                                        <p class="ml-2 text-gray-500 text-sm">50 mins</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="md:w-9/12">
            <!-- The actual video content -->
            <div class="iframe-container flex justify-center items-center">
                <iframe src="{{$courseLesson->video}}"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen="" width="950" height="550" frameborder="0"></iframe>
            </div>

            <div class="mt-8 mx-24">
                <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Description</h2>
                <div class="prose">
                    {!! $courseLesson->body !!}
                </div>
            </div>
        </div>
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

