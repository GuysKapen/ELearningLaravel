@extends('layouts.backend.app')

@section('title', 'Courses')

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
                           class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-black rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($courses as $key=>$course)
                                            <tr>
                                                <td class="text-sm font-medium text-gray-900 px-6">{{ $i++ }}</td>
                                                <td class="text-sm font-medium text-gray-900 px-6">{{ $course->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Active
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->created_at->format('d/m/Y') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('author.course.edit',$course->id) }}"
                                                       class="text-indigo-600 hover:text-indigo-900 mx-2">Edit</a>

                                                    <button class="text-red-600 hover:text-red-900" type="button"
                                                            onclick="deleteCategory({{ $course->id }})">
                                                        Delete
                                                    </button>
                                                    <form id="delete-form-{{ $course->id }}"
                                                          action="{{ route('author.course.destroy',$course->id) }}"
                                                          method="POST"
                                                          style="display: none;">
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
    </script>
@endpush
