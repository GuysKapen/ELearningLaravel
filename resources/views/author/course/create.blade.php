@extends('layouts.frontend.app')

@section('title','New category')

@push('css')
@endpush

@section('content')
    <div class="bg-gray-50 py-8">
        <section class="rounded-md background-white-grey shadow-md m-4 pb-4 overflow-hidden">
            <div class="font-bold bg-white flex items-center relative px-4 mb-4">
                <a href="">
                    <div class="flex items-baseline py-3 pr-4 cursor-pointer border-r text-sm">
                        <i class="fa fa-arrow-left mr-2 text-sm"></i>Back
                    </div>
                </a>
                <div class="mx-8 text-sm">
                    New Product
                </div>
            </div>
            <section class="section">
                <form class="simple_form new_product" id="new_product" novalidate="novalidate"
                      enctype="multipart/form-data" action="/products" accept-charset="UTF-8" method="post"
                      data-dashlane-rid="e79702557837d0d6" data-form-type="identity"><input type="hidden"
                                                                                            name="authenticity_token"
                                                                                            value="J5G+sy5JuidmHJLoiilYdkE/ZCIkr7k4GbbVJ6WtiPTfB8M0eG/raQhx78Plnvtza/keD7UpskbsgU0miRpDvA==">


                    <div class="flex background-white-grey">
                        <div class="ml-3 w-9/12">
                            <div class="">


                                <div class="field">
                                    <div class="control">
                                        <label class="block font-semibold" for="input1">Course name</label>
                                        <input id="name"
                                               name="name"
                                               value="{{ old('name', isset($course) ? $course->name : "") }}"
                                               required
                                               class="string required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                               type="text" autofocus placeholder="Course name..."/>
                                    </div>
                                </div>
                                <div class="field mt-5">
                                    <div>
                                        <label class="block font-semibold" for="input1">Description</label>
                                        <textarea id="mce-instance" name="body"
                                                  placeholder="Enter content here"></textarea>
                                    </div>
                                </div>

                                <div class="section mt-5 bg-white sm:rounded-md shadow overflow-hidden">
                                    <div class="">
                                        <div class="p-4 px-2 m-0-imp bg-white border-b border-b-2">
                                            <p class="ml-1 m-0 font-bold">Setting</p>
                                        </div>

                                        <div id="form-meta">
                                            <input type="hidden" name="authenticity_token"
                                                   value="crFehCD75WsS8gf2gdBhBtS7j7XG9jUuXHhWEJa8RGyKJyMDdt20JXyfet3uZ8ID/n31mFdwPlCpT84RuguPJA==">

                                            <div class="flex mb-3 mx-0 tab-view pr-2">

                                                <div
                                                    class="flex-grow mx-0 px-0 border-right bg-gray-50 tabs-panel">

                                                    <div
                                                        class="flex mt-0-imp mx-0 flex cursor-pointer active tab-panel py-2">
                                                        <p class="ml-3 text-base">General</p>
                                                    </div>

                                                    <div
                                                        class="flex mt-1 mx-0 flex cursor-pointer tab-panel py-2">
                                                        <p class="ml-3 text-base">Inventory</p>
                                                    </div>

                                                    <div
                                                        class="flex mx-0 mt-1 flex cursor-pointer tab-panel py-2">
                                                        <p class="ml-3 text-base">Shipping</p>
                                                    </div>

                                                    <div
                                                        class="flex mx-0 mt-1 flex cursor-pointer tab-panel py-2">
                                                        <p class="ml-3 text-base">Linked Products</p>
                                                    </div>

                                                    <div
                                                        class="flex mx-0 mt-1 flex cursor-pointer tab-panel py-2">
                                                        <p class="ml-3 text-base">Attributes</p>
                                                    </div>

                                                    <div
                                                        class="flex mx-0 mt-1 flex cursor-pointer tab-panel py-2">
                                                        <p class="ml-3 text-base">Advances</p>
                                                    </div>

                                                    <div
                                                        class="flex mx-0 flex cursor-pointer tab-panel py-2">
                                                        <p class="ml-3 text-base">More Options</p>
                                                    </div>

                                                    <div
                                                        class="flex mx-0 flex cursor-pointer tab-panel py-2">
                                                        <p class="ml-3 text-base">Extra Properties</p>
                                                    </div>

                                                </div>

                                                <div class="w-8/12 ml-3 mx-0 px-0 tabs-content">
                                                    <!-- General Attribute -->
                                                    <div id="input-general" class="active tab-content ">
                                                        <div class="field">
                                                            <div class="control flex flex-wrap mt-2 justify-start">
                                                                <label class="block font-semibold text-sm mt-2 w-4/12"
                                                                       for="input1">Duration</label>
                                                                <div class="w-8/12">

                                                                    <input id="duration"
                                                                           name="duration"
                                                                           value="{{ old('duration', isset($course) ? $course->duration : "10") }}"
                                                                           required
                                                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                                                           type="number"
                                                                           placeholder="Duration"/>

                                                                    <span
                                                                        class="input-desc">The duration of the course</span>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                                                       for="input1">Maximum Students</label>
                                                                <div class="w-8/12">

                                                                    <input id="duration"
                                                                           name="duration"
                                                                           value="{{ old('duration', isset($course) ? $course->duration : "1000") }}"
                                                                           required
                                                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                                                           type="number"
                                                                           placeholder="Max students"/>

                                                                    <span class="input-desc">Maximum number of students who can enroll the course</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                                                       for="input1">Retake Course</label>
                                                                <div class="w-8/12">

                                                                    <input id="duration"
                                                                           name="duration"
                                                                           value="{{ old('duration', isset($course) ? $course->duration : "10") }}"
                                                                           required
                                                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                                                           type="number"
                                                                           placeholder="Duration"/>

                                                                    <span class="input-desc">How many times the user can re take the course. Set to 0 to disable re-taking</span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                                                       for="input1">Duration Info</label>
                                                                <div class="w-8/12">

                                                                    <input id="duration"
                                                                           name="duration"
                                                                           value="{{ old('duration', isset($course) ? $course->duration : "50 hours") }}"
                                                                           required
                                                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                                                           type="text"
                                                                           placeholder="Duration"/>

                                                                    <span
                                                                        class="input-desc">Display duration info</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                                                       for="input1">Skill Level</label>
                                                                <div class="w-8/12">

                                                                    <input id="duration"
                                                                           name="duration"
                                                                           value="{{ old('duration', isset($course) ? $course->duration : "All level") }}"
                                                                           required
                                                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                                                           type="text"
                                                                           placeholder="Skill level"/>

                                                                    <span class="input-desc">A passable level with this course</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label class="block font-semibold w-4/12 text-sm mt-2"
                                                                       for="input1">Language</label>
                                                                <div class="w-8/12">

                                                                    <input id="duration"
                                                                           name="duration"
                                                                           value="{{ old('duration', isset($course) ? $course->duration : "English") }}"
                                                                           required
                                                                           class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                                                           type="text"
                                                                           placeholder="Duration"/>

                                                                    <span
                                                                        class="input-desc">Language used for studying</span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!-- !General Attribute -->

                                                    <!-- Inventory Input -->
                                                    <div id="input-inventory" class="tab-content ">


                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="text optional label w-4/12 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_inventory_attributes_sku">SKU</label><textarea
                                                                    class="text optional input w-8/12 flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                    placeholder="SKU"
                                                                    name="product[product_meta_attributes][product_inventory_attributes][sku]"
                                                                    id="product_product_meta_attributes_product_inventory_attributes_sku"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="string optional label w-4/12 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_inventory_attributes_Manage Stock">Manage
                                                                    stock</label>
                                                                <div>
                                                                    <input
                                                                        name="product[product_meta_attributes][product_inventory_attributes][manage_stock]"
                                                                        type="hidden" value="0"><input class="input"
                                                                                                       type="checkbox"
                                                                                                       value="1"
                                                                                                       name="product[product_meta_attributes][product_inventory_attributes][manage_stock]"
                                                                                                       id="product_product_meta_attributes_product_inventory_attributes_manage_stock">
                                                                    <span class="f7">Enable manage Stock at product level</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="text optional label w-4/12 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_inventory_attributes_stock_status">Stock
                                                                    Status</label><textarea
                                                                    class="text optional input w-8/12 flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                    placeholder="Status"
                                                                    name="product[product_meta_attributes][product_inventory_attributes][stock_status]"
                                                                    id="product_product_meta_attributes_product_inventory_attributes_stock_status"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="string optional label w-4/12 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_inventory_attributes_Sold individually">Sold
                                                                    individually</label>
                                                                <div>
                                                                    <input
                                                                        name="product[product_meta_attributes][product_inventory_attributes][sold_individually]"
                                                                        type="hidden" value="0"><input class="input"
                                                                                                       type="checkbox"
                                                                                                       value="1"
                                                                                                       name="product[product_meta_attributes][product_inventory_attributes][sold_individually]"
                                                                                                       id="product_product_meta_attributes_product_inventory_attributes_sold_individually">
                                                                    <span class="f7">Enable this to only allow one of the item to be bought in a single order</span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <!-- !Inventory Input -->

                                                    <!-- Shipping Input -->
                                                    <div id="input-inventory" class="tab-content">


                                                        <!-- Weight -->
                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="decimal optional label w-4/12 flex-shrink-0 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_shipping_attributes_weight">Weight
                                                                    (kg)</label><input
                                                                    class="numeric decimal optional input w-8/12 flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                    placeholder="1 kg" type="number" step="any"
                                                                    name="product[product_meta_attributes][product_shipping_attributes][weight]"
                                                                    id="product_product_meta_attributes_product_shipping_attributes_weight">
                                                            </div>
                                                        </div>
                                                        <!-- !Weight -->

                                                        <!-- Dimensions -->
                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label for="" class="w-4/12 flex-shrink-0 text-left">Dimensions</label>

                                                                <div
                                                                    class="w-8/12 flex-grow m-0 p-0 flex justify-between">
                                                                    <div class="field w-4/12 column is-4 pl-0 pr-2">
                                                                        <div class="control">
                                                                            <!--                      <label class="label">Brand</label>-->
                                                                            <div class="control">
                                                                                <label class="decimal optional hidden"
                                                                                       for="product_product_meta_attributes_product_shipping_attributes_width">Width</label><input
                                                                                    class="numeric decimal optional input w-full  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                                    placeholder="Width" type="number"
                                                                                    step="any"
                                                                                    name="product[product_meta_attributes][product_shipping_attributes][width]"
                                                                                    id="product_product_meta_attributes_product_shipping_attributes_width">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="field w-4/12 column is-4 pr-2">
                                                                        <div class="control">
                                                                            <!--                      <label class="label">Finish</label>-->
                                                                            <div class="control">
                                                                                <label class="decimal optional hidden"
                                                                                       for="product_product_meta_attributes_product_shipping_attributes_height">Height</label><input
                                                                                    class="numeric decimal optional input w-full  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                                    placeholder="Height" type="number"
                                                                                    step="any"
                                                                                    name="product[product_meta_attributes][product_shipping_attributes][height]"
                                                                                    id="product_product_meta_attributes_product_shipping_attributes_height">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="field w-4/12 column is-4 pr-0">
                                                                        <div class="control">
                                                                            <!--                      <label class="label">Condition</label>-->
                                                                            <div class="control">
                                                                                <label class="decimal optional hidden"
                                                                                       for="product_product_meta_attributes_product_shipping_attributes_length">Length</label><input
                                                                                    class="numeric decimal optional input w-full  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                                    placeholder="Length" type="number"
                                                                                    step="any"
                                                                                    name="product[product_meta_attributes][product_shipping_attributes][length]"
                                                                                    id="product_product_meta_attributes_product_shipping_attributes_length">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- !Dimensions -->

                                                        <!-- Shipping Class -->
                                                        <div class="field mt-2">
                                                            <div class="control flex items-center">
                                                                <label
                                                                    class="string optional label w-4/12 flex-shrink-0 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_shipping_attributes_shipping_class">Shipping
                                                                    class</label><input
                                                                    class="string optional input flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                    placeholder="Class" type="text"
                                                                    name="product[product_meta_attributes][product_shipping_attributes][shipping_class]"
                                                                    id="product_product_meta_attributes_product_shipping_attributes_shipping_class">
                                                                <div class="w-2/12 text-right align-self-center">
                                                                    <span class="icon is-small is-right"><i
                                                                            class="fa fa-tag"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- !Shipping Class -->


                                                    </div>
                                                    <!-- !Shipping Input -->

                                                    <!-- Linked Product -->
                                                    <div id="input-inventory" class="tab-content">

                                                        <label class="string optional label text-left block"
                                                               for="product_product_meta_attributes_product_linked_attributes_product_upsell_ids_string">Products
                                                            Upsells</label><input
                                                            class="string optional input tags upsell w-8/12 flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                            placeholder="Upsells" type="text"
                                                            name="product[product_meta_attributes][product_linked_attributes][product_upsell_ids_string]"
                                                            id="product_product_meta_attributes_product_linked_attributes_product_upsell_ids_string"
                                                            style="display: none;">
                                                        <div class="amsify-suggestags-area">
                                                            <div
                                                                class="amsify-suggestags-input-area string optional input tags upsell w-8/12 flex-grow w-full py-2 font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800">
                                                                <input type="text" class="amsify-suggestags-input"
                                                                       placeholder="Upsells" autocomplete="off"></div>
                                                            <div class="amsify-suggestags-list">
                                                                <ul class="amsify-list">
                                                                    <li class="amsify-list-item"
                                                                        data-val="Samsung Galaxy SS">Samsung Galaxy SS
                                                                    </li>
                                                                    <li class="amsify-list-item"
                                                                        data-val="Samsung Galaxy S21">Samsung Galaxy S21
                                                                    </li>
                                                                    <li class="amsify-list-item"
                                                                        data-val="Samsung Galaxy S21">Samsung Galaxy S21
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <label class="string optional label text-left block mt-3"
                                                               for="product_product_meta_attributes_product_linked_attributes_product_cross_sell_ids_string">Products
                                                            Cross sells</label><input
                                                            class="string optional input tags cross-sell w-8/12 flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                            placeholder="Cross sells" type="text"
                                                            name="product[product_meta_attributes][product_linked_attributes][product_cross_sell_ids_string]"
                                                            id="product_product_meta_attributes_product_linked_attributes_product_cross_sell_ids_string"
                                                            style="display: none;">
                                                        <div class="amsify-suggestags-area">
                                                            <div
                                                                class="amsify-suggestags-input-area string optional input tags cross-sell w-8/12 flex-grow w-full py-2 font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800">
                                                                <input type="text" class="amsify-suggestags-input"
                                                                       placeholder="Cross sells" autocomplete="off">
                                                            </div>
                                                            <div class="amsify-suggestags-list">
                                                                <ul class="amsify-list">
                                                                    <li class="amsify-list-item"
                                                                        data-val="Samsung Galaxy SS">Samsung Galaxy SS
                                                                    </li>
                                                                    <li class="amsify-list-item"
                                                                        data-val="Samsung Galaxy S21">Samsung Galaxy S21
                                                                    </li>
                                                                    <li class="amsify-list-item"
                                                                        data-val="Samsung Galaxy S21">Samsung Galaxy S21
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- !Linked Product -->

                                                    <!-- Attributes -->
                                                    <div id="input-inventory" class="tab-content flex flex-col h-full">
                                                        <div class="flex flex-col h-full">
                                                            <div class="field mt-2">
                                                                <div class="control flex mt-2 justify-start">
                                                                    <div>
                                                                        <div id="button-add-attribute"
                                                                             class="custom-btn-normal ml-2 f6 h-full">
                                                                            Add
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="field mt-2 flex-grow">
                                                                <div class="flex flex-col align-items-start">

                                                                    <hr class="my-2 w-full">
                                                                    <div id="product-attributes-container"
                                                                         class="w-full">

                                                                    </div>

                                                                    <div id="group-container-form-add-attributes"
                                                                         class="w-full"></div>

                                                                    <!-- Save Attributes -->
                                                                    <div class="button-wishlist flex px-3 width-max"
                                                                         id="button-save-attributes">
                                                                        <div
                                                                            class="flex font-roboto outline-none-imp font-bold items-center duration-500">
                                                                            <i class="fa fa-heart mr-3 duration-500"></i>Save
                                                                            Attributes
                                                                        </div>
                                                                    </div>
                                                                    <!-- !Save Attributes -->

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- !Attributes -->

                                                    <!-- Advanced -->
                                                    <div id="input-inventory" class="tab-content">

                                                        <!-- Purchase note -->
                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="text optional label w-4/12 flex-shrink-0 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_advanced_attributes_purchase_note">Purchase
                                                                    note</label><textarea
                                                                    class="text optional input w-8/12 flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                    name="product[product_meta_attributes][product_advanced_attributes][purchase_note]"
                                                                    id="product_product_meta_attributes_product_advanced_attributes_purchase_note"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- !Purchase note -->

                                                        <!-- Reviews? -->
                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="string optional label w-4/12 flex-shrink-0 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_advanced_attributes_Enable reviews">Enable
                                                                    reviews</label>
                                                                <div>
                                                                    <input
                                                                        name="product[product_meta_attributes][product_advanced_attributes][enable_reviews]"
                                                                        type="hidden" value="0"><input class="input"
                                                                                                       type="checkbox"
                                                                                                       value="1"
                                                                                                       name="product[product_meta_attributes][product_advanced_attributes][enable_reviews]"
                                                                                                       id="product_product_meta_attributes_product_advanced_attributes_enable_reviews">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- !Reviews? -->
                                                    </div>
                                                    <!-- !Advanced -->

                                                    <!-- More options -->
                                                    <div id="input-inventory" class="tab-content">

                                                        <!-- Purchase note -->
                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="text optional label w-4/12 flex-shrink-0 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_advanced_attributes_purchase_note">Purchase
                                                                    note</label><textarea
                                                                    class="text optional input w-8/12 flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                    name="product[product_meta_attributes][product_advanced_attributes][purchase_note]"
                                                                    id="product_product_meta_attributes_product_advanced_attributes_purchase_note"></textarea>
                                                            </div>
                                                        </div>
                                                        <!-- !Purchase note -->

                                                        <!-- Reviews? -->
                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="string optional label w-4/12 flex-shrink-0 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_advanced_attributes_Enable reviews">Enable
                                                                    reviews</label>
                                                                <div>
                                                                    <input
                                                                        name="product[product_meta_attributes][product_advanced_attributes][enable_reviews]"
                                                                        type="hidden" value="0"><input class="input"
                                                                                                       type="checkbox"
                                                                                                       value="1"
                                                                                                       name="product[product_meta_attributes][product_advanced_attributes][enable_reviews]"
                                                                                                       id="product_product_meta_attributes_product_advanced_attributes_enable_reviews">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- !Reviews? -->
                                                    </div>
                                                    <!-- !More options -->

                                                    <!-- Extra -->
                                                    <div id="input-inventory" class="tab-content">

                                                        <!-- Custom bubble -->
                                                        <!--                    <div class="field mt-2">-->
                                                        <!--                      <div class="control flex mt-2 justify-start">-->
                                                        <!--                      </div>-->
                                                        <!--                    </div>-->
                                                        <!-- !Custom bubble -->

                                                        <!-- Custom bubble title -->
                                                        <!--                    <div class="field mt-2">-->
                                                        <!--                      <div class="control flex mt-2 justify-start">-->
                                                        <!--                      </div>-->
                                                        <!--                    </div>-->

                                                        <!-- !Custom bubble title -->

                                                        <!-- Product Video -->
                                                        <div class="field mt-2">
                                                            <div class="control flex mt-2 justify-start">
                                                                <label
                                                                    class="text optional label w-4/12 flex-shrink-0 flex-shrink-0 text-left"
                                                                    for="product_product_meta_attributes_product_extra_attributes_product_video">Product
                                                                    Video</label><textarea
                                                                    class="text optional input w-8/12 flex-grow w-full py-2  font-medium bg placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800"
                                                                    name="product[product_meta_attributes][product_extra_attributes][product_video]"
                                                                    id="product_product_meta_attributes_product_extra_attributes_product_video"></textarea>
                                                            </div>
                                                        </div>

                                                        <!-- !Product Video -->

                                                    </div>
                                                    <!-- !Extra -->

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <section class="mx-3 child-bg-white">
                            <!-- Public -->
                            <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md">
                                <div class="p-1 py-2 m-0-imp bg-white">
                                    <p class="ml-1 f4 m-0 font-bold">Publish</p>
                                </div>

                                <div class="border-bottom mb-4">
                                    <div class="mx-0 mt-3 flex cursor-pointer text-base">
                                        <span class="f5 fw3">Status: &nbsp;</span><span class="font-bold">Draft</span>
                                    </div>
                                    <div class="mx-0 mt-3 flex cursor-pointer text-base">
                                        <span class="f5 fw3">Visibility: &nbsp;</span><span
                                            class="font-bold">Public</span>
                                    </div>
                                    <div class="mx-0 mt-3 flex cursor-pointer text-base">
                                        <span class="f5 fw3">Publish: &nbsp;</span><span
                                            class="font-bold">Immediately</span>
                                    </div>
                                </div>

                                <div class="flex justify-between py-3 items-center m-0-imp px-2 mt-4">
                                    <a href="" class="text-sm text-red-600">Move to trash</a>
                                    <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                            <!-- !Public -->

                            <!-- Product categories -->
                            <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md mt-8">
                                <div class="p-1 py-2 m-0-imp bg-white">
                                    <p class="f4 m-0 ml-1 font-bold">Product categories</p>
                                </div>
                                <div class="border mt-3 p-2">
                                    <div class="flex text-base">
                                        <div>All categories</div>
                                        <div class="ml-2">Most used</div>
                                    </div>
                                    <div id="container-product-form-categories" class="mt-2">
                                        <input type="hidden" name="product[category_ids][]" value="">
                                    </div>
                                </div>

                                <div class="my-3" id="add_new_category">
                                    <div id="add_new_category" class="f6 flex cursor-pointer items-center text-sm">
                                        <i class="fa fa-plus"></i><span class="ml-1">Add new category</span>
                                    </div>
                                    <div class="mt-2">
                                        <div id="container-new-category" class=" hidden">
                                            <input type="text" name="category_name" id="input_new_category"
                                                   placeholder="New Category"
                                                   class="w-full px-2 py-1 font-medium border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white placeholder-gray-800 my-2">
                                            <div class="inline-block">
                                                <div id="btn-add-new-category"
                                                     class="custom-btn-normal inline-block f6">Add new category
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- !Product categories -->

                            <!-- Product Tag -->
                            <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md mt-4">
                                <div class="p-1 py-2 m-0-imp bg-white">
                                    <p class="f4 ml-1 m-0 font-bold font-josesans">Product Tags</p>
                                </div>

                                <div class="px-2">
                                    <div class="my-4 flex">
                                        <input placeholder="Tags" type="text"
                                               class="string required block px-4 py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white"
                                               data-dashlane-rid="d883f4e36d5d2b8b" data-form-type="other">

                                        <button type="submit"
                                                class="inline-flex justify-center ml-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Add
                                        </button>
                                    </div>
                                    <div class="my-3 custom-btn-wide rounded-extra-lg width-max text-base">Choose from
                                        the most
                                        used
                                    </div>
                                </div>

                            </div>
                            <!-- !Product Tag -->

                            <!-- Product image -->
                            <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md mt-4">
                                <div class="p-1 py-2 m-0-imp bg-white">
                                    <p class="f4 ml-1 m-0 font-bold font-josesans">Product Image</p>
                                </div>
                                <p class="custom-btn-wide rounded-extra-lg my-3 text-base inline-block" href="#">Set
                                    product
                                    image</p>
                            </div>
                            <!-- !Product image -->

                            <!-- Product gallery -->
                            <div class="relative child-mx-4 overflow-hidden shadow bg-gray-50 sm:rounded-md mt-4">
                                <div class="p-1 py-2 m-0-imp bg-white">
                                    <p class="f4 ml-1 m-0 font-bold font-josesans">Product Gallery</p>
                                </div>
                                <p class="custom-btn-wide rounded-extra-lg my-3 text-base inline-block" href="#">Set
                                    product gallery</p>
                            </div>
                            <!-- !Product gallery -->


                        </section>

                    </div>
                </form>


            </section>


        </section>
    </div>
    {{--    <div class="card my-8 w-1/2 mx-auto shadow-lg rounded-md py-16 px-8">--}}
    {{--        <div class="header">--}}
    {{--            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate text-center">--}}
    {{--                Add new course--}}
    {{--            </h2>--}}
    {{--        </div>--}}

    {{--        <div class="mt-8">--}}
    {{--            @include('author.course._form')--}}
    {{--        </div>--}}

    {{--    </div>--}}
@endsection

@push('js')
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
                    {{--editor.setContent('{!! $courseLesson->body !!}');--}}
                });
            }
        });
    </script>
@endpush
