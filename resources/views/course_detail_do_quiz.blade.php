@extends('layouts.frontend.course_detail')


@section('detail')
    <div class="w-9/12 mx-auto">
        <div class="block ml-auto text-right my-2" id="time-out">time out</div>

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
                            <td class="px-6 py-4 w-5/12">
                                <div class="text-sm font-bold text-gray-900 flex"> {{ $i }}.
                                    &nbsp; {!! nl2br($question['question']) !!} </div>
                                <div class="text-sm font-medium text-gray-900">
                                    <ul>
                                        <li>
                                            @foreach ($question->options as $key => $option)
                                                <div>
                                                    <div class="inline-flex items-center mt-3">
                                                        <input type="checkbox"
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

            <button type="submit" name="quiz"
                class="font-bold text-sm px-8 py-2 bg-indigo-600 text-white ml-auto rounded-full block ml-auto mt-4">
                Submit
            </button>
        </form>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        function timeout() //function to check time out
        {
            let minute = Math.floor(timeleft / 60);
            let second = timeleft % 60;
            let min = checkMin(minute);
            let sec = checkSec(second)
            if (timeleft <= 0) {
                clearTimeout(tm); //if timeout then stop the timeout function
                document.getElementById("quiz-form").submit(); //if timeout then automatic submit the form
            } else {
                document.getElementById("time-out").innerHTML = min + ":" + sec; //else diplay the time
            }
            var tm = setTimeout(function() {
                timeout()
            }, 1000); //after each 1 minute the function timeout will called automatically
            timeleft--; //decrease time each time
        }

        function checkSec(second) //convert from  0:5 to 0:05
        {
            if (second < 10) {
                second = "0" + second;
            }
            return second;
        }

        function checkMin(minute) //convert from  0:20 to 00:20
        {
            if (minute < 10) {
                minute = "0" + minute;
            }
            return minute;
        }

        let timeleft = {{ $attempt->timeLeft() }};
        timeout();
    </script>

    <script>
        $("input[type='checkbox']").each(function() {
            $(this).click(function() {
                console.log("ksjfskfs");
                const optionId = $(this).attr("name").match(/\[([^\[\]]*)\]$/)[1];

                // Save answer
                const formData = {
                    _token: "{{ csrf_token() }}",
                    attempt_id: "{{ $attempt->id }}",
                    option_id: optionId,
                    is_save: $(this).is(":checked")
                };
                $.ajax({
                    type: "POST",
                    url: "{!! route('quiz.attempt.answer.submit') !!}",
                    data: formData,
                    success: function(response) {
                        $("#courses-container").html(response)
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
        })
    </script>
@endpush
