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
    <nav
        class="flex py-3 px-5 text-gray-700 rounded-lg shadow-sm border-gray-200 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Breadcrumb">
        <ol class="inline-flex items-center flex-wrap space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{url("home")}}"
                   class="hover:text-indigo-500 inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    Home
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <span class="material-icons text-base outlined mx-2">chevron_right</span>
                    <span
                        class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">Computer Science</span>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <span class="material-icons text-base outlined mx-2">chevron_right</span>
                    <span
                        class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{$courseLesson->section->course->name}}</span>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <span class="material-icons text-base outlined mx-2">chevron_right</span>
                    <span
                        class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{$courseLesson->section->name}}</span>
                </div>
            </li>

            <li aria-current="page">
                <div class="flex items-center">
                    <span class="material-icons text-base outlined mx-2">chevron_right</span>
                    <span
                        class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{$courseLesson->title}}</span>
                </div>
            </li>
        </ol>
    </nav>
</div>


<section class="pb-8">
    <div class="flex">
        <div class="md:w-3/12">
            <div class="px-4">
                <div class="flex items-center text-sm font-black text-indigo-400">
                    <h3>COURSE</h3>
                    <span class="material-icons mx-2 outlined text-sm">chevron_right</span>
                    <h3>TECHNOLOGY</h3>
                    <span class="material-icons mx-2 outlined text-sm">chevron_right</span>
                </div>
                <p class="block text-gray-500 text-sm font-bold md:text-left mb-1 md:mb-0 pr-4">{{$courseLesson->section->course->name}}</p>
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
                                    Section {{$section->index + 1}}: {{$section->name}}
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
                                        <a href="{{route('author.course.lesson.show', $lesson->id)}}"
                                           class="mx-2 text-sm">
                                            <span class="text-sm font-bold text-black">{{$lesson->title}}</span>
                                        </a>
                                        @if($lesson->detail->is_preview ?? false)
                                            <span class="icon-wrap small mr-3 flex-end ml-auto"><span
                                                    class="icon material-icons">visibility</span></span>
                                        @endif
                                    </div>
                                    <div class="flex mt-1">
                                        <div class="w-12"></div>
                                        <p class="ml-2 text-gray-500 text-sm">{{timeText($lesson->detail->duration ?? 0)}}</p>
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
            @if(isset($courseLesson->resource))
                <div class="iframe-container flex justify-center items-center">
                    <iframe src="{{$courseLesson->resource->video ?? ""}}"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen="" width="950" height="550"></iframe>
                </div>
            @endif

            @if(isset($courseLesson->content))
                <div class="mt-8 mx-24">
                    <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Description</h2>
                    <div class="prose">
                        {!! $courseLesson->content->content !!}
                    </div>
                </div>
            @endif
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

