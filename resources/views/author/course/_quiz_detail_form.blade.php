<div id="form-meta">
    <div class="mb-3 mx-0 tab-view px-4">
        <h4 class="text-base font-bold text-gray-700">Quiz detail</h4>
        <div class="field">
            <div class="control flex flex-wrap mt-2 justify-start">
                <label class="block font-semibold text-sm mt-2 w-4/12"
                       for="input1">Duration</label>
                <div class="w-8/12">

                    <div class="flex items-center">
                        <input id="duration"
                               name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][detail][duration]"
                               value="{{ isset($quizDetail) ? $quizDetail->duration : "" }}"
                               class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                               type="number"
                               placeholder="Duration"/>

                        <div class="max-w-xs">
                            <div class="ml-2"
                                 x-data="Components.customSelect({ open: true, value: 4, selected: 4 })"
                                 x-init="init()">
                                <input x-ref="input" type="hidden"
                                       name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][detail][duration_type]"
                                       id="duration_type" value="0">
                                <div class="relative">
                                                <span class="inline-block w-full rounded-md shadow-sm">
                                                    <button x-ref="button" @click="onButtonClick()" type="button"
                                                            aria-haspopup="listbox" :aria-expanded="open"
                                                            aria-labelledby="assigned-to-label"
                                                            class="cursor-default relative w-24 rounded-md border border-gray-300 bg-white pl-3 pr-8 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                                        <div class="flex items-center space-x-3">
                                            @php
                                                if (!isset($timeUnits)) return;
                                                $categories_str = $timeUnits->map(function ($category) {   return $category->name; });
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

                                            @foreach($timeUnits as $key=>$category)
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
                       for="input1">Allow Attempt</label>
                <div class="w-8/12">

                    <input id="duration"
                           name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][detail][allow_num_attempt]"
                           value="{{ isset($quizDetail) ? $quizDetail->allow_num_attempt : "" }}"
                           class="string block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                           type="number"
                           placeholder="Num attempt"/>

                    <span
                        class="input-desc">How many time a student can attempt this quiz (-1 for unlimited)</span>
                </div>
            </div>

        </div>

        <div class="field mt-2">
            <div class="control flex flex-wrap mt-2 justify-start">
                <label class="block font-semibold text-sm mt-2 w-4/12"
                       for="input1">Description</label>
                <div class="w-8/12">

                    <textarea
                        class="w-full mt-2 px-4 placeholder-gray-500 placeholder-text-sm rounded-md bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                        name="sections[{{$sectionIndex}}][quizzes][{{$lessonIndex}}][detail][description]"
                        placeholder="Description">{{$quizDetail->description ?? ""}}</textarea>

                    <span
                        class="input-desc">The description about the quiz</span>
                </div>
            </div>

        </div>
    </div>

</div>

