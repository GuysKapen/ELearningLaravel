@extends('layouts.instructor.app')

@section('title','Questions')

@push('css')
@endpush

@section('content')

    <div class="mx-auto p-16">
        <h1 class="text-2xl font-black text-gray-900">Tools</h1>

        <div class="flex">
            <section class="w-3/12 text-center p-8 border mt-8 cursor-pointer">
                <div>
                    <span class="material-icons outlined text-6xl text-indigo-600">smart_display</span>
                </div>
                <p class="mt-2 font-bold text-gray-900 text-base">Test video</p>
                <p class="text-sm my-4 font-gray-500">Get feedback from us on your audio, video and delivery</p>
            </section>

            <section class="w-3/12 text-center p-8 border mt-8 ml-8 cursor-pointer">
                <div>
                    <span class="material-icons outlined text-6xl text-indigo-600">insights</span>
                </div>
                <p class="mt-2 font-bold text-gray-900 text-base">Marketplace Insights</p>
                <p class="text-sm my-4 font-gray-500">Get wide market data to create successful courses</p>
            </section>
        </div>
    </div>

@endsection

@push('js')
@endpush
