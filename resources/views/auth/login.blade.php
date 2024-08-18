@extends('layouts.app')

@push('css')
    <style>
        main {
            /*min-height: calc(90vh - 40px);*/
        }

        main{
            min-height: calc(100vh - 40px);
            background:  url("/images/banner.jpg") no-repeat center;
            background-size: cover;
        }

    </style>

@endpush

@section('content')
    <div class="container mx-auto p-12">
        <div class="lg:flex mt-24">
            <!-- First Column -->
           

            <!-- Second Column -->
            <div class="lg:w-1/2">
                <div class="w-full">
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4 text-xl">{{ __('Login') }}</div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email"
                                       class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password"
                                       class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                                       name="password" required autocomplete="current-password">

                                @error('password')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input class="mr-2 leading-tight" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="text-sm" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="">
                                <button type="submit"
                                        class="bg-red-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="ml-2 text-sm text-gray-600 hover:underline"
                                       href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
