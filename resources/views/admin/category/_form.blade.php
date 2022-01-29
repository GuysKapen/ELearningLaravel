<div>
    <form
        action="{{ !isset($category) ? route('admin.category.store') :  route('admin.category.update',  $category->id ) }}"
        method="{{ "POST" }}"
        enctype="multipart/form-data">
        @isset($category->id)
            @method('PATCH')
        @endisset
        @csrf

        <div class="mb-4 px-2 w-full">
            <label class="block mb-1 font-semibold" for="input1">Category name</label>

            <input id="name"
                   name="name"
                   value="{{ old('name', isset($category) ? $category->name : "") }}"
                   required
                   class="w-full border px-4 py-2 rounded focus:border-blue-500 focus:shadow-outline outline-none"
                   type="text" autofocus placeholder="Category name..."/>
        </div>

        <div class="py-3 text-right px-2 flex justify-between">
            <a href="{{ route('admin.category.index') }}"
               class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </a>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>


</div>
