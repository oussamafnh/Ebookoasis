<!-- dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="heading">Admin Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('dashboard.ebooks') }}" class="dashboard-button">
                    <div class="dashboard-button-content">
                        <div class="dashboard-button-label">Total Ebooks</div>
                        <div class="dashboard-button-value">{{ $ebookCount }}</div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('dashboard.users') }}" class="dashboard-button">
                    <div class="dashboard-button-content">
                        <div class="dashboard-button-label">Total Users</div>
                        <div class="dashboard-button-value">{{ $userCount }}</div>
                    </div>
                </a>
            </div>
        </div>
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

    .row {
        display: flex;
        justify-content: space-between;
    }

    .dashboard-button {
        display: block;
        width: 100%;
        text-decoration: none;
        background-color: #007bff;
        color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .dashboard-button:hover {
        background-color: #0056b3;
    }

    .dashboard-button-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .dashboard-button-label {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .dashboard-button-value {
        font-size: 32px;
    }
</style>
