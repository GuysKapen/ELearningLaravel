@extends('layouts.frontend.course_detail')


@section('detail')
    <div class="w-11/12 mx-auto shadow-md p-8 mt-8 border">
        <h3 class="text-lg text-gray-900 font-bold tracking-wider">
            Quiz: {{ $quiz->name }}
        </h3>
        <p class="mt-4 text-sm font-medium text-gray-500 tracking-wider">
            {{ $quiz->detail->description }}
        </p>

        <h4 class="text-base font-bold text-gray-700 mt-4">Attempts</h4>
        <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                        Score
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Duration
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($attempts as $key => $attempt)
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 px-6 text-left">{{ $i++ }}
                                        </td>
                                        <td class="text-sm font-medium text-gray-900 px-6 text-left">
                                            {{ $attempt->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ $attempt->result->score * 100 }}%
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            {{ timeText($attempt->result->created_at->diffInSeconds($attempt->created_at)) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('quiz.attempt.review', $attempt) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mx-2">Review</a>
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex justify-between mt-6">
            <p class="text-sm font-medium text-gray-500 tracking-wider">
                <span class="font-bold">Allow attempt: </span>
                {{ $quiz->detail->allow_num_attempt < 0 ? 'Unlimited' : $quiz->detail->allow_num_attempt }}
            </p>
            <p class="text-sm font-medium text-gray-500 tracking-wider">
                <span class="font-bold">Duration: </span> {{ timeText($quiz->detail->duration) }}
            </p>
        </div>



        <form action="{{ route('quiz.attempt', $quiz) }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $quiz->id }}" name="quiz_id">
            <button type="submit" name="quiz"
                class="font-bold text-sm px-8 py-2 bg-indigo-600 text-white ml-auto rounded-full block mt-4">
                Start
            </button>
        </form>

    </div>
@endsection

@push('js')
@endpush
