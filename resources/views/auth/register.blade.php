{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.app')

@section('page_title')
    {{ __('login | register') }}
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/style1.css')}}" />
@endpush

@section('content')
<div class="container active" id="container">
    <div class="form-container sign-up">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Create Account</h1>
            <input type="Username" placeholder="Username" name = 'name'required>
            @error('name')
                <p class = 'text-danger m-0'>{{ $message }}</p>
            @enderror
            <input type="email" placeholder="Email" name = 'email'required>
            @error('email')
                <p class = 'text-danger m-0'>{{ $message }}</p>
            @enderror
            <input type="password" placeholder="Password" name = 'password'required>
            @error('password')
                <p class = 'text-danger m-0'>{{ $message }}</p>
            @enderror
            <input type="password" placeholder="Repeat Password" name = 'password_confirmation'required>
            @error('password_confirmation')
                <p class = 'text-danger m-0'>{{ $message }}</p>
            @enderror
            <button>Sign Up</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <img src="./imgs/logo1.png" alt="logo" style="height: 200px" />
                <h2>Hello, Friend!</h2>
                <p>Enter your personal detail and stare journey with us </p>
                <a href="{{route('login')}}">
                    <button class="hidden" id="{{route('login')}}">Sign in</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('js/logsin.js')}}"></script>
@endpush