@extends('layouts.frontend.app')

@section('title','Course')

@push('css')
@endpush

@section('content')

    <section class="mt-4">
        <nav
            class="flex py-3 px-5 text-gray-700 rounded-lg shadow-sm border-gray-200 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{url("home")}}"
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        Home
                    </a>
                </li>
                @if(!$course->categories->isEmpty())
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-icons text-base outlined mx-2">chevron_right</span>
                            <span
                                class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{$course->categories[0]->name}}</span>
                        </div>
                    </li>
                @endif
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="material-icons text-base outlined mx-2">chevron_right</span>
                        <span
                            class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{$course->name}}</span>
                    </div>
                </li>
            </ol>
        </nav>

    </section>

    <section class="w-8/12 mx-auto mt-8">
        <h2 class="text-black fw-900 font-black text-2xl font-mul mb-8">{{$course->name}}</h2>
        <div class="flex justify-between">
            <div class="flex divide-x-2">
                <div class="flex items-center pr-4">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full object-cover"
                             src="{{asset("storage/profile/" . ($course->user->authorDetail->cover ?? ""))}}"
                             alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm text-gray-500">{{$course->user->authorDetail->title ?? "Instructor"}}</div>
                        <div
                            class="text-sm font-medium text-gray-900 capitalize font-bold mt-1">{{$course->user->username}}</div>
                    </div>
                </div>
                @if(!$course->categories->isEmpty())
                    <div class="px-4 flex flex-col justify-center">
                        <div class="text-sm text-gray-500">Category</div>
                        <div
                            class="text-sm font-medium text-gray-900 font-bold mt-1">{{$course->categories[0]->name}}</div>
                    </div>
                @endif

                @if(!$course->comments->isEmpty())
                    <div class="px-4">
                        <div class="text-sm text-gray-500">Review</div>
                        <div class="mt-1">
                            <div class="width-max mt-2 relative flex">
                                <span class="rating-stars">{{$course->comments->avg('rating')}}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="flex item-centers">
                @if(isset($course->coursePrice) && $course->coursePrice->price != 0)
                    <a href="{{route('course.checkout', $course)}}" class="h-full flex items-center">
                        <h2 class="text-black fw-900 font-black text-2xl font-mul ">
                            $@convert($course->coursePrice->price)
                        </h2>
                        <button class="px-6 rounded-lg h-full font-black text-sm text-white bg-indigo-600 ml-8">Buy this course
                        </button>
                    </a>

                @else
                    <h2 class="text-black fw-900 font-black text-2xl font-mul ">Free</h2>
                    <form action="{{route('course.enroll')}}" class="h-full" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <button
                            type="submit"
                            class="px-6 rounded-lg h-full font-black flex items-center text-sm text-white bg-indigo-600 ml-8">
                            Take
                            this
                            course
                        </button>
                    </form>
                @endif
            </div>
        </div>

        @if(isset($course->results))
            <section class="my-8">
                <div class="shadow-md p-8 border-t">
                    <h2 class="text-black fw-900 font-black text-xl font-mul">
                        What you'll learn</h2>
                    <div class="mt-4">
                        <ul class="flex flex-wrap list-col-2">
                            @foreach($course->results as $key=>$result)
                                <li class="mt-2">
                                    <div class="flex">
                                        <span class="material-icons text-sm outlined">check</span>
                                        <div class="text-sm ml-2">
                                <span
                                    class="text-sm">{{$result->result}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        @endif

        @if(!$course->requirements->isEmpty())
            <section class="mt-8">
                <h2 class="text-black fw-900 font-black text-2xl font-mul mb-2">
                    Requirements
                </h2>

                <ul class="list-disc pl-6 marker:text-indigo-400 marker:text-xxs">
                    @foreach($course->requirements as $key=>$requirement)
                        <li class="text-sm pb-1 pl-2">{{$requirement->requirement}}</li>
                    @endforeach

                </ul>

            </section>
        @endif

        <section class="my-8">
            <div class="tab-pane active" id="description">

                <div class="flex">
                    <div class="w-8/12">
                        <h2 class="text-black fw-900 font-black text-2xl font-mul mb-2">
                            Description
                        </h2>
                        <div class="prose">
                            {!! $course->description !!}
                        </div>
                    </div>

                    @php
                        $courseDetail = $course->detail;
                    @endphp

                    @if(isset($courseDetail))
                        <div class="pl-4">
                            <h2 class="text-black fw-900 font-black text-2xl font-mul mb-2">
                                Course features
                            </h2>
                            <div class="p-8 rounded mt-8 bg-white shadow-full">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <div class="flex items-center">

                                                <div class="mr-3 icon-wrap">
                                                    <span class="icon material-icons outlined">school</span>
                                                </div>
                                                <div><h3 class="m-0 text-base text-gray-800 font-medium">
                                                        Lectures</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <p class="text-sm text-gray-500 font-medium">{{$course->lessons()->count()}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <div class="flex items-center">

                                                <div class="mr-3 icon-wrap">
                                                            <span
                                                                class="icon material-icons outlined">question_mark</span>
                                                </div>
                                                <div><h3 class="m-0 text-base text-gray-800 font-medium">
                                                        Quizzes</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <p class="text-sm text-gray-500 font-medium">0</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <div class="flex items-center">

                                                <div class="mr-3 icon-wrap">
                                                        <span
                                                            class="icon material-icons outlined">hourglass_empty</span>
                                                </div>
                                                <div><h3 class="m-0 text-base text-gray-800 font-medium">
                                                        Duration</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <p class="text-sm text-gray-500 font-medium">{{$courseDetail->duration_info}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <div class="flex items-center">

                                                <div class="mr-3 icon-wrap">
                                                            <span
                                                                class="icon material-icons outlined">trending_up</span>
                                                </div>
                                                <div><h3 class="m-0 text-base text-gray-800 font-medium">
                                                        Skill level</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <p class="text-sm text-gray-500 font-medium">{{$courseDetail->skill_level}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <div class="flex items-center">

                                                <div class="mr-3 icon-wrap">
                                                    <span class="icon material-icons outlined">translate</span>
                                                </div>
                                                <div><h3 class="m-0 text-base text-gray-800 font-medium">
                                                        Languages</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <p class="text-sm text-gray-500 font-medium">{{$courseDetail->language}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <div class="flex items-center">

                                                <div class="mr-3 icon-wrap">
                                                    <span class="icon material-icons outlined">school</span>
                                                </div>
                                                <div><h3 class="m-0 text-base text-gray-800 font-medium">
                                                        Students</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <p class="text-sm text-gray-500 font-medium">{{$courseDetail->student_enrolled}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <div class="flex items-center">

                                                <div class="mr-3 icon-wrap">
                                                    <span class="icon material-icons outlined">check_box</span>
                                                </div>
                                                <div><h3 class="m-0 text-base text-gray-800 font-medium">
                                                        Assessment</h3>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 py-4">
                                            <p class="text-sm text-gray-500 font-medium">Yes</p>
                                        </td>
                                    </tr>

                                    <!-- More people... -->
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </section>

        @if(isset($course->targets))
            <section class="mt-8">
                <h2 class="text-black fw-900 font-black text-2xl font-mul mb-2">
                    Who is this course for?
                </h2>

                <ul class="list-disc pl-6 marker:text-indigo-400 marker:text-xxs">
                    @foreach($course->targets as $key=>$target)
                        <li class="text-sm pb-1 pl-2">{{$target->target}}</li>
                    @endforeach

                </ul>

            </section>
        @endif

        <section class="my-8">
            <div class="tab-pane" id="cirriculum">
                <h2 class="text-black fw-900 font-black text-2xl font-mul">Course content</h2>
                <div class="mt-4">
                    @php
                        $i = 0;
                    @endphp
                    @foreach($course->sections as $key=>$section)
                        @php
                            /** @noinspection PhpUndefinedVariableInspection */$i++;
                        @endphp
                        <div
                            class="overflow-hidden shadow-sm bg-transparent border-none relative flex flex-col rounded-md"
                            id="accordionExample-{{$i}}">
                            <div class="bg-transparent border-none py-2 flex items-center justify-between"
                                 id="heading-{{$i}}">
                                <div class="flex items-center">
                            <span id="indicator-{{$i}}" aria-labelledby="heading-{{$i}}"
                                  data-parent="#accordionExample-{{$i}}"
                                  class="mul-collapse-{{$i}} transition-all duration-300 material-icons outlined text-xl expand collapse {{$i == 1 ? 'show' : ''}}">expand_more</span>
                                    <h2 class="mb-0 ml-2 title-expand">
                                        <button
                                            class="cursor-pointer w-full text-black font-bold text-left block bg-transparent border-0 py-2 text-base rounded-md outline-none"
                                            type="button" data-toggle="collapse"
                                            data-target=".mul-collapse-{{$i}}" aria-expanded="false"
                                            aria-controls="collapse-{{$i}}">
                                            Section {{$i}}: {{$section->name}}
                                            {{--                                                Section {{$section->index}}: {{$section->name}}--}}
                                        </button>
                                    </h2>
                                </div>
                            </div>

                            <div id="collapse-{{$i}}"
                                 class="transition-all duration-1000 collapse mul-collapse-{{$i}} {{$i == 1 ? 'show' : ''}}"
                                 aria-labelledby="heading-{{$i}}"
                                 data-parent="#accordionExample-{{$i}}">
                                <div class="bg-gray-100 px-4 py-2">
                                    @php
                                        $j = 0;
                                    @endphp
                                    @foreach($section->lessons as $key=>$lesson)
                                        @php
                                            /** @noinspection PhpUndefinedVariableInspection */$j++;
                                        @endphp
                                        <div class="pb-2 border-b mt-2">
                                            <div class="flex items-start">
                                                <div class="flex items-center w-32 flex-shrink-0">
                                                            <span
                                                                class="material-icons outlined text-base text-indigo-600">description</span>
                                                    <span
                                                        class="ml-2 text-sm font-bold">Lecture {{$i}}.{{$j}}</span>
                                                </div>
                                                <span
                                                    class="mx-2 text-sm font-bold text-black max-w-1/2">{{$lesson->title}}</span>
                                                @if($lesson->detail->is_preview ?? false)
                                                    <span class="icon-wrap small mr-3 flex-end"><span
                                                            class="icon material-icons">visibility</span></span>
                                                @endif

                                                @php
                                                    $timeText = timeText($lesson->detail->duration ?? 0);
                                                @endphp

                                                <p class="ml-2 text-gray-500 text-sm ml-auto flex-end">{{ $timeText }}</p>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>

        <section class="my-8">
            <div class="tab-pane" id="instructor">
                <h2 class="text-black fw-900 font-black text-2xl font-mul">Instructor</h2>
                <div class="mt-4">
                    <div>
                        <div class="flex items-center pr-4">
                            <div class="flex-shrink-0 h-32 w-32">
                                <img class="h-32 w-32 rounded-full object-cover"
                                     src="{{asset("storage/profile/" . ($course->user->authorDetail->cover ?? ""))}}"
                                     alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm text-gray-500">{{$course->user->authorDetail->title ?? ""}}</div>
                                <div
                                    class="text-sm font-medium text-gray-900 capitalize font-bold mt-1">{{$course->user->username}}</div>
                                <div class="flex mt-4">
                                    <div class="border-2 rounded-full w-8 h-8 border-f mr-2">
                                        <i class="fa-brands fa fa-facebook-f color-f w-full h-full text-center leading-7"></i>
                                    </div>
                                    <div class="border-2 rounded-full w-8 h-8 border-tw mr-2">
                                        <i class="fa-brands fa fa-twitter color-tw w-full h-full text-center leading-7"></i>
                                    </div>
                                    <div class="border-2 rounded-full w-8 h-8 border-gp mr-2">
                                        <i class="fa-brands fa fa-google-plus color-gp w-full h-full text-center leading-7"></i>
                                    </div>
                                    <div class="border-2 rounded-full w-8 h-8 border-wa mr-2">
                                        <i class="fa-brands fa fa-whatsapp color-wa w-full h-full text-center leading-7"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-8 text-sm">
                            {{$course->user->authorDetail->about ?? ""}}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-8">
            <div class="tab-pane" id="review">
                <div class="mt-2">
                    <h2 class="text-black fw-900 font-black text-2xl font-mul">Review</h2>

                    <div id="comment-container">
                        <div id="comment-form-container">
                            <div class="border rounded-md p-8 my-8">
                                <form class="simple_form w-full" id="new-comment-form" novalidate="novalidate"
                                      accept-charset="UTF-8" data-remote="true" method="post"
                                      action="{{route('course.comment')}}">
                                    @csrf
                                    <div>
                                        <h2 class="text-black fw-900 font-bold text-base font-mul">Rating</h2>
                                        <div class="w-full inline-block mt-2">
                                            <div class="rating-input width-max">
                                                <input type="hidden" name="comment[rating]" value="">
                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="5" name="comment[rating]"
                                                                      id="comment_rating_5"><label
                                                        for="comment_rating_5"></label></span>

                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="4" name="comment[rating]"
                                                                      id="comment_rating_4"><label
                                                        for="comment_rating_4"></label></span>

                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="3" name="comment[rating]"
                                                                      id="comment_rating_3"><label
                                                        for="comment_rating_3"></label></span>

                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="2" name="comment[rating]"
                                                                      id="comment_rating_2"><label
                                                        for="comment_rating_2"></label></span>

                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="1" name="comment[rating]"
                                                                      id="comment_rating_1"><label
                                                        for="comment_rating_1"></label></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="my-4">
                                        <h2 class="text-black fw-900 font-bold text-base font-mul">Course review</h2>
                                        <label class="text optional label text-left w-full hidden"
                                               for="comment_message">Description</label>
                                        <textarea
                                            class="placeholder-gray-500 focus:outline-none string w-full required block px-4 py-2 rounded-lg font-medium border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-4"
                                            placeholder="Commenting publicly as Guys Developer"
                                            name="comment[comment]" id="comment_message"
                                            rows="6"></textarea>
                                    </div>

                                    <input type="hidden" value="{{$course->id}}" name="comment[course_id]">
                                    <button type="submit"
                                            class="flex justify-end py-2 px-8 ml-auto block border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit
                                    </button>
                                </form>
                            </div>

                            <div class="antialiased mx-auto max-w-screen-sm">
                                @if(!$course->comments->isEmpty())
                                    <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
                                @endif

                                @foreach($course->comments as $key=>$comment)
                                    <div class="space-y-4">

                                        <div class="flex">
                                            <div class="flex-shrink-0 mr-3">
                                                <img class="object-cover mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                                                     src="{{asset("storage/profile/" . ($course->user->authorDetail->cover ?? ""))}}"
                                                     alt="Profile">
                                            </div>
                                            <div
                                                class="flex-1 capitalize border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                                <strong>{{$comment->user->username}}</strong> <span
                                                    class="text-xs text-gray-400">{{\Carbon\Carbon::parse($comment->created_at)->format('j F, Y')}}</span>
                                                <div class="width-max mt-2 relative flex">
                                                    <span class="rating-stars">{{$comment->rating}}</span>
                                                    <span class="text-sm ml-4">{{$comment->rating}} stars</span>
                                                </div>
                                                <p class="text-sm mt-2">
                                                    {{$comment->comment}}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </section>

    </section>
@endsection

@push('js')

@endpush
