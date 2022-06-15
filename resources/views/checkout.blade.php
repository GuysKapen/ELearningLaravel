@extends('layouts.frontend.app')

@section('title','Course')

@push('css')
    <style>
        form#payment-form {
            width: 30vw;
            min-width: 500px;
            align-self: center;
            box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
            0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
            border-radius: 7px;
            padding: 40px;
        }

        #payment-message {
            color: rgb(105, 115, 134);
            font-size: 16px;
            line-height: 20px;
            padding-top: 12px;
            text-align: center;
        }

        #payment-element {
            margin-bottom: 24px;
        }

        /* Buttons and links */
        #payment-form button {
            background: #5469d4;
            font-family: Arial, sans-serif;
            color: #ffffff;
            border-radius: 4px;
            border: 0;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: block;
            transition: all 0.2s ease;
            box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            width: 100%;
        }

        #payment-form button:hover {
            filter: contrast(115%);
        }

        #payment-form button:disabled {
            opacity: 0.5;
            cursor: default;
        }

        /* spinner/processing state, errors */
        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }

        #payment-form .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }

        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }

        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            background: #5469d4;
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }

        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: #5469d4;
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }

        @-webkit-keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @media only screen and (max-width: 600px) {
            form {
                width: 80vw;
                min-width: initial;
            }
        }
    </style>
@endpush

@section('content')
    <script src="https://js.stripe.com/v3/"></script>
    <div class="flex border-t">
        <div class="w-8/12 py-24 flex items-center justify-center">
            <!-- Display a payment form -->
            <form id="payment-form">
                <h2 class="text-black fw-900 font-black text-2xl font-mul mb-8">Payment</h2>

                <div class="field my-6">
                    <div class="mt-2">
                        <label class="block font-semibold w-4/12 text-sm mt-2"
                               for="name">Name on card</label>
                        <input id="card-holder-name"
                               name="name"
                               class="string block px-4 w-full py-2 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                               type="text"
                               placeholder="Name on card"/>

                    </div>
                </div>

                <div id="payment-element">
                    <!--Stripe.js injects the Payment Element-->
                </div>
                <button id="card-button">
                    <div class="spinner hidden" id="spinner"></div>
                    <span id="button-text">Pay now</span>
                </button>
                <div id="payment-message" class="hidden"></div>
            </form>
        </div>
        <div class="w-4/12 border-l">
            <div class="border-b p-8">
                <h2 class="text-black fw-900 font-black text-2xl font-mul mb-8">Order summary</h2>
                <div class="flex">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ asset("storage/course/". ($course->feature_img ?? "default.png") ) }}"
                             alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-semibold text-gray-800">{{$course->name}}</p>
                        <p
                            class="mt-2 text-gray-500 text-sm">{{isset($course->coursePrice->price) ? "$" . $course->coursePrice->price : "Free"}}</p>
                    </div>
                </div>
            </div>
            <div class="p-8">
                <table class="w-full">
                    <tr class="">
                        <td class="py-2 text-sm font-semibold text-gray-600">Sub total</td>
                        <td class="py-2 text-right text-sm text-gray-600">$19.00</td>
                    </tr>
                    <tr class="py-2">
                        <td class="py-2 text-sm font-semibold text-gray-600">Tax</td>
                        <td class="py-2 text-right text-sm text-gray-600">$1.20</td>
                    </tr>
                    <tr class="">
                        <td class="py-2 text-sm font-semibold text-gray-600">Shipping</td>
                        <td class="py-2 text-right text-sm text-gray-600">$0.00</td>
                    </tr>
                    <tr class="">
                        <td class="py-2 text-base font-black text-gray-900">Total</td>
                        <td class="py-2 text-right font-black text-sm text-gray-900">$20.20</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        let stripe = Stripe('pk_test_51L8gBdC1Xm2TcoPuK2ppopbFoIjX1hJfNrQDIMH119YeygYEQTw0kUMskdAhdP8ifIXzCix3esrr4bpX8QDxxX0e005fxTYEth');

        let elements = stripe.elements();

        let card = elements.create('card');

        // Add an instance of the card UI component into the `card-element` <div>
        card.mount('#payment-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();
            const {paymentMethod, error} = await stripe.createPaymentMethod(
                'card', card, {
                    billing_details: {name: cardHolderName.value}
                }
            );

            if (error) {
                toastr.error("Failed to purchase", "Error")
                // Display "error.message" to the user...
                console.log(error.message)
            } else {
                // The card has been verified successfully...
                const formData = {
                    _token: "{{ csrf_token() }}",
                    payment_method_id: paymentMethod.id,
                    course_id: "{{$course->id}}",
                };
                $.ajax({
                    type: "POST",
                    url: "{!! route('course.purchase') !!}",
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            window.location.replace("{{route("course.detail", $course->id)}}");
                        }
                    },
                    error: function (error) {
                        toastr.error("Purchase failed", "Failed")
                    }
                });

            }
        });
    </script>
@endpush
