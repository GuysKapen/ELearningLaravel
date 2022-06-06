@extends('layouts.frontend.course_detail')


@section('detail')

    @if(isset($courseLesson->resource))
        <div class="iframe-container flex justify-center items-center">
            <iframe src="{{$courseLesson->resource->video ?? ""}}"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen="" width="950" height="550"></iframe>
        </div>
    @endif

    @if(isset($courseLesson->content))
        <div class="mt-8 mx-24">
            <h2 class="text-black fw-900 font-black text-5xl font-mul mb-8">Description</h2>
            <div class="prose">
                {!! $courseLesson->content->content !!}
            </div>
        </div>
    @endif

@endsection

