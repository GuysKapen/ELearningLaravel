<div class="bg-white shadow-full p-8">
    <form
        action="{{ !isset($courseLesson) ? route('author.course-lesson.store') :  route('author.course-lesson.update',  $courseLesson->id ) }}"
        method="{{ "POST" }}"
        enctype="multipart/form-data">
        @isset($courseLesson->id)
            @method('PATCH')
        @endisset
        @csrf
        <label class="block mb-1 font-semibold" for="input1">Lesson name</label>
        <input id="title"
               name="title"
               value="{{ old('name', isset($courseLesson) ? $courseLesson->title : "") }}"
               required
               class="string required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
               type="text" autofocus placeholder="Lesson name..."/>

        <label class="block mb-1 font-semibold" for="video">Video url</label>
        <input id="video"
               name="video"
               value="{{ old('name', isset($courseLesson) ? $courseLesson->video : "") }}"
               required
               class="string required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
               type="text" autofocus placeholder="Video url ..."/>

        <label class="block mb-1 mt-2 font-semibold" for="body">Content</label>
        <textarea id="mce-instance" name="body" placeholder="Enter content here"></textarea>
        <input type="hidden" name="section_id" value="{{$courseSection->id}}">


        <div class="section mt-5 bg-white sm:rounded-md shadow overflow-hidden pb-8">
            <div class="">
                <div class="p-4 px-2 m-0-imp bg-white border-b border-b-2">
                    <p class="ml-1 m-0 font-bold">Setting</p>
                </div>

                <div id="form-meta">
                    <div class="mb-3 mx-0 tab-view px-4">
                        <div class="field">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Duration</label>
                                <div class="w-8/12">

                                    <div class="flex items-center">
                                        <input id="duration"
                                               name="duration"
                                               value="{{ old('duration', isset($lessonDetail) ? $lessonDetail->duration : "") }}"
                                               required
                                               class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                               type="number"
                                               placeholder="Duration"/>

                                        <div class="max-w-xs">
                                            <div class="ml-2"
                                                 x-data="Components.customSelect({ open: true, value: 4, selected: 4 })"
                                                 x-init="init()">
                                                <input x-ref="input" type="hidden" name="duration_type" id="duration_type" value="0">
                                                <div class="relative">
                                                <span class="inline-block w-full rounded-md shadow-sm">
                                                    <button x-ref="button" @click="onButtonClick()" type="button"
                                                            aria-haspopup="listbox" :aria-expanded="open"
                                                            aria-labelledby="assigned-to-label"
                                                            class="cursor-default relative w-24 rounded-md border border-gray-300 bg-white pl-3 pr-8 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                        <div class="flex items-center space-x-3">
                                            @php
                                                if (!isset($categories)) return;
                                                $categories_str = $categories->map(function ($category) {   return $category->name; });
                                            @endphp

                                            <span
                                                x-text='{{$categories_str}}[value]'
                                                class="block truncate">Secs</span>
                                        </div>
                                                        <span
                                                            class="absolute inset-y-0 top-0 bottom-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </svg></span>
                                                    </button>
                                                </span>
                                                    <div x-show="open" @focusout="onEscape()" @click.away="open = false"
                                                         x-description="Select popover, show/hide based on select state."
                                                         x-transition:leave="transition ease-in duration-100"
                                                         x-transition:leave-start="opacity-100"
                                                         x-transition:leave-end="opacity-0"
                                                         class="absolute mt-1 rounded-md bg-white shadow-lg"
                                                         style="display: none;">
                                                        <ul @keydown.enter.stop.prevent="onOptionSelect()"
                                                            @keydown.space.stop.prevent="onOptionSelect()"
                                                            @keydown.escape="onEscape()"
                                                            @keydown.arrow-up.prevent="onArrowUp()"
                                                            @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox"
                                                            tabindex="-1"
                                                            role="listbox" aria-labelledby="assigned-to-label"
                                                            :aria-activedescendant="activeDescendant"
                                                            class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                                                            @foreach($categories as $key=>$category)
                                                                @php
                                                                    if(isset($category)) {$id = $category->id;}
                                                                @endphp
                                                                <li id="assigned-to-option-{{$id}}" role="option"
                                                                    @click="choose({{$id}})"
                                                                    @mouseenter="selected = {{$id}}"
                                                                    @mouseleave="selected = null"
                                                                    :class="{ 'text-white bg-indigo-600': selected === {{$id}}, 'text-gray-900': !(selected === {{$id}}) }"
                                                                    class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                                                    <div class="flex items-center space-x-3">
                                                                    <span
                                                                        :class="{ 'font-semibold': value === {{$id}}, 'font-normal': !(value === {{$id}}) }"
                                                                        class="font-normal block truncate">
                                                                        {{$category->name}}
                                                                    </span>
                                                                    </div>
                                                                    <span x-show="value === {{$id}}"
                                                                          :class="{ 'text-white': selected === {{$id}}, 'text-indigo-600': !(selected === {{$id}}) }"
                                                                          class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                                                          style="display: none;">
                                                                    <svg class="h-5 w-5" fill="currentColor"
                                                                         viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                          clip-rule="evenodd"></path>
                  </svg>
                                                                </span>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <span
                                        class="input-desc">The duration of the course</span>
                                </div>
                            </div>

                        </div>
                        <div class="field mt-2">
                            <div class="control flex flex-wrap mt-2 justify-start">
                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                       for="input1">Is Preview</label>
                                <div class="w-8/12">

                                    <input
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded block"
                                        type="checkbox" name="is_preview"
                                        id="is_preview" {{ old('is_preview') ? 'checked' : '' }}>

                                    <span
                                        class="input-desc">Whether the student can view this lesson content without taking the course</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="py-3 text-right px-2 flex justify-between">
            <a href="{{ route('author.course.index') }}"
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


<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#mce-instance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        // toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        height: "480",
        setup: function (editor) {
            editor.on('init', function () {
                //this gets executed AFTER TinyMCE is fully initialized
                editor.setContent('{!! $courseLesson->body ?? "" !!}');
            });
        }
    });
</script>

@push('js')
    <script>
        window.Components = {
            customSelect(options) {
                return {
                    init() {
                        this.value = 0;
                        this.open = false;

                        this.$refs.listbox.focus()
                        this.optionCount = this.$refs.listbox.children.length
                        this.$watch('selected', value => {
                            if (!this.open) return

                            if (this.selected === null) {
                                this.activeDescendant = ''
                                return
                            }

                            this.activeDescendant = this.$refs.listbox.children[this.selected].id
                        })
                    },
                    activeDescendant: null,
                    optionCount: null,
                    open: false,
                    selected: 0,
                    value: 0,
                    choose(option) {
                        this.value = option
                        this.open = false
                        this.$refs.input.value = option;
                    },
                    onButtonClick() {
                        if (this.open) return
                        this.selected = this.value
                        this.open = true
                        this.$nextTick(() => {
                            this.$refs.listbox.focus()
                            this.$refs.listbox.children[this.selected].scrollIntoView({block: 'nearest'})
                        })
                    },
                    onOptionSelect() {
                        if (this.selected !== null) {
                            this.value = this.selected
                        }
                        this.open = false
                        this.$refs.button.focus()
                    },
                    onEscape() {
                        this.open = false
                        this.$refs.button.focus()
                    },
                    onArrowUp() {
                        this.selected = this.selected - 1 < 1 ? this.optionCount : this.selected - 1
                        this.$refs.listbox.children[this.selected].scrollIntoView({block: 'nearest'})
                    },
                    onArrowDown() {
                        this.selected = this.selected + 1 > this.optionCount ? 1 : this.selected + 1
                        this.$refs.listbox.children[this.selected].scrollIntoView({block: 'nearest'})
                    },
                    ...options,
                }
            },
        }

    </script>
@endpush
