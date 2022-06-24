<div class="pb-2 border-b mt-2">
    <div class="flex items-start">
        <div class="flex items-start w-16 flex-shrink-0">
            <span class="material-icons outlined text-base leading-5">description</span>
            <span class="ml-2 text-sm font-bold">Quiz</span>
        </div>
        <a href="{{route('course.detail.quiz', ['course' => $course, 'quiz' => $quiz])}}"
           class="mx-2 text-sm">
            <span class="text-sm font-bold text-gray-600">{{$quiz->name}}</span>
        </a>
    </div>
    <div class="flex mt-1">
        <div class="w-16"></div>
        <p class="ml-2 text-gray-500 text-sm">{{timeText($quiz->detail->duration ?? 0)}}</p>
    </div>
</div>
