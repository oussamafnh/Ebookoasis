@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/ebook-index.css') }}">
    <div class="ebook-index">
        <div class="ebook-header">
            <p class="title">eBook Collection</p>
            <form class="search-bar" action="{{ route('search') }}" method="GET">
                <input type="text" name="query" class="form__email" placeholder="Search..." />
                <button type="submit" class="form__button">Search</button>
            </form>

        </div>
        <div class="e-grid">
            <div class="ebook-grid">
                @foreach ($ebooks as $ebook)

                    <div class="x-book">
                        <p class="content-ebook">
                        <h3 class="ebook-title">{{ $ebook->title }}</h3>
                        <p class="ebook-author">By {{ $ebook->author }}</p>
                        <a href="{{ route('ebooks.showX', $ebook) }}" class="btn btn-primary">View Details</a>
                        </p>
                        <div class="x-cover" style="background-image: url({{ $ebook->cover_image }}) ">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br><br>

    @endsection
