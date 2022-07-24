<nav class="bg-white">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.

                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!--
                      Icon when menu is open.

                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <div class="relative font-black text-xl w-1/4 mr-auto"><a href="{{route("home")}}" class="text-gray-800">ILearning</a></div>
                </div>
                <div class="hidden sm:block sm:ml-6 mx-auto flex-grow">
                    <div class="block space-x-4 w-max mx-auto">
                        <a href="{{route("home")}}"
                           class="inline-block py-4 px-4 text-sm font-medium text-center rounded-t-lg border-b-2 {{Request::is("home") ? "text-blue-600 border-blue-600" : "text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"}}"
                           aria-current="page">Home</a>

                        <a href="{{route('courses')}}"
                           class="inline-block py-4 px-4 text-sm font-medium text-center rounded-t-lg border-b-2 {{Request::is("courses") ? "text-blue-600 border-blue-600" : "text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"}}">Courses</a>

                        <a href="{{route('author.dashboard')}}"
                           class="inline-block py-4 px-4 text-sm font-medium text-center rounded-t-lg border-b-2 {{Request::is("author/*") ? "text-blue-600 border-blue-600" : "text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"}}">Author</a>

                        <a href="{{route('admin.course.index')}}"
                           class="inline-block py-4 px-4 text-sm font-medium text-center rounded-t-lg border-b-2 {{Request::is("admin/*") ? "text-blue-600 border-blue-600" : "text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"}}">Admin</a>
                    </div>
                </div>

            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                <button type="button" class="p-1 text-gray-400 hover:text-indigo-500">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>

                <!-- Profile dropdown -->
                <div class="ml-3 relative">

                    <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->

                    <div id="dropdown"
                         class="origin-top-right opacity-0 scale-0 transition-all duration-200 absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                         role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <a href="{{route('student.dashboard')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                               id="menu-item-0">Account settings</a>
                            <a href="{{route('student.dashboard')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                               id="menu-item-1">Dashboard</a>
                            <form method="POST" action="{{route('logout')}}" role="none">
                                @csrf
                                <button type="submit" class="text-gray-700 block w-full text-left px-4 py-2 text-sm"
                                        role="menuitem" tabindex="-1" id="menu-item-3">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>

                    <div id="dropdown-container" class="relative inline-block text-left active">
                        <div class="" :class="{'active': open}" @click="open = !open" @click.away="open = false"
                             x-data="{ open: false }">


                            <div class="hidden sm:block ml-auto">
                                <div class="flex">
                                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                    @guest
                                        @if (Route::has('login'))
                                            <a class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                                               href="{{ route('login') }}">{{ __('Login') }}</a>
                                        @endif

                                        @if (Route::has('register'))
                                            <a class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                                               href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                    @else
                                        <button type="button"
                                                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-600 focus:ring-white"
                                                id="menu-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open user menu</span>
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                 src="{{ asset("storage/profile/". (Auth::user()->authorDetail->cover ?? "default.png") ) }}"
                                                 alt="">
                                        </button>
                                    @endguest

                                </div>
                            </div>


                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div id="dropdown"
                             class="origin-top-right opacity-0 scale-0 transition-all duration-200 absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                <a href="{{route('student.dashboard')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                   tabindex="-1" id="menu-item-0">Account settings</a>
                                <a href="{{route('student.dashboard')}}" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                   tabindex="-1" id="menu-item-1">Dashboard</a>
                                <form method="POST" action="{{route('logout')}}" role="none">
                                    @csrf
                                    <button type="submit"
                                            class="text-gray-700 block w-full text-left px-4 py-2 text-sm"
                                            role="menuitem" tabindex="-1" id="menu-item-3">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#"
               class="text-white block px-3 py-2 rounded-md text-base font-medium border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500"
               aria-current="page">Dashboard</a>

            <a href="#"
               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

            <a href="#"
               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

            <a href="#"
               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
        </div>
    </div>
</nav>
