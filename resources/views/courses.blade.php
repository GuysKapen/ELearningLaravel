@extends('layouts.frontend.app')

@section('title','Course')

@push('css')
@endpush

@section('content')

    <div class="w-10/12 mx-auto mt-8">
        <section>
            <nav
                class="flex py-3 px-5 text-gray-700 rounded-lg shadow-sm border-gray-200 dark:bg-gray-800 dark:border-gray-700"
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
                            <span
                                class="ml-1 text-sm font-medium text-gray-400 md:ml-2 dark:text-gray-500">All courses</span>
                        </div>
                    </li>
                </ol>
            </nav>

        </section>

        <section>
            <div class="flex mt-8">
                <div class="w-9/12 mr-2">
                    <div class="flex items-center bg-gray-50 px-5 py-1">
                        <div x-data="Components.menu({ open: false })" x-init="init()"
                             @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)"
                             class="relative inline-block text-left">
                            <div>
                                <button type="button"
                                        class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                        id="menu-button" x-ref="button" @click="onButtonClick()"
                                        @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                                        aria-expanded="false" aria-haspopup="true"
                                        x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()"
                                        @keydown.arrow-down.prevent="onArrowDown()">
                                    Sort
                                    <svg
                                        class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                        x-description="Heroicon name: solid/chevron-down"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>


                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                                 x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical"
                                 aria-labelledby="menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
                                 @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                                 @keydown.enter.prevent="open = false; focusButton()"
                                 @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                                <div class="py-1" role="none">

                                    <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm"
                                       x-state:on="Active" x-state:off="Not Active" x-state:on:option.current="Selected"
                                       x-state:off:option.current="Not Selected"
                                       x-state-description="Selected: &quot;font-medium text-gray-900&quot;, Not Selected: &quot;text-gray-500&quot;"
                                       :class="{ 'bg-gray-100': activeIndex === 0 }" role="menuitem" tabindex="-1"
                                       id="menu-item-0" @mouseenter="activeIndex = 0" @mouseleave="activeIndex = -1"
                                       @click="open = false; focusButton()">
                                        Most Popular
                                    </a>

                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm"
                                       x-state-description="undefined: &quot;font-medium text-gray-900&quot;, undefined: &quot;text-gray-500&quot;"
                                       :class="{ 'bg-gray-100': activeIndex === 1 }" role="menuitem" tabindex="-1"
                                       id="menu-item-1" @mouseenter="activeIndex = 1" @mouseleave="activeIndex = -1"
                                       @click="open = false; focusButton()">
                                        Best Rating
                                    </a>

                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm"
                                       x-state-description="undefined: &quot;font-medium text-gray-900&quot;, undefined: &quot;text-gray-500&quot;"
                                       :class="{ 'bg-gray-100': activeIndex === 2 }" role="menuitem" tabindex="-1"
                                       id="menu-item-2" @mouseenter="activeIndex = 2" @mouseleave="activeIndex = -1"
                                       @click="open = false; focusButton()">
                                        Newest
                                    </a>

                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm"
                                       x-state-description="undefined: &quot;font-medium text-gray-900&quot;, undefined: &quot;text-gray-500&quot;"
                                       :class="{ 'bg-gray-100': activeIndex === 3 }" role="menuitem" tabindex="-1"
                                       id="menu-item-3" @mouseenter="activeIndex = 3" @mouseleave="activeIndex = -1"
                                       @click="open = false; focusButton()">
                                        Price: Low to High
                                    </a>

                                    <a href="#" class="text-gray-500 block px-4 py-2 text-sm"
                                       x-state-description="undefined: &quot;font-medium text-gray-900&quot;, undefined: &quot;text-gray-500&quot;"
                                       :class="{ 'bg-gray-100': activeIndex === 4 }" role="menuitem" tabindex="-1"
                                       id="menu-item-4" @mouseenter="activeIndex = 4" @mouseleave="activeIndex = -1"
                                       @click="open = false; focusButton()">
                                        Price: High to Low
                                    </a>

                                </div>
                            </div>

                        </div>

                        <button type="button" class="p-2 -m-2 ml-5 sm:ml-7 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">View grid</span>
                            <svg class="w-5 h-5" aria-hidden="true" x-description="Heroicon name: solid/view-grid"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
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
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-8">
                        @foreach($courses as $key=>$course)
                            <div class="relative overflow-hidden self-start top-0 relative border">
                                <figure class="m-0">
                                    <img
                                        src="{{ asset("storage/course/". ($course->feature_img ?? "default.png") ) }}"
                                        alt="Image" class="w-full h-48 object-cover block">
                                </figure>
                                <div
                                    class="absolute left-1/2 bg-white rounded-full p-1 -translate-x-1/2 -translate-y-1/2">
                                    <span
                                        class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                                                <img
                                                    src="{{ asset("storage/profile/". (Auth::user()->authorDetail->cover ?? "default.png") ) }}"
                                                    alt="cover" class="object-cover h-full w-full">
                                            </span>
                                </div>
                                <div class="relative pt-8 px-8 course">
                                    <div class="mb-4 block text-sm text-center"><span
                                            class="far fa-clock mr-3 capitalize">{{$course->user->username}}</span>
                                    </div>
                                    <p class="text-gray-800 font-bold text-base text-center">{{$course->name}}</p>
                                </div>
                                <div class="flex border-t text-sm mt-8">
                                    <div class="py-4 px-4"><span
                                            class="fa fa-users"></span> {{$course->detail->student_enrolled ?? 0}}</div>
                                    <div class="py-4"><span class="fa fa-comment"></span> 2</div>
                                    <div
                                        class="py-4 px-4 ml-auto text-indigo-500 font-black">{{isset($course->coursePrice->price) ? "$" . $course->coursePrice->price : "Free"}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-3/12 ml-2">
                    <div class="border pl-6 py-4">
                        <div class="">
                            <h3 class="font-bold text-gray-800">Course categories</h3>
                            <div class="mt-2">
                                @foreach($categories as $category)
                                    <div>
                                        <label class="inline-flex items-center mt-1">
                                            <input type="checkbox" class="form-checkbox h-4 w-4 text-gray-600 block">
                                            <span class="ml-2 text-sm text-gray-700">{{$category->name}}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-bold text-gray-800">Author</h3>
                            <div class="mt-2">
                                @foreach($authors as $author)
                                    <div>
                                        <label class="inline-flex items-center mt-1">
                                            <input type="checkbox" class="form-checkbox h-4 w-4 text-gray-600 block">
                                            <span
                                                class="ml-2 text-sm text-gray-700 capitalize">{{$author->username}}</span>
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
                </div>
            </div>
        </section>
    </div>


@endsection

@push('js')

@endpush
