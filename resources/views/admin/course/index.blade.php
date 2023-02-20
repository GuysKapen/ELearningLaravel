@extends('layouts.backend.app')

@section('title', 'Tag')

@push('css')
@endpush


@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card m-8 shadow-lg rounded-md px-8 pb-8">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <h2 class="text-xl font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">
                                All courses
                            </h2>
                            <span
                                class="inline-flex ml-4 items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-indigo-600 rounded-full">{{ $courses->count() }}</span>
                        </div>

                        <a href="{{ route('author.course.create') }}"
                            class="inline-flex justify-center py-2 px-8 border border-transparent shadow-sm text-sm font-black rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            New
                        </a>
                    </div>

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col mt-4">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    No
                                                </th>
                                                <th scope="col"
                                                    class="w-5/12 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Created At
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($courses as $key => $course)
                                                <tr>
                                                    <td class="text-sm font-medium text-gray-900 px-6">{{ $i++ }}
                                                    </td>
                                                    <td class="text-sm font-medium text-gray-900 px-6">{{ $course->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if ($course->is_approved)
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Active
                                                            </span>
                                                        @else
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                Pending
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $course->created_at->format('d/m/Y') }}</td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-center">
                                                        <button
                                                            class="p-3 mx-1 rounded-lg hover:bg-indigo-600 hover:text-white text-gray-400"
                                                            type="button" onclick="approve({{ $course->id }})">
                                                            <svg viewBox="0 0 512 512" style="width: 1em;">
                                                                <path fill="currentColor"
                                                                    d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('admin.course.approve', $course->id) }}"
                                                            id="approval-form-{{ $course->id }}" style="display: none">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>


                                                        <button
                                                            class="p-3 mx-1 rounded-lg hover:bg-indigo-600 hover:text-white text-gray-400 text-base">
                                                            <a href="{{ route('author.course.edit', $course->id) }}">
                                                                <svg viewBox="0 0 576 512" style="width: 1em;">
                                                                    <path fill="currentColor"
                                                                        d="M417.8 315.5l20-20c3.8-3.8 10.2-1.1 10.2 4.2V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h292.3c5.3 0 8 6.5 4.2 10.2l-20 20c-1.1 1.1-2.7 1.8-4.2 1.8H48c-8.8 0-16 7.2-16 16v352c0 8.8 7.2 16 16 16h352c8.8 0 16-7.2 16-16V319.7c0-1.6.6-3.1 1.8-4.2zm145.9-191.2L251.2 436.8l-99.9 11.1c-13.4 1.5-24.7-9.8-23.2-23.2l11.1-99.9L451.7 12.3c16.4-16.4 43-16.4 59.4 0l52.6 52.6c16.4 16.4 16.4 43 0 59.4zm-93.6 48.4L403.4 106 169.8 339.5l-8.3 75.1 75.1-8.3 233.5-233.6zm71-85.2l-52.6-52.6c-3.8-3.8-10.2-4-14.1 0L426 83.3l66.7 66.7 48.4-48.4c3.9-3.8 3.9-10.2 0-14.1z">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </button>

                                                        <button
                                                            class="p-3 mx-1 rounded-lg hover:bg-indigo-600 hover:text-white text-gray-400"
                                                            type="button" onclick="deleteCategory({{ $course->id }})">
                                                            <svg viewBox="0 0 448 512" style="width: 1em;">
                                                                <path fill="currentColor"
                                                                    d="M296 432h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zm-160 0h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zM440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h24v368a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96h24a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zM384 464a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V96h320zm-168-32h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8z">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                        <form id="delete-form-{{ $course->id }}"
                                                            action="{{ route('author.course.destroy', $course->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <!-- More people... -->
                                        </tbody>
                                    </table>
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

        function approve(id) {
            showConfirmPopup(function() {
                document.getElementById('approval-form-' + id).submit();
            }, "Do you want to approve the course? You won't be able to revert it", "Confirm")
        }
    </script>
@endpush
