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
            <div class="field">
                <div class="control">
                    <label class="block font-semibold text-sm" for="name">Category name</label>
                    <input id="name" name="name"
                        value="{{ old('name', isset($category) ? $category->name : '') }}"
                        class="string w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                        type="text" autofocus placeholder="Category name..." />
                </div>
            </div>
        </div>

        <div class="py-3 text-right px-2 flex justify-between">
            <a href="{{ route('admin.category.index') }}"
               class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </a>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-8 rounded-full border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </form>


</div>
