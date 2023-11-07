<!-- dashboard/ebooks.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="heading">Ebooks Dashboard</h1>


        <a href="{{ route('xxl') }}" class="btn btn-primary">Add New Ebook</a>

        <table class="ebooks-table">
            <thead>
                <tr>
                    <th>Cover Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Likes</th>
                    <th>Reviews</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ebooks as $ebook)
                    <tr>
                        <td>
                            <img src="{{ $ebook->cover_image }}" alt="{{ $ebook->title }}" class="cover-image">
                        </td>
                        <td>{{ $ebook->title }}</td>
                        <td>{{ $ebook->author }}</td>
                        <td>{{ $ebook->likes_count }}</td>
                        <td>{{ $ebook->reviews_count }}</td>
                        <td>
                            <a href="{{ route('ebooks.showX', $ebook->id) }}" class="action-button">View</a>
                            <a href="{{ route('ebooks.edit', $ebook->id) }}" class="action-button">Edit</a>
                            <form action="{{ route('ebooks.destroy', $ebook->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-button delete-button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .heading {
        text-align: center;
        margin-bottom: 30px;
    }

    .ebooks-table {
        width: 100%;
        border-collapse: collapse;
    }

    .ebooks-table th,
    .ebooks-table td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

    .cover-image {
        width: 80px;
        height: 120px;
        object-fit: cover;
    }

    .action-button {
        display: inline-block;
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .action-button:hover {
        background-color: #0056b3;
    }
    .delete-form {
        display: inline-block;
    }

    .delete-button {
        background-color: #dc3545;
    }
</style>
