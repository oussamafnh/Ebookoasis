@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="register-container">


        <form class="register-form" method="POST" action="{{ route('users.register') }}">
            @csrf
            <h2 class="register-title">Sign Up in eBookOasiss</h2>


            <div class="input-container">
                <input id="name" type="text" class="form-input" name="name" placeholder="Enter name" required
                    autofocus>
                <span>
                </span>
            </div>

            <div class="input-container">
                <input id="email" type="email" class="form-input" name="email" placeholder="Enter email" required>
            </div>

            <div class="input-container">
                <input id="password" type="password" class="form-input" name="password" placeholder="Enter password"
                    required>
            </div>

            <div class="input-container">
                <input id="password" type="password" class="form-input" name="password_confirmation"
                    placeholder="Confirm your password" required>
            </div>

            <button type="submit" class="submit">
                Sign up
            </button>
            <p class="login-link">
                Allready have an account?
                <a href="{{ route('users.showLoginForm') }}">Log in</a>
            </p>
        </form>
    </div>
@endsection
