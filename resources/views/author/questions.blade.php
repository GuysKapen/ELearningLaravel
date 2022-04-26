@extends('layouts.instructor.app')

@section('title','Questions')

@push('css')
@endpush

@section('content')

    <div class="mx-auto p-16">
        <h1 class="text-2xl font-black text-gray-900">Q&A</h1>

        <section class="w-4/12 mx-auto text-center my-8">
            <img src="{{ asset('images/undraw_faq.svg') }}" alt="Image" class="h-48 mx-auto">
            <p class="my-4">No questions yet</p>
            <p class="text-sm my-4 font-gray-500">Q&A is a forum where your students can ask questions, here your responses, and response to one another. Here is where you can see your Q&A thread</p>
        </section>
    </div>

@endsection

@push('js')
@endpush
