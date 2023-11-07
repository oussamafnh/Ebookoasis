@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/ebook-search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ebook-index.css') }}">


    <div class="search-results">

        @if ($ebooks->count() > 0)
            <h2 class="search-title">Search Results for "{{ $query }}" :</h2>
            <div class="e-grid">
                <div class="ebook-grid">
                    @foreach ($ebooks as $ebook)
                        <div class="x-book">
                            <p class="content-ebook">
                            <h3 class="ebook-title">{{ $ebook->title }}</h3>
                            <p class="ebook-author">By {{ $ebook->author }}</p>
                            <a href="{{ route('ebooks.show', $ebook) }}" class="btn btn-primary">View Details</a>
                            </p>
                            <div class="x-cover" style="background-image: url({{ $ebook->cover_image }}) ">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="no-resuts">No results found for  "{{ $query }}"  .</p>
        @endif
    </div>
@endsection
