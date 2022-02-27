@extends('layouts.frontend.app')

@section('title','New category')

@push('css')
@endpush

@section('content')

    <section>

        <div class="py-4 px-8 mb-8 flex bg-white shadow-full">
            <a class="text-indigo-600" href="{{url("home")}}">Home > &nbsp;</a>
            <h3>Computer Science <span
                    class="text-gray-500">&nbsp;Learn C++ Programming | Video Tutorial for Beginners Tool Set, Tool Chain and IDE </span>
            </h3>
        </div>
    </section>

    <section class="w-8/12 mx-auto">
        <h2 class="text-black fw-900 font-black text-2xl font-mul mb-8">
            Video Tutorial for Beginners Tool Set, Tool Chain and IDE
        </h2>
        <div class="flex justify-between">
            <div class="flex divide-x-2">
                <div class="flex items-center pr-4">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full"
                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                             alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm text-gray-500">Instructor</div>
                        <div class="text-sm font-medium text-gray-900 font-bold mt-1">Jane Cooper</div>
                    </div>
                </div>
                <div class="px-4 flex flex-col justify-center">
                    <div class="text-sm text-gray-500">Category</div>
                    <div class="text-sm font-medium text-gray-900 font-bold mt-1">Technology</div>
                </div>
                <div class="px-4">
                    <div class="text-sm text-gray-500">Review</div>
                    <div class="mt-1">
                        <ul class="flex justify-center">
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                     class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </li>
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                     class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </li>
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                     class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </li>
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="star"
                                     class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                                </svg>
                            </li>
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="star"
                                     class="w-4 text-yellow-500" role="img" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex item-centers">
                <h2 class="text-black fw-900 font-black text-2xl font-mul ">Free</h2>
                <button class="px-6 rounded-lg font-black text-sm text-white bg-indigo-600 ml-8">Take this course
                </button>
            </div>
        </div>

        <section class="my-8">
            <div class="shadow-md p-8 border-t">
                <h2 class="text-black fw-900 font-black text-xl font-mul">
                    What you'll learn</h2>
                <div class="mt-4">
                    <ul class="flex flex-wrap list-col-2">
                        <li>
                            <div class="flex">
                                <span class="material-icons text-sm outlined">check</span>
                                <div class="text-sm ml-2">
                                <span
                                    class="text-sm">How to write API automation (backend automation) using Python 3</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex">
                                <span class="material-icons text-sm outlined">check</span>
                                <div class="text-sm ml-2">
                                <span
                                    class="text-sm">How to validate API response</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex">
                                <span class="material-icons text-sm outlined">check</span>
                                <div class="text-sm ml-2">
                                <span
                                    class="text-sm">How to build automation framework</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex">
                                <span class="material-icons text-sm outlined">check</span>
                                <div class="text-sm ml-2">
                                <span
                                    class="text-sm">How to generate reports for your tests (pytest-html, Allure, jUnit)</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex">
                                <span class="material-icons text-sm outlined">check</span>
                                <div class="text-sm ml-2">
                                <span
                                    class="text-sm">How to create a real eCommerce WordPress site locally</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex">
                                <span class="material-icons text-sm outlined">check</span>
                                <div class="text-sm ml-2">
                                <span
                                    class="text-sm">How to use PyTest (most popular unit testing framework)</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="my-8">
            <div>
                <div class="">
                    <div class="tab-pane active" id="description">
                        <div class="mt-8">
                            <h2 class="text-black fw-900 font-black text-2xl font-mul mb-2">
                                Description
                            </h2>
                            <p class="text-gray-500 text-base">
                                Learn how to use Python to test the back-end of web services or APIs. We use industry
                                standard real eCommerce RESTful API to practice testing using Python programming
                                language.

                            </p>
                            <p class="text-gray-500 text-base mt-4">
                                We will build a framework using one of the most popular testing tools PyTest. The
                                framework
                                we will build will be extendable and scalable to be able to include frontend (Selenium
                                WebDriver) testing.
                            </p>

                            <p class="text-gray-500 text-base mt-4">
                                The skills learned here are used in any Web Serivces testing.
                            </p>
                        </div>
                        <div class="mt-4">
                            <h2 class="text-black fw-900 font-black text-2xl font-mul mb-2">
                                Audience
                            </h2>
                            <p class="text-gray-500 text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam consequatur et
                                exercitationem facere fugiat, harum laborum molestias necessitatibus nobis nostrum odit
                                officiis omnis quae rem suscipit totam velit vero vitae?
                            </p>

                            <p class="text-gray-500 text-base mt-4">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consectetur debitis
                                enim
                                quam qui quidem quod tenetur vero!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid consectetur
                                dignissimos eum fugiat in laborum nostrum nulla pariatur repudiandae vero, vitae
                                voluptas
                                voluptate. Cum inventore minus natus praesentium vitae.
                            </p>
                        </div>
                        <div class="mt-4">
                            <h2 class="text-black fw-900 font-black text-2xl font-mul mb-2">
                                Prerequisities
                            </h2>
                            <p class="text-gray-500 text-base">
                                If you are getting into the QA world or you are looking to advance your career, having
                                API
                                testing skill will accelerate your success. Python is one of the most popular languages
                                to
                                use in software testing, and knowing how to use it for API/Backend testing will expand
                                your
                                pool of possibilities. </p>

                            <p class="text-gray-500 text-base mt-4">
                                In addition to using Python for API/Backend testing, the tools we will use are great
                                addition to your resume. We will be using industry standard tools that can be applied to
                                several tasks beyond API testing. </p>

                            <p class="text-gray-500 text-base mt-4">
                                After completion of this course you will be able to go through interview as if you have
                                API
                                testing experience. You will also have plenty of APIs to test and practice.
                            </p>
                        </div>

                        <div class="mt-4">
                            <h2 class="text-black fw-900 font-black text-2xl font-mul mb-2">
                                Outcome
                            </h2>
                            <ul class="list-disc pl-6 marker:text-indigo-400 marker:text-xxs">

                                <li class="text-sm pb-1 pl-2">35 + lectures (continuously adding more examples)
                                </li>
                                <li class="text-sm pb-1 pl-2">
                                    Plenty of APIs (endpoints) for you to practice with beyond this class
                                </li>
                                <li class="text-sm pb-1 pl-2">
                                    Enough material and examples to be able to create a project and maintain a GitHub
                                    repo
                                </li>
                                <li class="text-sm pb-1 pl-2">
                                    Industry standard tools to add to your resume.
                                </li>
                                <li class="text-sm pb-1 pl-2">
                                    Anyone looking to learn automation Backend/API testing
                                </li>
                                <li class="text-sm pb-1 pl-2">
                                    Anyone looking to gain experience automating the backend test for real eCommerce
                                    site
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="tab-pane mt-8" id="cirriculum">
                        <h2 class="text-black fw-900 font-black text-xl font-mul">Course content</h2>
                        <div class="mt-4">
                            @php
                                $i = 0;
                            @endphp
                            @for($j =0; $j <= 5; $j++)
                                @php
                                    /** @noinspection PhpUndefinedVariableInspection */$i++;
                                @endphp
                                <div
                                    class="overflow-hidden shadow-sm bg-transparent border-none relative flex flex-col rounded-md"
                                    id="accordionExample-{{$i}}">
                                    <div class="bg-transparent border-none py-2 flex items-center justify-between"
                                         id="heading-{{$i}}">
                                        <div class="flex items-center">
                            <span id="indicator-{{$i}}" aria-labelledby="heading-{{$i}}"
                                  data-parent="#accordionExample-{{$i}}"
                                  class="mul-collapse-{{$i}} transition-all duration-300 material-icons outlined text-xl expand collapse {{$i == 1 ? 'show' : ''}}">expand_more</span>
                                            <h2 class="mb-0 ml-2 title-expand">
                                                <button
                                                    class="cursor-pointer w-full text-black font-bold text-left block bg-transparent border-0 py-2 text-base rounded-md outline-none"
                                                    type="button" data-toggle="collapse"
                                                    data-target=".mul-collapse-{{$i}}" aria-expanded="false"
                                                    aria-controls="collapse-{{$i}}">
                                                    Section 1: Introduction
                                                    {{--                                                Section {{$section->index}}: {{$section->name}}--}}
                                                </button>
                                            </h2>
                                        </div>
                                    </div>

                                    <div id="collapse-{{$i}}"
                                         class="transition-all duration-1000 collapse mul-collapse-{{$i}} {{$i == 1 ? 'show' : ''}}"
                                         aria-labelledby="heading-{{$i}}"
                                         data-parent="#accordionExample-{{$i}}">
                                        <div class="bg-gray-100 px-4 py-2">
                                            @for($k =0; $k <= 5; $k++)
                                                <div class="pb-2 border-b mt-2">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center w-32 flex-shrink-0">
                                                            <span
                                                                class="material-icons outlined text-base text-indigo-600">description</span>
                                                            <span class="ml-2 text-sm font-bold">Lecture 1.1</span>
                                                        </div>
                                                        <span class="mx-2 text-sm font-bold text-black">What is C++, Its Introduction and History</span>
                                                        <span class="icon-wrap small mr-3 flex-end"><span
                                                                class="icon material-icons">visibility</span></span>

                                                        <p class="ml-2 text-gray-500 text-sm ml-auto flex-end">50
                                                            mins</p>

                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            @endfor


                        </div>
                    </div>
                    <div class="tab-pane mt-8" id="instructor">
                        <h2 class="text-black fw-900 font-black text-xl font-mul">Instructor</h2>
                        <div class="mt-4">
                            <div>
                                <div class="flex items-center pr-4">
                                    <div class="flex-shrink-0 h-32 w-32">
                                        <img class="h-32 w-32 rounded-full"
                                             src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                                             alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm text-gray-500">Professor</div>
                                        <div class="text-sm font-medium text-gray-900 font-bold mt-1">Jane Cooper</div>
                                        <div class="flex mt-4">
                                            <div class="border-2 rounded-full w-8 h-8 border-f mr-2">
                                                <i class="fa-brands fa fa-facebook-f color-f w-full h-full text-center leading-7"></i>
                                            </div>
                                            <div class="border-2 rounded-full w-8 h-8 border-tw mr-2">
                                                <i class="fa-brands fa fa-twitter color-tw w-full h-full text-center leading-7"></i>
                                            </div>
                                            <div class="border-2 rounded-full w-8 h-8 border-gp mr-2">
                                                <i class="fa-brands fa fa-google-plus color-gp w-full h-full text-center leading-7"></i>
                                            </div>
                                            <div class="border-2 rounded-full w-8 h-8 border-wa mr-2">
                                                <i class="fa-brands fa fa-whatsapp color-wa w-full h-full text-center leading-7"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-8 text-sm">
                                    With 14+ years of overall engineering experience, I have found my passion in
                                    software test automation. In the process Python has become my favorite tool to work
                                    with. I graduated with a MS degree in Mechanical Engineering from San Jose State
                                    University, and got into the IT field of software test automation. I have as much
                                    passion for teaching as I do for learning. I hope to help students grow fast and
                                    advance in the field of software testing and automation.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane mt-8" id="review">
                        <div class="mt-2">
                            <h2 class="text-black fw-900 font-black text-xl font-mul">Review</h2>

                            <div id="comment-container">
                                <div id="comment-form-container">
                                    <div class="border rounded-md p-8 my-8">
                                        <form class="simple_form w-full" id="new-comment-form" novalidate="novalidate" accept-charset="UTF-8" data-remote="true" method="post" data-dashlane-rid="5f183d72891b1516" data-form-type="contact">
                                            <div>
                                                <h2 class="text-black fw-900 font-bold text-base font-mul">Rating</h2>
                                                <div class="w-full inline-block">
                                                    <div class="rating-input width-max">
                                                        <input type="hidden" name="comment[rating]" value="">
                                                        <span class=""><input class="rating-input" type="radio" value="5" name="comment[rating]" id="comment_rating_5" data-dashlane-rid="3a463bf61ae0f97b" data-form-type="other"><label for="comment_rating_5"></label></span>

                                                        <span class=""><input class="rating-input" type="radio" value="4" name="comment[rating]" id="comment_rating_4" data-dashlane-rid="497668f5cd6d19f4" data-form-type="other"><label for="comment_rating_4"></label></span>

                                                        <span class=""><input class="rating-input" type="radio" value="3" name="comment[rating]" id="comment_rating_3" data-dashlane-rid="76184e2a7ccbff16" data-form-type="other"><label for="comment_rating_3"></label></span>

                                                        <span class=""><input class="rating-input" type="radio" value="2" name="comment[rating]" id="comment_rating_2" data-dashlane-rid="d010ffde94ddce38" data-form-type="other"><label for="comment_rating_2"></label></span>

                                                        <span class=""><input class="rating-input" type="radio" value="1" name="comment[rating]" id="comment_rating_1" data-dashlane-rid="1ad10248812cddac" data-form-type="other"><label for="comment_rating_1"></label></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="my-4">
                                                <h2 class="text-black fw-900 font-bold text-base font-mul">Your review</h2>
                                                <label class="text optional label text-left w-full hidden" for="comment_message">Description</label>
                                                <textarea class="placeholder-gray-500 p-4 text optional input my-2 w-full rounded-lg font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800" placeholder="Commenting publicly as Guys Developer" name="comment[message]" id="comment_message" data-dashlane-rid="b87d632607dec86a" data-form-type="other"></textarea>
                                            </div>
                                            <div class="input hidden comment_product_id"><input value="99" class="hidden" type="hidden" name="comment[product_id]" id="comment_product_id"></div>
                                            <input type="submit" name="commit" value="Submit" class="px-8 text-sm font-black py-2 bg-white shadow-md rounded-full mx-auto text-center f5 font-josesans color-fade cursor-pointer" data-disable-with="Submit" data-dashlane-rid="4a4871ca8a8a9eee" data-form-type="action">
                                        </form>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@push('js')

@endpush
