@extends('layouts.frontend.course_detail')


@section('detail')
    <div class="mx-auto shadow-md border w-11/12 p-16 rounded-md">

        <div>
            <div class="mx-auto text-center">

                <?php
                $total_ques = $answers['correct'] + $answers['incorrect'];
                $percentage = ($answers['correct'] * 100) / $total_ques;
                $message = '';
                if ($percentage <= 100 and $percentage >= 70) {
                    $message = 'Congratulation you have scored : ';
                } elseif ($percentage <= 69 and $percentage >= 50) {
                    $message = 'You can do better, try again. you scored : ';
                } else {
                    $message = 'Sorry you are failed, try again you scored : ';
                }

                ?>
                <h2 class="text-xl text-gray-800 font-bold">Your Quiz Result</h2><br>

                <table class="divide-y divide-gray-200 w-full mx-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Info</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Result</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">Correct questions</div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900"> <?php echo $answers['correct']; ?> </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">Incorrect questions</div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900"> <?php echo $answers['incorrect']; ?> </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">Total questions</div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900"> <?php echo $total_ques; ?> </div>
                                </div>
                            </td>

                        </tr>


                    </tbody>
                </table>



                <div class="card-header mt-5 bg-danger text-light text-base">
                    <?php echo $message; ?> <b class="text-indigo-800"><?php echo number_format($percentage, 2, '.', '') . ' %'; ?></b>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
