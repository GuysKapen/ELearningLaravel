@extends('layouts.frontend.app')

@section('content')
    <div
        class="min-h-screen bg-gray-100 text-gray-900 flex md:flex-wrap lg:flex-no-wrap justify-center py-16 lg:p-16 rounded-lg">
        <div class="xl:w-5/12 lg:w-6/12 w-9/12 m-0 bg-white shadow flex flex-col justify-center items-center py-12">
            <div class="lg:w-6/12 sm:w-8/12 w-11/12 flex flex-col items-center max-w-xs">
                <h1 class="text-2xl xl:text-3xl text-center font-extrabold font-josesans">Register</h1>

                <div class="w-full flex-1 mt-8 flex flex-col items-center">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="max-w-xs relative mx-auto">

                            <div class="input">
                                <label class="required hidden"
                                       for="username"><abbr
                                        title="required">*</abbr>Name</label>

                                <input id="username" type="text"
                                       class="string email required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2 @error('username') is-invalid @enderror"
                                       name="username"
                                       value="{{ old('username') }}" required autocomplete="name" autofocus placeholder="Username">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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
                                        title="required">*</abbr> Password</label>

                                <input id="password-confirm" type="password"
                                       class="string email required w-full px-4 py-3 rounded-lg font-medium bg-gray-100 border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:shadow-md focus:border-gray-400 focus:bg-white my-2"
                                       name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirm">

                            </div>

                            <div class="w-full d-flex justify-content-center">
                                <button type="submit"
                                        class="d-flex d-inline-block text-sm font-roboto font-black outline-none-imp align-items-center duration-500 mt-2 tracking-wide bg-indigo-500 text-gray-100 w-full p-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <i class="fa fa-sign-in mr-3 duration-500"></i>{{ __('Register') }}
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <div class="my-5 border-b text-center flex w-8/12">
                <span class="border-b border-solid flex-grow"></span>
                <div
                    class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                    Or sign up with social media
                </div>
                <span class="border-b border-solid flex-grow"></span>
            </div>


            <div class="lg:w-6/12 sm:w-8/12 flex flex-col items-center w-11/12">

                <a class="link-no-style w-full mb-3 max-w-xs font-bold text-sm shadow-sm rounded-lg py-4 link-no-style bg-indigo-100 hover:bg-indigo-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline mt-2"
                   href="/users/sign_up">
                    <div class="w-full flex justify-center">
                        <button type="submit"
                                class="flex inline-block f6 font-roboto outline-none-imp font-bold items-center duration-500 text-gray-800">
                            <i class="fa fa-facebook mr-3 duration-500"></i>Sign In With Facebook
                        </button>
                    </div>
                </a>

                <a class="link-no-style w-full mb-3 max-w-xs font-bold text-sm shadow-sm rounded-lg py-4 link-no-style bg-indigo-100 hover:bg-indigo-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline mt-2"
                   href="/users/sign_up">
                    <div class="w-full flex justify-center">
                        <button type="submit"
                                class="flex inline-block f6 font-roboto outline-none-imp font-bold items-center duration-500 text-gray-800">
                            <i class="fa fa-google mr-3 duration-500"></i>Sign In With Google
                        </button>
                    </div>
                </a>

                <a class="link-no-style w-full mb-3 max-w-xs font-bold text-sm shadow-sm rounded-lg py-4 link-no-style bg-indigo-100 hover:bg-indigo-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline mt-2"
                   href="{{route('login')}}">
                    <div class="w-full flex justify-center">
                        <button type="submit"
                                class="flex inline-block f6 font-roboto outline-none-imp font-bold items-center duration-500 text-gray-800">
                            <i class="fa fa-user-plus mr-3 duration-500"></i>Sign In
                        </button>
                    </div>
                </a>

            </div>

        </div>

        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat background-login flex items-center">
                <img src="{{asset("images/auth.svg")}}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>

@endsection
