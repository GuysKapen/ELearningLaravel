<div xmlns:x-transition="http://www.w3.org/1999/xhtml">
    <form
        action="{{ !isset($subCategory) ? route('admin.sub-category.store') : route('admin.sub-category.update', $subCategory->id) }}"
        method="{{ 'POST' }}" enctype="multipart/form-data">
        @isset($subCategory->id)
            @method('PATCH')
        @endisset
        @csrf

        <div class="mb-4 px-2 w-full">

            <div class="w-full max-w-xs">
                <div class="space-y-1" x-data="Components.customSelect({ value: 4, selected: 4 })" x-init="init()">

                    <label class="block font-semibold text-sm mb-2" for="name">Parent cateegory</label>
                    <input x-ref="input" type="hidden" name="id" id="id">
                    <div class="relative">
                        <span class="inline-block w-full rounded-md shadow-sm">
                            <button x-ref="button" @click="onButtonClick()" type="button" aria-haspopup="listbox"
                                :aria-expanded="open" aria-labelledby="assigned-to-label"
                                class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                <div class="flex items-center space-x-3">
                                    @php
                                        if (!isset($categories)) {
                                            return;
                                        }
                                        $categories_str = $categories->map(function ($category) {
                                            return $category->name;
                                        });
                                        $categories_str->prepend('Select category');
                                    @endphp

                                    <span x-text='{{ $categories_str }}[value]' class="block truncate">Select
                                        category</span>
                                </div>
                                <span
                                    class="absolute inset-y-0 top-0 bottom-0 right-0 flex items-center pr-2 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </button>
                        </span>
                        <div x-show="open" @focusout="onEscape()" @click.away="open = false"
                            x-description="Select popover, show/hide based on select state."
                            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute mt-1 w-full rounded-md bg-white shadow-lg" style="display: none;">
                            <ul @keydown.enter.stop.prevent="onOptionSelect()"
                                @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()"
                                @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()"
                                x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="assigned-to-label"
                                :aria-activedescendant="activeDescendant"
                                class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                                <li id="assigned-to-option-1" role="option" @click="choose(0)"
                                    @mouseenter="selected = 0" @mouseleave="selected = null"
                                    :class="{ 'text-white bg-indigo-600': selected === 0, 'text-gray-900': !(selected === 0) }"
                                    class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                    <div class="flex items-center space-x-3">
                                        <span :class="{ 'font-semibold': value === 0, 'font-normal': !(value === 0) }"
                                            class="font-normal block truncate">
                                            Select category
                                        </span>
                                    </div>
                                    <span x-show="value === 0"
                                        :class="{ 'text-white': selected === 0, 'text-indigo-600': !(selected === 0) }"
                                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                        style="display: none;">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </li>


                                @foreach ($categories as $key => $category)
                                    @php
                                        if (isset($category)) {
                                            $id = $category->id;
                                        }
                                    @endphp
                                    <li id="assigned-to-option-{{ $id }}" role="option"
                                        @click="choose({{ $id }})"
                                        @mouseenter="selected = {{ $id }}" @mouseleave="selected = null"
                                        :class="{ 'text-white bg-indigo-600': selected === {{ $id }}, 'text-gray-900':
                                                !(selected === {{ $id }}) }"
                                        class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                        <div class="flex items-center space-x-3">
                                            <span
                                                :class="{ 'font-semibold': value === {{ $id }}, 'font-normal': !(
                                                        value === {{ $id }}) }"
                                                class="font-normal block truncate">
                                                {{ $category->name }}
                                            </span>
                                        </div>
                                        <span x-show="value === {{ $id }}"
                                            :class="{ 'text-white': selected === {{ $id }}, 'text-indigo-600': !(
                                                    selected === {{ $id }}) }"
                                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600"
                                            style="display: none;">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
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

            <div class="mt-4">
                <div class="field">
                    <div class="control">
                        <label class="block font-semibold text-sm" for="name">Subcategory name</label>
                        <input id="name" name="name"
                            value="{{ old('name', isset($subCategory) ? $subCategory->name : '') }}"
                            class="string w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                            type="text" autofocus placeholder="Subcategory name..." />
                    </div>
                </div>
            </div>

        </div>

        <div class="py-3 text-right px-2 flex justify-between">
            <a href="{{ route('admin.sub-category.index') }}"
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

@push('js')
    <script>
        window.Components = {
            customSelect(options) {
                return {
                    init() {
                        this.$refs.listbox.focus()
                        this.optionCount = this.$refs.listbox.children.length
                        this.$watch('selected', value => {
                            if (!this.open) return

                            if (this.selected === null) {
                                this.activeDescendant = ''
                                return
                            }

                            this.activeDescendant = this.$refs.listbox.children[this.selected - 1].id
                        })
                    },
                    activeDescendant: null,
                    optionCount: null,
                    open: false,
                    selected: null,
                    value: 1,
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
                            this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                                block: 'nearest'
                            })
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
                        this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                            block: 'nearest'
                        })
                    },
                    onArrowDown() {
                        this.selected = this.selected + 1 > this.optionCount ? 1 : this.selected + 1
                        this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                            block: 'nearest'
                        })
                    },
                    ...options,
                }
            },
        }
    </script>
@endpush
