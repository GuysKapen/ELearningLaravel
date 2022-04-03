@extends('layouts.frontend.app')

@section('title','New category')

@push('css')
@endpush

@section('content')
    <div class="bg-gray-50 py-8">
        <section class="rounded-md background-white-grey shadow-md m-8 overflow-hidden">
            <div class="py-4 px-8 flex bg-white text-base">
                <a class="text-indigo-600" href="{{url("home")}}">Home &nbsp; > &nbsp;</a>
                <h3>New Course</h3>
            </div>

            @include('author.course._test_form')

        </section>
    </div>
@endsection
