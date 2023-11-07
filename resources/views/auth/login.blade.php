@extends('layouts.app')

@section('content')
<style>

.alert {
  animation: hideAlert 7s forwards;
  /* set the animation duration to 3 seconds and keep the last keyframe state */
}

@keyframes hideAlert {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    display: none;
  }
}
</style>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div >
        @error('email')

        <div>
            <div style="width: 400px " class="alert alert-danger position-absolute" role="alert">
                {{ $message }}
              </div>
        </div>

    @enderror
    {{-- @error('password')
    <div>
        <div style="width: 400px" class="alert alert-danger position-absolute" role="alert">
            {{ $message }}
          </div>
    </div>

    @enderror --}}

    </div>
    <div class="login-container">

        <form class="form" method="POST" action="{{ route('users.login') }}">
            @csrf
            <h2 class="login-title">Log in to eBookOasis</h1>

            <div class="input-container">
                <input id="email" type="email" name="email" placeholder="Enter email" required autocomplete="email"
                    autofocus>
                <span>
                </span>

            </div>

            <div class="input-container">
                <input id="password" type="password" class="form-input" name="password" placeholder="Enter password"
                    required autocomplete="current-password">

            </div>
            <button type="submit" class="submit">
              Log in
          </button>

            <div class="form-group">
                @if (Route::has('password.request'))
                    <a class="forgot-password-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                @endif
            </div>
            <p class="signup-link">
              No account?
              <a href="{{ route('users.showRegistrationForm') }}">Sign up</a>
          </p>
        </form>
    </div>

@endsection
