@extends('layouts.frontend.app')

@section('title', 'Course')

@push('css')
@endpush

@section('content')
    <div class="px-4 mb-8 flex bg-white shadow-full">
        <nav class="flex py-3 px-5 text-gray-700 rounded-lg shadow-sm border-gray-200 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center flex-wrap space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ url('home') }}"
                        class="hover:text-indigo-500 inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400 dark:hover:text-white">
                        Home
                    </a>
                </li>
                @if (!$course->categories->isEmpty())
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-icons text-base outlined mx-2">chevron_right</span>
                            <a href="{{ route('courses', ['cats[]' => $course->categories[0]->id]) }}">
                                <span
                                    class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{ $course->categories[0]->name }}</span>
                            </a>
                        </div>
                    </li>
                @endif
                <li aria-current="page">
                    <div class="flex items-center">
                        <span class="material-icons text-base outlined mx-2">chevron_right</span>
                        <a href="{{ route('course', [$course->id]) }}" class="text-gray-800 hover:text-indigo-500">
                            <span
                                class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{ $course->name }}</span>
                        </a>
                    </div>
                </li>

                @if (isset($courseLesson))
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-icons text-base outlined mx-2">chevron_right</span>
                            <span
                                class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{ $courseLesson->section->name ?? '' }}</span>
                        </div>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-icons text-base outlined mx-2">chevron_right</span>
                            <span
                                class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{ $courseLesson->title ?? '' }}</span>
                        </div>
                    </li>
                @elseif(isset($quiz))
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-icons text-base outlined mx-2">chevron_right</span>
                            <span
                                class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">{{ $quiz->name }}</span>
                        </div>
                    </li>
                @endif
            </ol>
        </nav>
    </div>


    <section class="pb-16">
        <div class="flex">
            <div class="md:w-3/12">
                <div class="px-4 mb-4">
                    <div class="flex items-center text-sm font-black text-indigo-400">
                        <a href="{{ route('courses') }}" class="hover:text-indigo-500">
                            <h3>COURSE</h3>
                        </a>
                        <span class="material-icons mx-2 outlined text-sm">chevron_right</span>
                        @if (!$course->categories->isEmpty())
                            <a href="{{ route('courses', ['cats[]' => $course->categories[0]->id]) }}"
                                class="hover:text-indigo-500">
                                <h3 class="text-uppercase">{{ $course->categories[0]->name }}</h3>
                            </a>
                            <span class="material-icons mx-2 outlined text-sm">chevron_right</span>
                        @endif
                    </div>
                    <a href="{{ route('course', [$course->id]) }}" class="text-gray-500 hover:text-indigo-500">
                        <p class="block text-sm font-bold md:text-left mb-1 md:mb-0 pr-4">{{ $course->name }}</p>
                    </a>
                </div>

                @include('layouts.frontend._curriculum', ['course' => $course])

            </div>
            <div class="md:w-9/12 px-4">
                <!-- The actual video content -->
                @yield('detail')
            </div>
        </div>

    </section>
@endsection


@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
@endpush
