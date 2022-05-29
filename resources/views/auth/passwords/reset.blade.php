@extends('layouts.frontend.app')

@section('content')
    <div
        class="min-h-screen bg-gray-100 text-gray-900 flex md:flex-wrap lg:flex-no-wrap justify-center py-16 lg:p-16 rounded-lg">
        <div class="xl:w-5/12 lg:w-6/12 w-9/12 m-0 bg-white shadow flex flex-col justify-center items-center py-12">
            <div class="lg:w-6/12 sm:w-8/12 w-11/12 flex flex-col items-center max-w-xs">
                <h1 class="text-2xl xl:text-3xl text-center font-extrabold font-josesans">Reset Password</h1>
            </div>

            <div class="lg:w-6/12 sm:w-8/12 flex flex-col items-center w-11/12 mt-8">

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="max-w-xs relative mx-auto">

                        <div class="input email required user_email">
                            <label class="email required hidden"
                                   for="user_email"><abbr
                                    title="required">*</abbr> Email</label>


                            <input id="email" type="email"
                                   class="string email required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                        </div>

                        <div class="input password required user_password">

                            <label class="password required hidden"
                                   for="user_password"><abbr
                                    title="required">*</abbr> Password</label>

                            <input id="password" type="password"
                                   class="string email required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2
                                   @error('password') is-invalid @enderror" name="password" placeholder="Password"
                                   required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>

                        <div class="input required user_password">

                            <label class="password required hidden"
                                   for="password-confirm"><abbr
                                    title="required">*</abbr>Confirm Password</label>

                            <input id="password-confirm" type="password"
                                   class="string email required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Password Confirm">

                        </div>

                        <div class="w-full d-flex justify-content-center">

                            <button type="submit"
                                    class="d-flex d-inline-block text-sm font-roboto font-black outline-none-imp align-items-center duration-500 mt-2 tracking-wide bg-indigo-500 text-gray-100 w-full p-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <i class="fa fa-sign-in mr-3 duration-500"></i>{{ __('Reset') }}
                            </button>

                        </div>

                    </div>
                </form>
            </div>

        </div>

        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat background-login flex items-center">
                <img src="{{asset("images/reset.svg")}}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>

@endsection
