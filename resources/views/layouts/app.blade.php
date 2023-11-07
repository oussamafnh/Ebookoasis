<!DOCTYPE html>
<html>

<head>
    <title>eBookOasis</title>
</head>

<body>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <header>


        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-logo">
                    <a href="/">
                        <h4>Ebooks<span>Oasis</span></h4>
                    </a>
                </div>
                <div class="navbar-menu" id="open-navbar1">
                    <ul class="navbar-nav">
                        @if (auth()->user() && auth()->user()->role === 1)
                            <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li><a href="{{ route('dashboard.ebooks') }}">Ebooks</a></li>
                            <li><a href="{{ route('dashboard.users') }}">Users</a></li>
                            <li>
                                <form action="{{ route('users.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link btn-link">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="{{ route('ebooks.index') }}">Ebooks</a></li>
                            @auth
                                <li><a href="{{ route('profile') }}">Profile</a></li>
                                <li>
                                    <form action="{{ route('users.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="nav-link btn-link">Logout</button>
                                    </form>
                                </li>
                            @else
                                <li><a href="{{ route('users.showLoginForm') }}">Log in</a></li>
                                <li><a href="{{ route('users.showRegistrationForm') }}">Sign up</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>

        </nav>




    </header>

    <main>
        @yield('content')
    </main>


</body>

</html>
