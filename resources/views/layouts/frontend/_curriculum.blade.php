@php
    $i = 0;
@endphp
@foreach($course->sections as $key=>$section)
    @php
        $i++;
    @endphp
    <div
        class="overflow-hidden shadow-full bg-transparent border-none relative flex flex-col rounded-md"
        id="accordionExample-{{$i}}">
        <div class="bg-transparent border-none py-2 px-4 flex items-center justify-between"
             id="heading-{{$i}}">
            <div class="flex flex-col w-full">
                <div class="flex justify-between items-center w-full h-6"
                     type="button" data-toggle="collapse"
                     data-target=".mul-collapse-{{$i}}" aria-expanded="false"
                     aria-controls="collapse-{{$i}}">
                    <button
                        class="cursor-pointer w-full text-black font-bold text-left block bg-transparent border-0 text-sm rounded-md outline-none">
                        Section {{$section->index + 1}}: {{$section->name}}
                    </button>
                    <span id="indicator-{{$i}}" aria-labelledby="heading-{{$i}}"
                          data-parent="#accordionExample-{{$i}}"
                          class="mul-collapse-{{$i}} cursor-pointer transition-all duration-300 material-icons outlined text-xl expand collapse">expand_more</span>

                </div>

                <span
                    class="text-xxs text-gray-400 font-semibold">0 / {{$section->lessons->count()}} | {{timeText($section->lessons->sum('detail.duration') ?? 0)}} </span>
            </div>
        </div>

        <div id="collapse-{{$i}}" class="transition-all duration-1000 collapse mul-collapse-{{$i}}"
             aria-labelledby="heading-{{$i}}"
             data-parent="#accordionExample-{{$i}}">
            @php
                $index = 0;
                $quizIndex = 0; // Track what quiz has added
            @endphp
            <div class="bg-gray-100 px-4 py-2">
                @foreach($section->lessons as $key=>$lesson)
                    <div class="pb-2 border-b mt-2">
                        <div class="flex items-start">
                            <div class="flex items-start w-16 flex-shrink-0">
                                <span class="material-icons outlined text-base leading-5">description</span>
                                <span class="ml-2 text-sm font-bold">1.1</span>
                            </div>
                            <a href="{{route('course.detail', ['course' => $course, 'lesson' => $lesson])}}"
                               class="mx-2 text-sm">
                                <span class="text-sm font-bold text-gray-600">{{$lesson->title}}</span>
                            </a>
                            @if($lesson->detail->is_preview ?? false)
                                <span class="icon-wrap small mr-3 flex-end ml-auto"><span
                                        class="icon material-icons">visibility</span></span>
                            @endif
                        </div>
                        <div class="flex mt-1">
                            <div class="w-16"></div>
                            <p class="ml-2 text-gray-500 text-sm">{{timeText($lesson->detail->duration ?? 0)}}</p>
                        </div>
                    </div>
                    @php
                        $index++;
                        $quiz = $section->course->quizzes->where('index', '<=', $index+1)->where('index', '>', $quizIndex)->first();
                    @endphp
                    @if(isset($quiz))
                        @php
                        $quizIndex = $quiz->index;
                        @endphp
                        @include('course._quiz_curr', ["quiz" => $quiz])
                    @endif
                @endforeach
                @foreach($section->course->quizzes->where('index', '>', $index+1) as $key=>$quiz)
                    @include('course._quiz_curr', ["quiz" => $quiz])
                @endforeach
            </div>
        </div>
    </div>
@endforeach
