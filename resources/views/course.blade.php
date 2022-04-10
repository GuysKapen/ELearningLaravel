@extends('layouts.frontend.app')

@section('title','Course')

@push('css')
@endpush

@section('content')

    <section>

        <div class="py-4 px-8 mb-8 flex bg-white shadow-full">
            <a class="text-indigo-600" href="{{url("home")}}">Home > &nbsp;</a>
            <h3>Computer Science > &nbsp;<span
                    class="text-gray-500">{{$course->name}} </span>
            </h3>
        </div>
    </section>

    <section class="w-8/12 mx-auto">
        <h2 class="text-black fw-900 font-black text-2xl font-mul mb-8">{{$course->name}}</h2>
        <div class="flex justify-between">
            <div class="flex divide-x-2">
                <div class="flex items-center pr-4">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full object-cover"
                             src="{{asset("storage/profile/" . $course->user->authorDetail->cover)}}"
                             alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm text-gray-500">{{$course->user->authorDetail->title ?? "Instructor"}}</div>
                        <div class="text-sm font-medium text-gray-900 font-bold mt-1">{{$course->user->username}}</div>
                    </div>
                </div>
                <div class="px-4 flex flex-col justify-center">
                    <div class="text-sm text-gray-500">Category</div>
                    <div class="text-sm font-medium text-gray-900 font-bold mt-1">Technology</div>
                </div>
                <div class="px-4">
                    <div class="text-sm text-gray-500">Review</div>
                    <div class="mt-1">
                        <ul class="flex justify-center">
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                     class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </li>
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                     class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </li>
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                     class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </li>
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="star"
                                     class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                                </svg>
                            </li>
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="star"
                                     class="w-4 text-yellow-500" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex item-centers">
                @if(isset($course->coursePrice) && $course->coursePrice->price != 0)
                    <h2 class="text-black fw-900 font-black text-2xl font-mul ">
                        $@convert($course->coursePrice->price)
                    </h2>
                    <button class="px-6 rounded-lg font-black text-sm text-white bg-indigo-600 ml-8">Buy this course
                    </button>
                @else
                    <h2 class="text-black fw-900 font-black text-2xl font-mul ">Free</h2>
                    <button class="px-6 rounded-lg font-black text-sm text-white bg-indigo-600 ml-8">Take this course
                    </button>
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
                                     src="{{asset("storage/profile/" . $course->user->authorDetail->cover)}}"
                                     alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm text-gray-500">{{$course->user->authorDetail->title}}</div>
                                <div
                                    class="text-sm font-medium text-gray-900 text-capitalize font-bold mt-1">{{$course->user->username}}</div>
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
                            {{$course->user->authorDetail->about}}
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
                                      data-dashlane-rid="5f183d72891b1516" data-form-type="contact">
                                    <div>
                                        <h2 class="text-black fw-900 font-bold text-base font-mul">Rating</h2>
                                        <div class="w-full inline-block">
                                            <div class="rating-input width-max">
                                                <input type="hidden" name="comment[rating]" value="">
                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="5" name="comment[rating]"
                                                                      id="comment_rating_5"
                                                                      data-dashlane-rid="3a463bf61ae0f97b"
                                                                      data-form-type="other"><label
                                                        for="comment_rating_5"></label></span>

                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="4" name="comment[rating]"
                                                                      id="comment_rating_4"
                                                                      data-dashlane-rid="497668f5cd6d19f4"
                                                                      data-form-type="other"><label
                                                        for="comment_rating_4"></label></span>

                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="3" name="comment[rating]"
                                                                      id="comment_rating_3"
                                                                      data-dashlane-rid="76184e2a7ccbff16"
                                                                      data-form-type="other"><label
                                                        for="comment_rating_3"></label></span>

                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="2" name="comment[rating]"
                                                                      id="comment_rating_2"
                                                                      data-dashlane-rid="d010ffde94ddce38"
                                                                      data-form-type="other"><label
                                                        for="comment_rating_2"></label></span>

                                                <span class=""><input class="rating-input" type="radio"
                                                                      value="1" name="comment[rating]"
                                                                      id="comment_rating_1"
                                                                      data-dashlane-rid="1ad10248812cddac"
                                                                      data-form-type="other"><label
                                                        for="comment_rating_1"></label></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="my-4">
                                        <h2 class="text-black fw-900 font-bold text-base font-mul">Your
                                            review</h2>
                                        <label class="text optional label text-left w-full hidden"
                                               for="comment_message">Description</label>
                                        <textarea
                                            class="placeholder-gray-500 p-4 text optional input my-2 w-full rounded-lg font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                            placeholder="Commenting publicly as Guys Developer"
                                            name="comment[message]" id="comment_message"
                                            data-dashlane-rid="b87d632607dec86a"
                                            data-form-type="other"></textarea>
                                    </div>
                                    <div class="input hidden comment_product_id"><input value="99"
                                                                                        class="hidden"
                                                                                        type="hidden"
                                                                                        name="comment[product_id]"
                                                                                        id="comment_product_id">
                                    </div>
                                    <input type="submit" name="commit" value="Submit"
                                           class="px-8 text-sm font-black py-2 bg-white shadow-md rounded-full mx-auto text-center f5 font-josesans color-fade cursor-pointer"
                                           data-disable-with="Submit" data-dashlane-rid="4a4871ca8a8a9eee"
                                           data-form-type="action">
                                </form>
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
