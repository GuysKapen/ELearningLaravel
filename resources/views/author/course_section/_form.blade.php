<div>
    <form
        action="{{ !isset($courseSection) ? route('author.course.add-section') :  route('author.course.add-section',  $courseSection->id ) }}"
        method="{{ "POST" }}"
        enctype="multipart/form-data">
        @isset($courseSection->id)
            @method('PATCH')
        @endisset
        @csrf

        <div class="mb-4 px-2 w-full">
            <label class="block mb-1 font-semibold" for="input1">Section name</label>

            <input id="name"
                   name="name"
                   value="{{ old('name', isset($courseSection) ? $courseSection->name : "") }}"
                   required
                   class="string required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                   type="text" autofocus placeholder="Section name..."/>
        </div>

        <input type="hidden" id="course_id" name="course_id" value="{{$course->id}}">

        <div class="py-3 text-right px-2 flex justify-end">
            <button type="submit"
                    class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>


</div>

