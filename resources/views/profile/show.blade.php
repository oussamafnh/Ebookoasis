@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <div class="profile">
        <div class="profile-info">
            <p class="title">My Account :</p>
            <h1 class="profile-name">{{ $user->name }}</h1>
            <p class="profile-email">{{ $user->email }}</p>
            <div class="profile-actions">
                <a href="{{ route('users.showEditForm') }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('users.destroy') }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete your account?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">Delete My Account</button>
                </form>
                <form action="{{ route('users.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
        <div class="liked-books">
            <h2 class="liked-books-title">Liked Books :</h2>
            @if ($ebooks->count() > 0)
                <ul class="ebook-grid">
                    @foreach ($ebooks as $ebook)
                        <li class="ebook-item">
                            <div class="book-card">
                                <img src="{{ $ebook->cover_image }}"
                                    alt="The Great Gatsby Cover" class="book-cover">
                                <div class="book-details">
                                    <h3 class="book-title">{{ $ebook->title }}</h3>
                                    <p class="book-author">By {{ $ebook->author }}</p>
                                    <a href="/ebooks/{{$ebook->id}}" class="btn btn-primary">View Details</a>
                                </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No liked books found.</p>
            @endif
        </div>
    </div>
@endsection
