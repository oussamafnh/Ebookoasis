@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/error.css') }}">
    <div class="error-page">
        <h1 class="error-code">500</h1>
        <p class="error-message">Oops! Something went wrong on the server.</p>
        <p class="error-description">We apologize for the inconvenience. Please try again later.</p>
        <a href="/" class="btn btn-primary">Go to Home</a>
    </div>
@endsection
