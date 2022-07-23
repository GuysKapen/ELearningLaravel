@extends('layouts.frontend.app')

@section('title', 'Course')

@push('css')
@endpush

@section('content')

    <div class="w-11/12 mx-auto py-8">
        <section>
            <nav class="flex py-3 px-5 text-gray-700 rounded-lg shadow-sm border-gray-200 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <span class="material-icons text-base outlined mx-2">chevron_right</span>
                            <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">All
                                courses</span>
                        </div>
                    </li>
                </ol>
            </nav>

        </section>

        <section>
            <div class="flex mt-8">
                <div class="w-9/12 mr-8">
                    <div class="flex items-center bg-gray-50 px-5 py-1">

                        <form id="form-sort" action="{{ route('course.sort') }}" method="POST" class="z-10">
                            @csrf
                            <div class="ml-2 z-10" x-data="window.customSelect({ open: true, value: 4, selected: 4 })" x-init="init()">
                                <input x-ref="input" type="hidden" name="sort_type" id="sort_type">
                                <div class="relative">
                                    <span class="inline-block w-full rounded-md shadow-sm">
                                        <button x-ref="button" @click="onButtonClick()" type="button"
                                            aria-haspopup="listbox" :aria-expanded="open"
                                            aria-labelledby="assigned-to-label"
                                            class="cursor-default relative w-24 rounded-md border border-gray-300 bg-white pl-3 pr-8 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                            <div class="flex items-center space-x-3">
                                                @php
                                                    $sorts_str = $sortTypes->map(function ($sort) {
                                                        return $sort->name;
                                                    });
                                                @endphp

                                                <span x-text='{{ $sorts_str }}[value]' class="block truncate">Secs</span>
                                            </div>
                                            <span
                                                class="absolute inset-y-0 top-0 bottom-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                                </svg></span>
                                        </button>
                                    </span>
                                    <div x-show="open" @focusout="onEscape()" @click.away="open = false"
                                        x-description="Select popover, show/hide based on select state."
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="absolute mt-1 rounded-md bg-white shadow-lg" style="display: none;">
                                        <ul @keydown.enter.stop.prevent="onOptionSelect()"
                                            @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()"
                                            @keydown.arrow-up.prevent="onArrowUp()"
                                            @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1"
                                            role="listbox" aria-labelledby="assigned-to-label"
                                            :aria-activedescendant="activeDescendant"
                                            class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                                            @php
                                                $i = -1;
                                            @endphp
                                            @foreach ($sortTypes as $key => $category)
                                                @php
                                                    $i++;
                                                    $id = $category->id;
                                                @endphp
                                                <li id="assigned-to-option-{{ $id }}" role="option"
                                                    @click="choose({{ $i }}, {{ $id }})"
                                                    @mouseenter="selected = {{ $id }}"
                                                    @mouseleave="selected = null"
                                                    :class="{
                                                        'text-white bg-indigo-600': selected ===
                                                            {{ $id }},
                                                        'text-gray-900': !(selected ===
                                                            {{ $id }})
                                                    }"
                                                    class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                                    <div class="flex items-center space-x-3">
                                                        <span
                                                            :class="{
                                                                'font-semibold': value ===
                                                                    {{ $id }},
                                                                'font-normal': !(value ===
                                                                    {{ $id }})
                                                            }"
                                                            class="font-normal block truncate">
                                                            {{ $category->name }}
                                                        </span>
                                                    </div>
                                                    <span x-show="value === {{ $id }}"
                                                        :class="{
                                                            'text-white': selected ===
                                                                {{ $id }},
                                                            'text-indigo-600': !(selected ===
                                                                {{ $id }})
                                                        }"
                                                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                                        style="display: none;">
                                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <button type="button" class="p-2 -m-2 ml-5 sm:ml-7 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">View grid</span>
                            <svg class="w-5 h-5" aria-hidden="true" x-description="Heroicon name: solid/view-grid"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                        </button>
                        <button type="button" class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden"
                            @click="open = true">
                            <span class="sr-only">Filters</span>
                            <svg class="w-5 h-5" aria-hidden="true" x-description="Heroicon name: solid/filter"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <form id="form-search" action="{{ route('course.search') }}" class="ml-auto w-5/12"
                            method="post">
                            @csrf
                            @method('POST')
                            <input id="search" name="keyword" placeholder="Search for courses"
                                class="string ml-auto required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                type="text" />
                        </form>
                    </div>

                    <div id="courses-container">
                        @include('_courses', $courses)
                    </div>

                </div>
                <div class="w-3/12 ml-2">
                    <form id="form-filter" action="{{ route('course.filter') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="border py-4">
                            <div class="pl-6">
                                <div class="">
                                    <h3 class="font-bold text-gray-800">Course categories</h3>
                                    <div class="mt-2">
                                        @foreach ($categories as $category)
                                            <div>
                                                <label class="inline-flex items-center mt-1">
                                                    <input type="checkbox" name="categories[]"
                                                        value="{{ $category->id }}"
                                                        {{ Request::input('cats') != null && in_array($category->id, Request::input('cats')) ? 'checked' : '' }}
                                                        class="form-checkbox h-4 w-4 text-gray-600 block">
                                                    <span class="ml-2 text-sm text-gray-700">{{ $category->name }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h3 class="font-bold text-gray-800">Author</h3>
                                    <div class="mt-2">
                                        @foreach ($authors as $author)
                                            <div>
                                                <label class="inline-flex items-center mt-1">
                                                    <input type="checkbox" name="authors[]" value="{{ $author->id }}"
                                                        {{ Request::input('authors') != null && in_array($author->id, Request::input('authors')) ? 'checked' : '' }}
                                                        class="form-checkbox h-4 w-4 text-gray-600 block">
                                                    <span
                                                        class="ml-2 text-sm text-gray-700 capitalize">{{ $author->username }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h3 class="font-bold text-gray-800">Price</h3>
                                    <div class="mt-2">
                                        <div>
                                            <label class="inline-flex items-center mt-1">
                                                <input type="checkbox" class="form-checkbox h-4 w-4 text-gray-600 block">
                                                <span class="ml-2 text-sm text-gray-700">All</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="inline-flex items-center mt-1">
                                                <input type="checkbox" class="form-checkbox h-4 w-4 text-gray-600 block">
                                                <span class="ml-2 text-sm text-gray-700">Free</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="inline-flex items-center mt-1">
                                                <input type="checkbox" class="form-checkbox h-4 w-4 text-gray-600 block">
                                                <span class="ml-2 text-sm text-gray-700">Paid</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3 sm:px-6 text-center w-full">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-8 w-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-4">
                        <h1 class="text-xl font-bold text-gray-800">Course categories</h1>
                        <div class="mt-2">
                            @foreach ($categories as $category)
                                <div class="mt-1">
                                    <span class="ml-2 text-sm text-gray-700">{{ $category->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-xl font-bold text-gray-800">Latest courses</h1>
                        <div class="mt-2">
                            @foreach ($latestCourses as $course)
                                <div class="mb-8 flex h-20">
                                    <div class="w-4/12 flex-shrink-0">
                                        <img class="object-cover h-full mt-1"
                                            src="{{ asset('storage/course/' . ($course->feature_img ?? 'default.png')) }}"
                                            alt="Course image">
                                    </div>
                                    <div class="ml-2">
                                        <h1 class="text-sm font-bold text-gray-800">{{ $course->name }}</h1>
                                        <p class="text-indigo-500 text-sm mt-2 font-black">
                                            {{ isset($course->coursePrice->price) ? "$" . $course->coursePrice->price : 'Free' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </section>
    </div>


@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $("#form-filter").submit(function(event) {
                event.preventDefault();
                let formData = new FormData($(this)[0]);
                let authors = formData.getAll('authors[]');
                let cats = formData.getAll('categories[]');
                const url = new URL("http://127.0.0.1:8000/courses");
                for (const cat of cats) {
                    url.searchParams.append("cats[]", cat)
                }
                for (const author of authors) {
                    url.searchParams.append("authors[]", author)
                }
                url.searchParams.append("strict", true)
                window.history.pushState(null, "", url.href);
                $.ajax({
                    type: "POST",
                    url: "{!! route('course.filter') !!}",
                    data: $("#form-filter").serialize(),
                    success: function(response) {
                        $("#courses-container").html(response)
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });
        })

        $(document).ready(function() {
            $("#form-search").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{!! route('course.search') !!}",
                    data: $("#form-search").serialize(),
                    success: function(response) {
                        $("#courses-container").html(response)
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });
        })


        $(document).ready(function() {
            $("#form-sort").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "{!! route('course.sort') !!}",
                    data: $("#form-sort").serialize(),
                    success: function(response) {
                        $("#courses-container").html(response)
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });
        })
    </script>

    <script>
        window.customSelect = function(options) {
            return {
                init() {
                    this.value = 0;
                    this.open = false;

                    this.$refs.listbox.focus()
                    this.optionCount = this.$refs.listbox.children.length
                    this.$watch('selected', value => {
                        if (!this.open) return

                        if (this.selected === null) {
                            this.activeDescendant = ''
                            return
                        }

                        this.activeDescendant = this.$refs.listbox.children[this.selected].id
                    })
                },
                activeDescendant: null,
                optionCount: null,
                open: false,
                selected: 0,
                value: 0,
                choose(index, value) {
                    this.value = index
                    this.open = false
                    this.$refs.input.value = value;
                    $("#form-sort").submit();
                },
                onButtonClick() {
                    if (this.open) return
                    this.selected = this.value
                    this.open = true
                    this.$nextTick(() => {
                        this.$refs.listbox.focus()
                        this.$refs.listbox.children[this.selected].scrollIntoView({
                            block: 'nearest'
                        })
                    })
                },
                onOptionSelect() {
                    if (this.selected !== null) {
                        this.value = this.selected
                    }
                    this.open = false
                    this.$refs.button.focus()
                },
                onEscape() {
                    this.open = false
                    this.$refs.button.focus()
                },
                onArrowUp() {
                    this.selected = this.selected - 1 < 1 ? this.optionCount : this.selected - 1
                    this.$refs.listbox.children[this.selected].scrollIntoView({
                        block: 'nearest'
                    })
                },
                onArrowDown() {
                    this.selected = this.selected + 1 > this.optionCount ? 1 : this.selected + 1
                    this.$refs.listbox.children[this.selected].scrollIntoView({
                        block: 'nearest'
                    })
                },
                ...options,
            }
        }
    </script>
@endpush
