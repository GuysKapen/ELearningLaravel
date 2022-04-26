@extends('layouts.instructor.app')

@section('title','Questions')

@push('css')
@endpush

@section('content')

    <div class="mx-auto p-16">
        <h1 class="text-2xl font-black text-gray-900">Resources</h1>

        <div class="flex">
            <section class="w-3/12 text-center p-8 border mt-8 cursor-pointer">
                <div>
                    <span class="material-icons outlined text-6xl text-indigo-600">cast_for_education</span>
                </div>
                <p class="mt-2 font-bold text-gray-900 text-base">Teaching center</p>
                <p class="text-sm my-4 font-gray-500">Find articles on teaching - from course creation to marketing</p>
            </section>

            <section class="w-3/12 text-center p-8 border mt-8 ml-8 cursor-pointer">
                <div>
                    <span class="material-icons outlined text-6xl text-indigo-600">local_library</span>
                </div>
                <p class="mt-2 font-bold text-gray-900 text-base">Instructor Community</p>
                <p class="text-sm my-4 font-gray-500">Share your progress and ask other instructor question in our community</p>
            </section>

            <section class="w-3/12 text-center p-8 border mt-8 ml-8 cursor-pointer">
                <div>
                    <span class="material-icons outlined text-6xl text-indigo-600">help</span>
                </div>
                <p class="mt-2 font-bold text-gray-900 text-base">Help and Support</p>
                <p class="text-sm my-4 font-gray-500">Can't find what you need? Our support team is ready to help</p>
            </section>
        </div>
    </div>

@endsection

@push('js')
@endpush
