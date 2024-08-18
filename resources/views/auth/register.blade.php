@extends('layouts.app')

@push('css')
    <style>
        main {
            /*min-height: calc(90vh - 40px);*/
        }

        main{
            min-height: calc(100vh - 40px);
            background: url("/images/banner.jpg") no-repeat center;
            background-size: cover;
        }

    </style>

@endpush

@section('content')
    <div class="container mx-auto p-12 px-24">
        <div class="lg:flex">
            <!-- First Column -->
            <div class="lg:w-1/2">
                <!-- Content for the first column -->
                
            </div>
            <!-- Second Column -->
            <div class="lg:w-1/2">
                <div class="w-full">
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4 text-xl">{{ __('Register') }}</div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="name"
                                       class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>

                                <input id="name" type="text"
                                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                                       name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email"
                                       class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>

                                <input id="email" type="email"
                                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
                                <select id="country" name="country" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" required>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-4">
                                <label for="password"
                                       class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                                       name="password" required autocomplete="new-password">

                                @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm"
                                       class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password"
                                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="bg-red-600 hover:bg-blue-800 text-white py-2 px-4 rounded w-full">
                                    {{ __('Register') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="mt-2 text-sm text-gray-600 hover:underline"
                                       href="{{ route('login') }}">
                                        Already Have an account?? Login Instead
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
