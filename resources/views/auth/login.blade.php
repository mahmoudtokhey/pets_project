@extends('layouts.app')

@section('page_title')
    {{ __('login | register') }}
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/style1.css')}}" />
@endpush

@section('content')
<div class="container" id="container">
    <div class="form-container sign-in">
        <form method="POST" action="{{ route('login') }}">
            <h1>Sign in</h1>
            @csrf
            <input type="email" placeholder="Email" name = 'email' required autocomplete="username">
            @error('email')
                <p class ='text-danger m-0'>{{ $message }}</p>
            @enderror
            <input type="password" placeholder="Password" name = 'password' required autocomplete="current-password">
            @error('password')
                <p class ='text-danger m-0'>{{ $message }}</p>
            @enderror
            <button>Sign In</button>
            <p>Or</p>
            <a href="{{url('/')}}">Continue As Guest</a>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <img src="./imgs/logo1.png" alt="logo" style="height: 200px" />
                <h2>Welcome Back!</h2>
                <p>to keep connecting with us please login with your info</p>
                <a href="{{route('register')}}">
                    <button class="hidden" id="{{route('login')}}">Sign up</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('js/logsin.js')}}"></script>
@endpush
