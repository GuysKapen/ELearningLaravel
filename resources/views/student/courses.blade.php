@extends('layouts.instructor.app')

@section('title', 'All courses')

@push('css')
@endpush


@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card m-8 px-8 pb-8">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <h2 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">
                                All courses
                            </h2>
                            <span
                                class="inline-flex ml-4 items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-indigo-600 rounded-full">{{ $courses->count() }}</span>
                        </div>
                    </div>

                    <div class="flex flex-col mt-4">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200">
                                    @foreach ($courses as $key => $course)
                                        <div class="flex mb-8 h-36 items-start border p-4 rounded-md shadow-sm">
                                            <div class="w-2/12 h-full">
                                                <img src="{{ asset('storage/course/' . ($course->feature_img ?? 'default.png')) }}"
                                                    class="object-cover h-full" alt="Course image">
                                            </div>

                                            <div class="flex-grow px-6">
                                                <a href="{{ route('course', [$course->id]) }}">
                                                    <p class="text-base font-bold text-gray-900 hover:text-indigo-500">
                                                        {{ $course->name }}
                                                    </p>
                                                </a>

                                                <p class="text-sm mt-1 text-gray-400 font-medium capitalize">
                                                    <span>Instructor: &nbsp;</span>
                                                    <a href="{{ route('course', [$course->id]) }}"
                                                        class="hover-text-indigo-600">
                                                        <span class="hover:text-indigo-600 font-bold text-gray-700">
                                                            {{ $course->user->username }}
                                                        </span>
                                                    </a>
                                                </p>

                                                @php
                                                    $percent = $course->lessons->where('is_complete', '=', true)->count() / $course->lessons->count() * 100;
                                                @endphp

                                                @if ($percent == 0)
                                                    <a href="{{ route('course', [$course->id]) }}"> <button
                                                            class="rounded-lg h-full font-black flex items-center text-sm text-indigo-600 hover:text-indigo-800 py-2 mt-9">
                                                            Start course
                                                        </button>
                                                    </a>
                                                @else
                                                    <div>
                                                        <div class="w-full bg-gray-200 rounded-full h-1 mt-8">
                                                            <div class="bg-indigo-600 h-1 rounded-full"
                                                                style="width: {{ $percent }}%">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="text-sm text-gray-400">{{ round($percent) }}%
                                                                complete</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection


@push('js')
    <script type="text/javascript">
        function deleteCategory(id) {
            showConfirmPopup(function() {
                document.getElementById('delete-form-' + id).submit();
            })
        }
    </script>
@endpush
