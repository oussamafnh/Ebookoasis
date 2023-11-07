@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="register-container">


        <form class="register-form" method="POST" action="{{ route('users.edit') }}">
            @csrf
            <h2 class="register-title">Edit Profile</h2>


            <div class="input-container">
                <input id="name" type="text" class="form-input" name="name" placeholder="Enter name"
                    value="{{ $user->name }}" required autofocus>
                <span>
                </span>
            </div>

            <div class="input-container">
                <input id="email" type="email" class="form-input" name="email" placeholder="Enter email"
                    value="{{ $user->email }}" required>
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
                Edit
            </button>

        </form>
    </div>
@endsection
