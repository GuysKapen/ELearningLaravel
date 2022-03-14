@extends('layouts.frontend.app')

@section('title','New category')

@push('css')
@endpush

@section('content')
    <div class="bg-gray-50 py-8">
        <section class="rounded-md background-white-grey shadow-md m-4 pb-4 overflow-hidden">
            <div class="font-bold bg-white flex items-center relative px-4 mb-4">
                <a href="">
                    <div class="flex items-baseline py-3 pr-4 cursor-pointer border-r text-sm">
                        <i class="fa fa-arrow-left mr-2 text-sm"></i>Back
                    </div>
                </a>
                <div class="mx-8 text-sm">
                    New Course
                </div>
            </div>

            @include('author.course._form')

        </section>
    </div>
@endsection
