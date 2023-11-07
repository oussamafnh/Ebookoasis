<!-- dashboard/users.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="heading">Users Dashboard</h1>

        <table class="users-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role === 1)
                                Admin
                            @else
                                User
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('Adminusers.destroy', $user->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-button delete-button">Delete Account</button>
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

    .users-table {
        width: 100%;
        border-collapse: collapse;
    }

    .users-table th,
    .users-table td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

    .delete-form {
        display: inline-block;
    }

    .delete-button {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #c82333;
    }
</style>
