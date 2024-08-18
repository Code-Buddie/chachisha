@extends('layouts.app')

@section('css')
    <style>
        main {
            min-height: calc(90vh - 40px);
        }

    </style>

@endsection

@section('content')
    <div class="container mx-auto py-5">
        <div class="lg:flex">
            <!-- First Column -->
            <div class="lg:w-1/2">
                <!-- Content for the first column -->
               
            </div>
            <!-- Second Column -->
            <div class="lg:w-1/2">
                <div class="w-full max-w-md">
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="text-2xl font-semibold mb-6">{{ __('Reset Password') }}</div>

                        @if (session('status'))
                            <div class="alert alert-success mb-4" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email"
                                       class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                       class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center mt-6">
                                <button type="submit"
                                        class="bg-red-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
