<!-- ebooks/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Ebook</h1>

        <form action="{{ route('ebooks.update', $ebook->id) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $ebook->title }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="{{ $ebook->author }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $ebook->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="text" name="cover_image" id="cover_image" value="{{ $ebook->cover_image }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="file_path">File Path</label>
                <input type="text" name="file_path" id="file_path" value="{{ $ebook->file_path }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="number" name="published_at" id="published_at" value="{{ $ebook->published_at }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
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

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    .edit-form {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-primary {
        display: block;
        width: 100%;
        max-width: 200px;
        margin: 20px auto;
        padding: 10px 20px;
        font-size: 18px;
        background-color: #007bff;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
    textarea {
        height: 150px;
    }
</style>
