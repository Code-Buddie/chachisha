@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
                <div class="bg-white p-8 mt-10 border rounded-lg shadow-md">
                    <div class="text-2xl font-semibold mb-6">{{ __('Reset Password') }}</div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-input mt-1 block w-full @error('email') border-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-input mt-1 block w-full @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="block text-sm font-medium text-gray-600">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-input mt-1 block w-full" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
