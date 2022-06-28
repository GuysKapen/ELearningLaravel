<div class="grid grid-cols-3 gap-4 mt-8">
    @foreach($courses as $key=>$course)
        <div class="overflow-hidden self-start top-0 relative border rounded-md">
            <figure class="m-0">
                <img
                    src="{{ asset("storage/course/". ($course->feature_img ?? "default.png") ) }}"
                    alt="Image" class="w-full h-32 object-cover block">
            </figure>
            <div
                class="absolute left-1/2 bg-white rounded-full p-1 -translate-x-1/2 -translate-y-1/2">
                                    <span
                                        class="inline-block h-8 w-8 rounded-full overflow-hidden bg-gray-100">
                                                <img
                                                    src="{{ asset("storage/profile/". ($course->user->authorDetail->cover ?? "default.png") ) }}"
                                                    alt="cover" class="object-cover h-full w-full">
                                            </span>
            </div>
            <div class="px-4 mt-4">
                <div class="mb-2 block text-sm text-center">
                    <span class="far fa-clock capitalize font-semibold">{{$course->user->username}}</span>
                </div>
                <a href="{{route("course", [$course->id])}}" class="text-gray-800 hover:text-indigo-500">
                    <p class="font-bold text-base">{{$course->name}}</p>
                </a>
                @if(!$course->categories->isEmpty())
                    <a href="{{ route('courses', ['cats[]' => $course->categories[0]->id]) }}">
                        <p class="text-sm text-indigo-400 hover:text-indigo-600 font-bold cursor-pointer mt-2">{{$course->categories[0]->name}}</p>
                    </a>
                @endif
            </div>
            <div class="flex border-t text-sm mt-4">
                <div class="py-4 px-4"><span
                        class="fa fa-users"></span> {{($course->detail->student_enrolled ?? 0) + $course->enrollments->count()}}</div>
                <div class="py-4"><span class="fa fa-comment"></span>&nbsp; {{$course->comments->count()}}</div>
                <div
                    class="py-4 px-4 ml-auto text-indigo-500 font-black">{{isset($course->coursePrice->price) ? "$" . $course->coursePrice->price : "Free"}}</div>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-8">
    {{ $courses->links() }}
</div>
