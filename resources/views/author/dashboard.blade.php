@extends('layouts.instructor.app')

@section('title','New category')

@push('css')
@endpush

@section('content')

    <div class="mx-auto px-16">
        <section class="my-8">
            <div class="shadow-md px-8 py-12 border-t flex justify-between">
                <div class="flex items-center">
                    <span class="material-symbols material-icons text-indigo-600 text-3xl outlined">play_lesson</span>
                    <h2 class="text-black fw-900 font-black text-xl font-mul ml-8">Start your teaching</h2>
                </div>
                <a href="{{route("author.course.create")}}">
                    <button class="px-16 py-2 bg-indigo-600 text-sm font-black text-white hover:bg-indigo-700">Create your course</button>
                </a>

            </div>
        </section>
        <p class="my-4 text-center text-md text-gray-700">Based on your experience, we think these resources will be helpful</p>
        <section class="my-8">
            <div class="shadow-md p-8 border-t flex justify-center items-center">
                <div class="w-4/12 flex-shrink-0">
                    <img src="{{ asset('images/undraw_youtube_tutorial.svg') }}" alt="Image" class="h-48">
                </div>
                <div class="ml-8">
                    <h3 class="text-base text-gray-800 font-bold">Create an engaging course</h3>
                    <p class="text-sm my-4">Whether you have been teaching for years or teaching for the first time, you can make the engaging course. We have compiled resources and best practices to help you get to the next level, no matter where you are starting</pc>
                    <a href="" class="block my-4 text-sm text-indigo-600">Get started</a>
                </div>
            </div>
        </section>

        <section class="my-8">
            <div class="flex space-x-4">
                <div class="shadow-md p-8 border-t flex justify-center items-center flex-1">
                    <div class="w-4/12 flex-shrink-0">
                        <img src="{{ asset('images/undraw_video_call.svg') }}" alt="Image" class="h-48">
                    </div>
                    <div class="ml-8">
                        <h3 class="text-base text-gray-800 font-bold">Get started with video</h3>
                        <p class="text-sm my-4">Best quality video lectures can set your course apart. Use our resources to learn the basic</p>
                            <a href="" class="block my-4 text-sm text-indigo-600">Get started</a>
                    </div>
                </div>
                <div class="shadow-md p-8 border-t flex justify-center items-center flex-1">
                    <div class="w-4/12 flex-shrink-0">
                        <img src="{{ asset('images/undraw_mobile_marketing.svg') }}" alt="Image" class="h-48">
                    </div>
                    <div class="ml-8">
                        <h3 class="text-base text-gray-800 font-bold">Build your audience</h3>
                        <p class="text-sm my-4">Set your course up be success by building your audience</p>
                            <a href="" class="block my-4 text-sm text-indigo-600">Get started</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-8">
            <div class="shadow-md p-8 border-t flex justify-center items-center">
                <div class="w-4/12 flex-shrink-0">
                    <img src="{{ asset('images/undraw_gifts.svg') }}" alt="Image" class="h-48">
                </div>
                <div class="ml-8">
                    <h3 class="text-base text-gray-800 font-bold">Join the newcomer challenge!</h3>
                    <p class="text-sm my-4">Get exclusive tips and resources designed to help you launch your first course faster! Eligible instructors who public their first course on time will receive a specival bonus to celebrate</p>
                        <a href="" class="block my-4 text-sm text-indigo-600">Get started</a>
                </div>
            </div>
        </section>

        <p class="my-4 text-center text-gray-700 text-md">Have questions? Here are our most popular instructor resources</p>
    </div>

@endsection

@push('js')
@endpush
