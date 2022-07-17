@extends('layouts.frontend.app')

@section('title', 'About')

@push('css')
@endpush

@section('content')

    <section class="my-8">

        <section class="my-32 w-8/12 mx-auto">
            <div class="flex">
                <div class="w-6/12 mx-auto text-left">
                    <div class="flex items-center">
                        <p class="text-sm font-bold text-gray-500">About Us</p>
                    </div>

                    <h1 class="text-base font-bold text-gray-800 font-josesans mt-2">We can provide varies courses from
                        practical hand-on to edge
                        tech AI courses to scope with new demands and growing user base</h1>
                    <p class="mx-auto mt-4 text-sm">
                        ILearning is website of multi national online course including thousands of high quality of professors has public
                        courses in various topics that can satisfy the demands of the hardest customer
                    </p>

                    <div
                        class="inline-block px-8 py-2 mt-8 bg-white shadow-full rounded-full text-center text-base font-josesans text-gray-400 cursor-pointer">
                        Get started<i class="ml-2 fa fa-credit-card mr-3 duration-500"></i>
                    </div>
                </div>
                <div class="w-5/12">
                    <img src="{{ asset('images/working.svg') }}" alt="">
                </div>

            </div>

        </section>

        <section class="my-16 mx-auto w-8/12">
            <div class="flex items-center justify-between">
                <div class="w-5/12">
                    <img src="{{ asset('images/business_shop.svg') }}" alt="">
                </div>
                <div class="w-6/12">
                    <div class="flex items-center">
                        <h6 class="text-sm font-bold text-gray-500">Start with us</h6>
                    </div>
                    <h3 class="text-base font-josesans font-bold text-gray-800 mt-2">Is your site driving sales of
                        <span class="text-indigo-800">course</span>
                    </h3>
                    <p class="mx-auto mt-4 text-sm">
                        We provide excellent quality digital service with tangible results measurable long-term business for you to start teaching on ILearning
                    </p>
                    <div
                        class="inline-block my-8 px-8 py-2 bg-white shadow-full rounded-full text-center text-base font-josesans text-gray-400 cursor-pointer">
                        Start now <i class="ml-2 fa fa-clock mr-3 duration-500"></i>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div>

                <h2 class="text-black fw-900 text-center font-black text-5xl font-mul mb-8">About our company</h2>
                <p class="w-1/2 mx-auto mt-4 text-center text-gray-600">
                    We provide simple, high quality and reasonable commision for worldwide market. Driven by a strong
                    focus on
                    innovation and customer-centricity, ILearning has quickly grown to serve over two millions customers,
                    instructor on out platform
                </p>
            </div>
            <div class="mx-16 my-16">
                <img src="{{ asset('images/startup.jpg') }}" alt=""
                    class="h-64 w-full object-cover rounded-extra-lg">
            </div>
        </section>

        <section class="mx-16 my-16">
            <div class="flex w-1/2 mx-auto">
                <div>
                    <h6 class="text-2xl font-josesans text-center font-black text-gray-800 mt-8">Our features</h6>
                    <p class="text-sm">In the 21st century</p>
                </div>
                <div class="w-32 h-32 ml-8 rounded-3xl shadow-full relative">
                    <div class="top-1/2 left-1/2 absolute -translate-x-1/2 -translate-y-1/2 text-center text-base">
                        <span class="material-icons">school</span>
                        <p class="mt-2">Interactive learning</p>
                    </div>
                </div>
                <div class="w-32 h-32 ml-8 rounded-3xl shadow-full relative">
                    <div class="top-1/2 left-1/2 absolute -translate-x-1/2 -translate-y-1/2 text-center text-base">
                        <span class="material-icons">balance</span>
                        <p class="mt-2">Free Returns</p>
                    </div>
                </div>

            </div>
            <div class="flex w-1/2 mx-auto mt-4">
                <div class="w-32 h-32 ml-4 rounded-3xl shadow-full relative">
                    <div class="top-1/2 left-1/2 absolute -translate-x-1/2 -translate-y-1/2 text-center text-base">
                        <span class="material-icons">manage_accounts</span>
                        <p class="mt-2">In Home Setup</p>
                    </div>
                </div>
                <div class="w-32 h-32 ml-8 rounded-3xl shadow-full relative">
                    <div class="top-1/2 left-1/2 absolute -translate-x-1/2 -translate-y-1/2 text-center text-base">
                        <span class="material-icons">high_quality</span>
                        <p class="mt-2">High quality</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div>

                <h2 class="text-black fw-900 text-center font-black text-5xl font-mul mb-8">Endless possibilities courses
                </h2>
                <p class="w-1/2 mx-auto mt-4 text-center text-gray-600">
                    ILearning was among the first market to launch virtual certifate technology, enabling seamless integration for
                    instructors
                    while allowing out learners learn and evalutate 100% online
                </p>
            </div>

        </section>

        <section class="my-16">
            <div>

                <h2 class="text-black fw-900 text-center font-black text-5xl font-mul mb-8">Our members</h2>
                <p class="w-1/2 mx-auto mt-4 text-center text-gray-600">
                    Join us in the excellent quality business all over the world
                </p>
            </div>
            <div class="flex w-2/3 mx-auto my-16 justify-center">

                <div class="mx-4 text-center w-24">
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://cdn.pixabay.com/photo/2016/11/29/13/14/attractive-1869761__340.jpg" alt=""
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="mt-4 font-bold font-josesans">Darrel Mary</h3>
                    <p class="mt-2 text-gray-400">Contact</p>
                </div>

                <div class="mx-4 text-center w-24">
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://cdn.pixabay.com/photo/2017/09/25/13/12/man-2785071__480.jpg" alt=""
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="mt-4 font-bold font-josesans">James Smith</h3>
                    <p class="mt-2 text-gray-400">Contact</p>
                </div>

                <div class="mx-4 text-center w-24">
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://cdn.pixabay.com/photo/2020/03/20/18/52/fashion-4951644__480.jpg" alt=""
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="mt-4 font-bold font-josesans">Patricia David</h3>
                    <p class="mt-2 text-gray-400">Contact</p>
                </div>
                <div class="mx-4 text-center w-24">
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://cdn.pixabay.com/photo/2019/04/16/23/59/sad-4133121__480.jpg" alt=""
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="mt-4 font-bold font-josesans">John Williams</h3>
                    <p class="mt-2 text-gray-400">Contact</p>
                </div>
                <div class="mx-4 text-center w-24">
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://cdn.pixabay.com/photo/2020/03/20/18/52/fashion-4951644__480.jpg" alt=""
                            class="w-full h-full object-cover">
                    </div>
                    <h3 class="mt-4 font-bold font-josesans">Robert Johnson</h3>
                    <p class="mt-2 text-gray-400">Contact</p>
                </div>

            </div>

        </section>

        <section>
            <h1 class="text-5xl text-black text-center font-black font-josesans" style="line-height: 4rem">Have something want to learning <br>Let
                <u class="text-indigo-800">Findout</u>
            </h1>
            <div
                class="w-2/12 px-8 mt-8 py-2 bg-white shadow-full rounded-full mx-auto text-center text-base font-josesans text-gray-400 cursor-pointer">
                Shopping <i class="fa fa-shopping-bag ml-3 duration-500"></i>
            </div>
        </section>
    </section>

@endsection

@push('js')
@endpush
