@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/error.css') }}">

    <div class="error-page">
        <h1 class="error-code">404</h1>
        <p class="error-message">Oops! The page you are looking for could not be found.</p>
        <a href="/" class="btn btn-primary">Go to Home</a>
    </div>
@endsection
