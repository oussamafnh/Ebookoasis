<!-- ebooks/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="heading">Add New Ebook</h1>

        <form action="{{ route('ebooks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" id="cover_image" name="cover_image" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="file_path">Ebook File</label>
                <input type="file" id="file_path" name="file_path" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="date" id="published_at" name="published_at" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

<style>
    .heading {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }
</style>
