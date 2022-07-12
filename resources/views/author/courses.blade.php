@extends('layouts.instructor.app')

@section('title', 'Courses')

@push('css')

@endpush


@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card m-8 px-8 pb-8">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <h2 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">
                                All courses
                            </h2>
                            <span
                                class="inline-flex ml-4 items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-indigo-600 rounded-full">{{ $courses->count() }}</span>
                        </div>

                        <a href="{{ route('author.course.create') }}"
                           class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-black rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            New
                        </a>
                    </div>

                    <div class="flex flex-col mt-4">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200">
                                    @foreach($courses as $key=>$course)
                                        <div class="flex mb-8 h-36 items-center border p-4">
                                            <div class="w-2/12 h-full">
                                                <img
                                                    src="{{ asset("storage/course/". ($course->feature_img ?? "default.png") ) }}"
                                                    class="object-cover h-full"
                                                    alt="Course image">
                                            </div>

                                            <div class="w-3/12">
                                                <a href="{{route("course", [$course->id])}}">
                                                    <p class="text-sm font-bold text-gray-900 px-6 hover:text-indigo-500">
                                                        {{ $course->name }}
                                                    </p>
                                                </a>

                                                <div class="mt-2 px-6">
                                                    <span
                                                        class="text-sm text-indigo-600 font-bold">{{$course->displayPrice()}}</span>
                                                    <span>-</span>
                                                    <span class="text-gray-600 text-sm font-bold">Public</span>
                                                </div>
                                            </div>

                                            <div class="w-3/12">
                                                <h3 class="text-indigo-600">$@php echo rand(15, 60) @endphp</h3>
                                                <p class="text-sm font-medium text-gray-500">Eeaned this month</p>
                                            </div>
                                            <div class="w-3/12">
                                                <h3 class="text-indigo-600">{{$course->enrollments->where("created_at", ">", \Carbon\Carbon::now()->firstOfMonth())->count()}}</h3>
                                                <p class="text-sm font-medium text-gray-500">Entrollment this month</p>
                                            </div>
                                            <div class="w-2/12">
                                                @if(!$course->comments->isEmpty())
                                                    <h3 class="text-indigo-600">{{$course->comments->avg('rating')}}</h3>
                                                    <p class="text-sm font-medium text-gray-500">Course rating</p>
                                                @else
                                                    <h3 class="text-indigo-600">No rating</h3>
                                                    <p class="text-sm font-medium text-gray-500">Course rating</p>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection


@push('js')
    <script type="text/javascript">
        function deleteCategory(id) {
            showConfirmPopup(function() {
                document.getElementById('delete-form-' + id).submit();
            })
        }
    </script>
@endpush
