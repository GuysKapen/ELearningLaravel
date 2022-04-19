@extends('layouts.frontend.app')

@section('title','New category')

@push('css')
@endpush

@section('content')
    <div class="bg-gray-50 py-8">
        <section class="rounded-md background-white-grey shadow-md m-8 overflow-hidden">
            <div>
                <nav
                    class="flex py-3 px-5 text-gray-700 shadow-sm bg-white dark:bg-gray-800 dark:border-gray-700"
                    aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{route("home")}}"
                               class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700 dark:text-gray-400 dark:hover:text-white">
                                Home
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <span class="material-icons text-base outlined mx-2">chevron_right</span>
                                <span
                                    class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">New course</span>
                            </div>
                        </li>
                    </ol>
                </nav>

            </div>

            @include('author.course._form')

        </section>
    </div>
@endsection
