@extends('layouts.frontend.app')

@section('title', 'Course')

@section('content')
    <div class="flex w-11/12 mx-auto py-16">

        <div class="w-7/12 flex-shrink-0">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('author.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                        Title </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                            Instructor/ </span>
                                        <input type="text" name="title" id="title"
                                            value="{{ Auth::user()->authorDetail->title ?? '' }}"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                            placeholder="Title">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">
                                    About </label>
                                <div class="mt-1">
                                    <textarea id="about" name="about" rows="6"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ Auth::user()->authorDetail->about ?? '' }}</textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs
                                    are
                                    hyperlinked.</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700"> Photo </label>
                                <div class="mt-1 flex items-center">
                                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                        <img src="{{ asset('storage/profile/' . (Auth::user()->authorDetail->cover ?? 'default.png')) }}"
                                            alt="cover" class="object-cover h-full w-full">
                                    </span>
                                    <button id="btn-change-cover" type="button"
                                        class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Change
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700"> Cover photo </label>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="cover"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="cover" name="cover" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="py-16 relative bg-gray-100 w-5/12">
            <div class="flex flex-col items-center space-x-8 px-24">
                {{-- <div class="align-end pl-8"> --}}
                    {{-- <img src="images/person_transparent.png" alt="Image" class="img-fluid"> --}}
                {{-- </div> --}}
                <div class="">
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
@endsection
