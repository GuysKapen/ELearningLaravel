<!DOCTYPE html>
<html lang="en">

<head>
    <title>ILearning</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .owl-carousel .item {
            height: 10rem;
            background: #4DC7A0;
            padding: 1rem;
        }

        .owl-carousel .item h4 {
            color: #FFF;
            font-weight: 400;
            margin-top: 0rem;
        }
    </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div>
        <div class="site-wrap">

            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>


            <header class="z-10 absolute js-sticky-header py-4 w-full site-navbar transition duration-200"
                role="banner">

                <div class="w-full xl:px-24 md:px-8 px-4">
                    <div class="flex items-center">
                        <div class="relative font-black text-xl w-1/4 mr-auto"><a href="index.php"
                                class="text-white">ILearning</a>
                        </div>

                        <div class="mx-auto text-center lg:block hidden">
                            <nav class="block position-relative text-right" role="navigation">
                                <ul class="lg:block p-0 m-0 mx-auto">
                                    <li class="inline-block"><a href="#home-section"
                                            class="hover:text-indigo-600 text-white inline-block px-6 py-3 {{ Request::is('home') ? 'text-indigo-400' : '' }}">Home</a>
                                    </li>
                                    <li class="inline-block"><a href="{{ route('courses') }}"
                                            class="hover:text-indigo-600 text-white inline-block px-6 py-3">Courses</a>
                                    </li>
                                    <li class="inline-block"><a href="#programs-section"
                                            class="hover:text-indigo-600 text-white inline-block px-6 py-3">Programs</a>
                                    </li>
                                    <li class="inline-block"><a href="#teachers-section"
                                            class="hover:text-indigo-600 text-white inline-block px-6 py-3">Teachers</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="ml-auto w-1/4">
                            <nav class="relative text-right" role="navigation">
                                <ul class="mr-auto hidden lg:block m-0 p-0">
                                    <li class="inline-block"><a href="{{ route('register') }}"
                                            class="px-6 py-2 inline-block    nav-link">
                                            <span
                                                class="text-white bg-indigo-500 border border-indigo-500 px-6 py-3 rounded-full text-xxs font-black uppercase transition-all">Get
                                                Started</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <a href="#"
                                class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span
                                    class="icon-menu h3"></span></a>
                        </div>
                    </div>
                </div>

            </header>
            <div class="h-full h-screen relative" id="home-section">

                <div class="slide-1"
                    style="background-image: url('images/hero_1.jpg'); background-position: 50% -25px; background-size: cover; height: 100vh"
                    data-stellar-background-ratio="0.5">
                    <div class="flex items-center h-full">
                        <div class="w-full z-10 flex flex-col-reverse lg:flex-row items-center lg:px-24 md:px-8 px-4 space-x-16">
                            <div class="lg:w-1/2 w-full">
                                <h1 class="text-6xl text-white font-black hidden lg:block hidden">Online learning you can access anywhere
                                    easily</h1>
                                <p class="text-gray-100 text-sm my-8">a Solution for easy and flexible online learning,
                                    you
                                    can study anywhere through this platform</p>
                                <div class="flex flex-col md:flex-row md:space-x-8">
                                    <a href="{{ route('register') }}" class="py-2 inline-block nav-link flex-grow">
                                        <span
                                            class="w-full block text-white bg-indigo-600 hover:bg-indigo-900 text-center px-8 py-3 rounded-full text-xxs font-black transition-all">Get
                                            Started</span>
                                    </a>
                                    <a href="{{ route('login') }}" class="py-2 inline-block nav-link flex-grow">
                                        <span
                                            class="w-full block text-white bg-indigo-600 hover:bg-indigo-900 text-center px-8 py-3 rounded-full text-xxs font-black transition-all">Sign
                                            In</span>
                                    </a>
                                </div>
                            </div>
                            <div class="text-right lg:w-1/2 w-full">
                                <img src="{{ asset('images/undraw_youtube_tutorial.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute top-0 bottom-0 left-0 right-0 bg-gray-800/[0.9] bg"></div>
            </div>
        </div>
    </div>


    <div class="py-16 relative" id="courses-section">
        <div class="w-11/12 mx-auto">
            <div class="flex mb-8 justify-center">
                <div class="lg:w-7/12 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Courses</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="relative" data-aos="fade-up" data-aos-delay="100">
        <div class="w-11/12 mx-auto">
            <div class="flex">

                <div class="w-full flex flex-auto flex-wrap z-10 relative owl-carousel nonloop-block-14">

                    @foreach ($courses as $key => $course)
                        <div class="relative overflow-hidden self-start top-0 border">
                            <figure class="m-0">
                                <img src="{{ asset('storage/course/' . ($course->feature_img ?? 'default.png')) }}"
                                    alt="Image" class="w-full block object-cover">
                            </figure>
                            <div class="relative pt-12 px-8 course">
                                <span class="course-price">${{ $course->coursePrice->price ?? 0 }}</span>
                                <div class="mb-4 block text-sm"><span
                                        class="far fa-clock mr-3"></span>{{ $course->lessons()->count() ?? 0 }}
                                    Lessons
                                    / {{ $course->detail->duration_info ?? '' }}</div>
                                <h3 class="text-indigo-600 text-base">
                                    @foreach ($course->categories as $key => $category)
                                        <a href="#">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </h3>
                                <a href="{{ route('course', [$course->id]) }}">
                                    <p class="hover:text-indigo-500 text-md">{{ $course->name }}</p>
                                </a>
                            </div>
                            <div class="flex border-t text-sm mt-8">
                                <div class="py-4 px-8"><span class="fa fa-users"></span>
                                    {{ $course->detail->student_enrolled ?? 0 }} students
                                </div>
                                <div class="py-4 px-6 w-1/4 ml-auto border-l"><span class="fa fa-comment"></span> 2
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
            <div class="flex justify-center mt-8">
                <div class="w-7/12 text-center">
                    <button
                        class="custom-pre-button hover:bg-indigo-600 px-8 py-4 bg-indigo-500 text-sm text-white font-black rounded-md btn m-2">
                        Prev
                    </button>
                    <button
                        class="custom-next-button hover:bg-indigo-600 px-8 py-4 bg-indigo-500 text-sm text-white font-black rounded-md btn m-2">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Our program --}}
    <div id="programs-section" class="py-16 relative">
        <div class="w-11/12 mx-auto">
            <div class="flex justify-center">
                <div class="lg:w-7/12 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Our Programs</h2>
                    <p class="text-center mb-4">We aim to make studying SIMPLE, EASY and ACCESSIBLE to EVERYONE thus we
                        collected the BEST COURSES in
                        the world in one place.</p>
                </div>
            </div>
            <div class="flex lg:flex-row flex-col mb-8 items-center">
                <div class="lg:w-7/12 mb-8" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('images/undraw_youtube_tutorial.svg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="lg:w-4/12 lg:ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4 text-3xl font-medium">We Are Excellent In Education</h2>
                    <p class="mb-4">Education is an art and we are the artists.</p>

                    <div class="flex items-center mb-6">
                        <span class="icon-wrap mr-3"><span class="icon fa fa-graduation-cap"></span></span>
                        <div>
                            <h3 class="m-0 text-base text-indigo-600">2,931 Yearly Graduates</h3>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <span class="icon-wrap mr-3"><span class="icon fa fa-university"></span></span>
                        <div>
                            <h3 class="m-0 text-base text-indigo-600">50 Universities Worldwide</h3>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex lg:flex-row flex-col mb-8 items-center">
                <div class="lg:w-7/12 mb-8 order-1 lg:order-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('images/undraw_teaching.svg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="lg:w-4/12 lg:mr-auto order-2 lg:order-1" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4 text-3xl font-medium">Strive for Excellent</h2>
                    <p class="mb-4">Our goal is your success.</p>

                    <div class="flex items-center mb-6">
                        <span class="icon-wrap mr-3"><span class="icon fa fa-graduation-cap"></span></span>
                        <div>
                            <h3 class="m-0 text-base text-indigo-600">2,931 Yearly Graduates</h3>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <span class="icon-wrap mr-3"><span class="icon fa fa-university"></span></span>
                        <div>
                            <h3 class="m-0 text-base text-indigo-600">50 Universities Worldwide</h3>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex lg:flex-row flex-col mb-8 items-center">
                <div class="lg:w-7/12 mb-8" data-aos="fade-up" data-aos-delay="100">
                    <img src={{ asset('images/undraw_teacher.svg') }} class="img-fluid" alt="Image">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4 text-3xl font-medium">Education is life</h2>
                    <p class="mb-4">Beginning of a never ending journey of learning.</p>

                    <div class="flex items-center mb-6">
                        <span class="icon-wrap mr-3"><span class="icon fa fa-graduation-cap"></span></span>
                        <div>
                            <h3 class="m-0 text-base text-indigo-600">2,931 Yearly Graduates</h3>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <span class="icon-wrap mr-3"><span class="icon fa fa-university"></span></span>
                        <div>
                            <h3 class="m-0 text-base text-indigo-600">50 Universities Worldwide</h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    {{-- !  Our program  ! --}}

    <div class="py-16 relative" id="teachers-section">
        <div class="w-11/12 mx-auto">

            <div class="flex justify-center">
                <div class="lg:w-7/12 text-center mb-8" data-aos="fade-up" data-aos-delay="">
                    <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Our Teachers</h2>
                    <p class="mb-8">The best we promise the best we are !</p>
                </div>
            </div>

            <div class="flex lg:flex-row flex-col">

                <div class="md:w-6/12 lg:w-4/12 mb-8 px-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="border p-8">
                        <img src="{{ asset('images/person_1.jpg') }}" alt="Image"
                            class="rounded-full w-32 mx-auto mb-4">
                        <div class="py-2 text-center">
                            <h3 class="text-black mb-2 font-medium">Aouini Oussama</h3>
                            <p class="relative mb-4">WEB Teacher</p>
                            <p>Made over 100 websites with years of experience, taught over 500 students.</p>
                        </div>
                    </div>
                </div>

                <div class="md:w-6/12 lg:w-4/12 mb-8 px-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="border p-8 text-center">
                        <img src="{{ asset('images/person_2.jpg') }}" alt="Image"
                            class="rounded-full w-32 mx-auto mb-4">
                        <div class="py-2">
                            <h3 class="text-black mb-2 font-medium">Abidi Nidhal</h3>
                            <p class="relative mb-4">AI Teacher</p>
                            <p>Over 20 years of experience Worked at NASA and done so many projects .</p>
                        </div>
                    </div>
                </div>

                <div class="md:w-6/12 lg:w-4/12 mb-8 px-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="border p-8 text-center">
                        <img src="{{ asset('images/person_3.jpg') }}" alt="Image"
                            class="rounded-full w-32 mx-auto">
                        <div class="py-2">
                            <h3 class="text-black mb-2 font-medium">Zemmali Mohamed</h3>
                            <p class="relative mb-4">IOT Teacher</p>
                            <p>Leading expert in the domain of IOT, taught many students over the years.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Instructor --}}
    <div class="py-16 relative bg-gray-100">

        <div class="w-11/12 mx-auto">
            <div class="flex mb-8 justify-center" data-aos="fade-up" data-aos-delay="">
                <div class="lg:w-7/12 text-center">
                    <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Join With Us</h2>
                </div>
            </div>
            <div class="flex lg:flex-row flex-col items-center space-x-8 lg:px-24">
                <div class="lg:w-6/12 w-full align-end pl-8" data-aos="fade-left" data-aos-delay="200">
                    <img src="images/person_transparent.png" alt="Image" class="img-fluid">
                </div>
                <div class="lg:w-4/12 mt-8 xl:mt-0 w-full">
                    <h3 class="text-2xl font-black text-indigo-600">Easy to join with us</h3>
                    <h2 class="text-4xl font-black mt-4 text-gray-800">Let's become an instructor</h2>
                    <p class="my-8 text-gray-400 text-sm">
                        Instructors around the world tech millions of students.
                        We provide the tools and technology to help you tech what you love
                    </p>
                    <a href="{{ route('register') }}" class="mt-4 py-2 inline-block nav-link"> <span
                            class="text-white hover:bg-indigo-900 px-8 py-3 rounded-full text-xxs font-black transition-all bg-indigo-600">Start
                            teaching</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- !   Instructor --}}

    {{-- Why choose us --}}
    <div class="py-16 relative pb-0">

        <div class="overflow-hidden flex absolute w-full h-full -z-10 top-0 pointer-events-none">
            <div class="absolute bottom-8 -left-32">
                <img src="{{ asset('images/blob_2.svg') }}" alt="Image">
            </div>
            <div class="absolute top-8 -right-32">
                <img src="{{ asset('images/blob_1.svg') }}" alt="Image">
            </div>
        </div>
        <div class="w-11/12 mx-auto">
            <div class="flex mb-8 justify-center" data-aos="fade-up" data-aos-delay="">
                <div class="lg:w-7/12 text-center">
                    <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Why Choose Us</h2>
                </div>
            </div>
            <div class="flex lg:flex-row flex-col">
                <div class="lg:w-4/12 ml-auto align-start" data-aos="fade-up" data-aos-delay="100">

                    <div class="p-8 rounded bg-white shadow-full">

                        <div class="flex items-center mb-4">
                            <span class="mr-3 icon-wrap-big"><span class="icon fa fa-graduation-cap"></span></span>
                            <div>
                                <h3 class="m-0 text-base text-gray-800 font-medium">2,931 Yearly Graduates</h3>
                            </div>
                        </div>

                        <div class="flex items-center mb-4">
                            <div class="mr-3 icon-wrap-big"><span class="icon fa fa-university"></span></div>
                            <div>
                                <h3 class="m-0 text-base text-gray-800 font-medium">50 Universities Worldwide</h3>
                            </div>
                        </div>

                        <div class="flex items-center mb-4">
                            <div class="mr-3 icon-wrap-big">
                                <<span class="icon fa fa-graduation-cap"></span>
                            </div>
                            <div>
                                <h3 class="m-0 text-base text-gray-800 font-medium">Top Professionals in The World</h3>
                            </div>
                        </div>

                        <div class="flex items-center mb-4">
                            <div class="mr-3 icon-wrap-big"><span class="icon fa fa-university"></span></div>
                            <div>
                                <h3 class="m-0 text-base text-gray-800 font-medium">Expand Your Knowledge</h3>
                            </div>
                        </div>

                        <div class="flex items-center mb-4">
                            <div class="mr-3 icon-wrap-big"><span class="icon fa fa-graduation-cap"></span></div>
                            <div>
                                <h3 class="m-0 text-base text-gray-800 font-medium">Best Online Teaching Assistant
                                    Courses</h3>
                            </div>
                        </div>

                        <div class="flex items-center mb-4">
                            <div class="mr-3 icon-wrap-big"><span class="icon fa fa-university"></span></div>
                            <div>
                                <h3 class="m-0 text-base text-gray-800 font-medium">Best Teachers</h3>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="lg:w-7/12 align-end pl-8" data-aos="fade-left" data-aos-delay="200">
                    <img src="images/person_transparent.png" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    {{-- !    Why choose us   ! --}}

    {{-- People say --}}
    <div class="py-16 relative bg-gray-100">

        <div class="w-11/12 mx-auto">
            <div class="flex mb-8 justify-center" data-aos="fade-up" data-aos-delay="">
                <div class="lg:w-7/12 text-center">
                    <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">People Say About Us</h2>
                </div>
            </div>
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
                <div class="ml-auto align-start" data-aos="fade-up" data-aos-delay="100">

                    <div class="bg-white rounded-lg p-4">
                        <span class="material-icons text-4xl text-indigo-600">format_quote</span>
                        <p class="text-sm my-2 text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, animi aperiam
                            assumenda
                            temporibus unde vitae, voluptates?
                        </p>
                        <div class="flex mt-6 items-center">
                            <img class="object-cover rounded-full w-6 h-6 sm:w-8 sm:h-8"
                                src="{{ asset('storage/profile/' . (Auth::user()->authorDetail->cover ?? '')) }}"
                                alt="Profile">
                            <h3 class="font-bold text-base text-black ml-2">
                                Annette Black
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="ml-auto align-start" data-aos="fade-up" data-aos-delay="100">

                    <div class="bg-white rounded-lg p-4">
                        <span class="material-icons text-4xl text-indigo-600">format_quote</span>
                        <p class="text-sm my-2 text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, animi aperiam
                            assumenda
                            temporibus unde vitae, voluptates?
                        </p>
                        <div class="flex mt-6 items-center">
                            <img class="object-cover rounded-full w-6 h-6 sm:w-8 sm:h-8"
                                src="{{ asset('storage/profile/' . (Auth::user()->authorDetail->cover ?? '')) }}"
                                alt="Profile">
                            <h3 class="font-bold text-base text-black ml-2">
                                Annette Black
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="ml-auto align-start" data-aos="fade-up" data-aos-delay="100">

                    <div class="bg-white rounded-lg p-4">
                        <span class="material-icons text-4xl text-indigo-600">format_quote</span>
                        <p class="text-sm my-2 text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, animi aperiam
                            assumenda
                            temporibus unde vitae, voluptates?
                        </p>
                        <div class="flex mt-6 items-center">
                            <img class="object-cover rounded-full w-6 h-6 sm:w-8 sm:h-8"
                                src="{{ asset('storage/profile/' . (Auth::user()->authorDetail->cover ?? '')) }}"
                                alt="Profile">
                            <h3 class="font-bold text-base text-black ml-2">
                                Annette Black
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="ml-auto align-start" data-aos="fade-up" data-aos-delay="100">

                    <div class="bg-white rounded-lg p-4">
                        <span class="material-icons text-4xl text-indigo-600">format_quote</span>
                        <p class="text-sm my-2 text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, animi aperiam
                            assumenda
                            temporibus unde vitae, voluptates?
                        </p>
                        <div class="flex mt-6 items-center">
                            <img class="object-cover rounded-full w-6 h-6 sm:w-8 sm:h-8"
                                src="{{ asset('storage/profile/' . (Auth::user()->authorDetail->cover ?? '')) }}"
                                alt="Profile">
                            <h3 class="font-bold text-base text-black ml-2">
                                Annette Black
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="ml-auto align-start" data-aos="fade-up" data-aos-delay="100">

                    <div class="bg-white rounded-lg p-4">
                        <span class="material-icons text-4xl text-indigo-600">format_quote</span>
                        <p class="text-sm my-2 text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, animi aperiam
                            assumenda
                            temporibus unde vitae, voluptates?
                        </p>
                        <div class="flex mt-6 items-center">
                            <img class="object-cover rounded-full w-6 h-6 sm:w-8 sm:h-8"
                                src="{{ asset('storage/profile/' . (Auth::user()->authorDetail->cover ?? '')) }}"
                                alt="Profile">
                            <h3 class="font-bold text-base text-black ml-2">
                                Annette Black
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="ml-auto align-start" data-aos="fade-up" data-aos-delay="100">

                    <div class="bg-white rounded-lg p-4">
                        <span class="material-icons text-4xl text-indigo-600">format_quote</span>
                        <p class="text-sm my-2 text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, animi aperiam
                            assumenda
                            temporibus unde vitae, voluptates?
                        </p>
                        <div class="flex mt-6 items-center">
                            <img class="object-cover rounded-full w-6 h-6 sm:w-8 sm:h-8"
                                src="{{ asset('storage/profile/' . (Auth::user()->authorDetail->cover ?? '')) }}"
                                alt="Profile">
                            <h3 class="font-bold text-base text-black ml-2">
                                Annette Black
                            </h3>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {{-- !   People say --}}

    {{-- Message Us --}}
    <div class="py-16 relative bg-gray-50" id="contact-section">
        <div class="w-11/12 mx-auto">

            <div class="flex justify-center px-8">
                <div class="md:w-7/12 col-md-7">

                    <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8 section-title">Message
                        Us</h2>
                    <p class="mb-8">We are more than happy to receive your suggestions.</p>
                    <!-- Beginning of the php for the contact form -->
                    <?php
                    // Message Vars
                    $msg = '';
                    $msgClass = '';

                    // Check For Submit
                    if (filter_has_var(INPUT_POST, 'submit')) {
                        // Get Form Data
                        $name = htmlspecialchars($_POST['name']);
                        $email = htmlspecialchars($_POST['email']);
                        $message = htmlspecialchars($_POST['message']);
                        $subject = htmlspecialchars($_POST['subject']);

                        // Check Required Fields
                        if (!empty($email) && !empty($name) && !empty($message) && !empty($subject)) {
                            // Passed
                            // Check Email
                            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                                // Failed
                                $msg = 'Please use a valid email';
                                $msgClass = 'alert-danger';
                            } else {
                                // Passed
                                $toEmail = 'support@ilearning.com';
                                $body =
                                    $subject .
                                    '<h4>Name</h4><p>' .
                                    $name .
                                    '</p>
                                                                                                                                                                                                                                                                                                                                                                                            <h4>Email</h4><p>' .
                                    $email .
                                    '</p>
                                                                                                                                                                                                                                                                                                                                                                                            <h4>Message</h4><p>' .
                                    $message .
                                    '</p>';

                                // Email Headers
                                $headers = 'MIME-Version: 1.0' . "\r\n";
                                $headers .= 'Content-Type:text/html;charset=UTF-8' . "\r\n";

                                // Additional Headers
                                $headers .= 'From: ' . $name . '<' . $email . '>' . "\r\n";

                                if (mail($toEmail, $subject, $body, $headers)) {
                                    // Email Sent
                                    $msg = 'Your email has been sent';
                                    $msgClass = 'alert-success';
                                } else {
                                    // Failed
                                    $msg = 'Your email was not sent';
                                    $msgClass = 'alert-danger';
                                }
                            }
                        } else {
                            // Failed
                            $msg = 'Please fill in all fields';
                            $msgClass = 'alert-danger';
                        }
                    }
                    ?>
                    <?php if($msg != ''): ?>
                    <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                    <?php endif; ?>
                    <!-- End of the php for the contact form -->
                    <form method="post" action="index.php#contact-section" data-aos="fade" id="contact_form">
                        <div class="flex mb-4">
                            <div class="w-full">
                                <div id="error_contact_fullname"></div>
                                <input type="text" name="name" id="contact_fullname"
                                    class="form-control h-12-imp" placeholder="Full name"
                                    value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <div class="w-full">
                                <div id="error_contact_subject"></div>
                                <input type="text" id="contact_subject" name="subject"
                                    class="form-control h-12-imp" placeholder="Subject">
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <div class="w-full">
                                <div id="error_contact_email"></div>
                                <input type="email" id="contact_email" name="email"
                                    class="form-control h-12-imp" placeholder="Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <div class="w-full">
                                <div id="error_contact_message"></div>
                                <textarea class="form-control h-auto" id="contact_message" name="message" cols="30" rows="10"
                                    placeholder="Write your message here."><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <div class="md:w-5/12">
                                <input type="submit" name="submit"
                                    class="rounded-full text-white uppercase font-black py-4 leading-7 text-xs px-8 w-full bg-indigo-500    btn btn-primary py-3 px-5 btn-block btn-pill"
                                    value="Send Message">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- !    Message Us      ! --}}

    {{-- Chat widget --}}
    @include('chatbox._chatbox')

    <footer class="py-24 bg-white">
        <div class="w-11/12 mx-auto">
            <div class="flex lg:flex-row flex-col space-y-6">
                <div class="md:w-4/12">
                    <h3 class="footer-heading">About ILearning</h3>
                    <p class="text-base">An E-Learning platform rich of resources, We make learning easy and simple for
                        Everyone.</p>
                </div>

                <div class="md:w-3/12 lg:ml-auto">
                    <h3 class="footer-heading">Links</h3>
                    <ul class="list-unstyled footer-links">
                        <li class="text-indigo-600 py-2 font-light"><a href="#home-section" class="nav-link">Home</a>
                        </li>
                        <li class="text-indigo-600 py-2 font-light"><a href="#courses-section"
                                class="nav-link">Courses</a>
                        </li>
                        <li class="text-indigo-600 py-2 font-light"><a href="#programs-section"
                                class="nav-link">Programs</a></li>
                        <li class="text-indigo-600 py-2 font-light"><a href="#teachers-section"
                                class="nav-link">Teachers</a></li>
                    </ul>
                </div>

                <div class="md:w-4/12">
                    <h3 class="footer-heading">Subscribe</h3>
                    <p class="text-base">Keep yourself up to date and receive all kind of news about ILearning.</p>
                    <form action="https://mailchi.mp/064deb47eeaa/lacdemy" target="_blank" class="footer-subscribe">
                        <div class="flex mb-4 mt-8">
                            <input type="submit"
                                class="uppercase text-xs font-black px-8 py-4 bg-indigo-500 text-white        btn btn-primary rounded-0"
                                value="Subscribe">
                        </div>
                    </form>
                </div>

            </div>

            <div class="flex pt-8 mt-8 text-center">
                <div class="md:w-full">
                    <div class="border-t pt-8">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js"
        integrity="sha512-QABeEm/oYtKZVyaO8mQQjePTPplrV8qoT7PrwHDJCBLqZl5UmuPi3APEcWwtTNOiH24psax69XPQtEo5dAkGcA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
    <script>
        jQuery(document).ready(function($) {
            $('.nonloop-block-14').owlCarousel({
                center: false,
                items: 1,
                loop: true,
                stagePadding: 0,
                margin: 0,
                autoplay: true,
                dots: false,
                nav: false,
                navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
                responsive: {
                    600: {
                        margin: 20,
                        nav: true,
                        items: 2
                    },
                    1000: {
                        margin: 30,
                        stagePadding: 20,
                        nav: true,
                        items: 2
                    },
                    1200: {
                        margin: 30,
                        stagePadding: 20,
                        nav: true,
                        items: 3
                    }
                }
            });

            $('.custom-pre-button').click(function() {
                $('.nonloop-block-14').trigger('prev.owl.carousel');
            })
            $('.custom-next-button').click(function() {
                $('.nonloop-block-14').trigger('next.owl.carousel');
            })
        })
    </script>

</body>

</html>
