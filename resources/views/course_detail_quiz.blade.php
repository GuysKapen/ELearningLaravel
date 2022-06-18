@extends('layouts.frontend.course_detail')


@section('detail')

    <div class="w-11/12 mx-auto text-center shadow-md p-8 mt-8 border">
        <h3 class="px-6 py-3 text-base text-gray-700 font-medium text-gray-500 tracking-wider">
            Quiz: {{$quiz->name}}
        </h3>
        <p class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider">
            {{$quiz->detail->description}}
        </p>
        <p class="px-6 py-3 text-xs font-medium text-gray-500 tracking-wider">
            <span
                class="font-bold">Allow attempt: </span> {{$quiz->detail->allow_num_attempt < 0 ? "Unlimited" : $quiz->detail->allow_num_attempt}}
        </p>
        <p class="px-6 text-xs font-medium text-gray-500 tracking-wider">
            <span class="font-bold">Duration: </span> {{timeText($quiz->detail->duration)}}
        </p>
        <form action="{{route("quiz.attempt", $quiz)}}" method="POST">
            @csrf
            <input type="hidden" value="{{$quiz->id}}" name="quiz_id">
            <button type="submit" name="quiz"
                    class="font-bold text-sm px-8 py-2 bg-indigo-600 text-white mx-auto rounded-full block mt-4">
                Start
            </button>
        </form>

    </div>

@endsection

@push('js')
@endpush

