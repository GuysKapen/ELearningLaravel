@extends('layouts.frontend.course_detail')


@section('detail')
    <div class="w-9/12 mx-auto">

        <form id="quiz-form" action="{{ route('quiz.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="attempt_id" value="{{ $attempt->id }}">
            <table class="divide-y divide-gray-200 min-w-full mx-auto shadow-md">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-5/12">
                            {{ $attempt->quiz->name }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @php
                        $i = 0;
                    @endphp
                    @foreach ($attempt->quiz->questions as $question)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td class="px-6 py-4 w-5/12 relative">
                                <div class="absolute right-4 top-4">
                                    @php
                                        $isAnswerCorrect = $attempt->isAnswerCorrect($question);
                                    @endphp
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $isAnswerCorrect ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $isAnswerCorrect ? '+' . $question->detail->mark : '-' . $question->detail->mark }}
                                    </span>
                                </div>
                                <div class="text-sm font-bold text-gray-900 flex"> {{ $i }}.
                                    &nbsp; {!! nl2br($question['question']) !!} </div>
                                <div class="text-sm font-medium text-gray-900">
                                    <ul>
                                        <li>
                                            @foreach ($question->options as $key => $option)
                                                <div>
                                                    <div class="inline-flex items-center mt-3">
                                                        <input type="checkbox"
                                                            {{ $attempt->answers->where('id', '=', $option->id)->isNotEmpty() ? 'checked' : '' }}
                                                            class="form-checkbox h-5 w-5 text-gray-600 block"
                                                            name="answers[{{ $question->id }}][{{ $option->id }}]">
                                                        <span class="ml-2 text-gray-700">
                                                            {{ $option->option }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>

            <a href="{{ route('course.detail.quiz', ['quiz' => $attempt->quiz, 'course' => $attempt->quiz->course]) }}">
                <button type="submit" name="quiz"
                    class="font-bold text-sm px-8 py-2 bg-indigo-600 text-white rounded-full block ml-auto mt-4">
                    Back
                </button>
            </a>
        </form>
    </div>
@endsection
