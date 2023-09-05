<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        
    </style>

    <title>{{ config('app.name', 'RecyTrack') }}</title>

    @vite(['resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
    />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm custom-navbar">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/images/logo1.png" alt="Logo" width="216" height="60">
                </a>
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    RecyTrack
                </a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li> -->
                            <li><a class="nav-link custom-link me-2" href="{{ route('users.index') }}">Gestion Utilisateurs</a></li>
                            <li><a class="nav-link custom-link me-2" href="{{ route('roles.index') }}">Gestion Roles</a></li>
                            <li><a class="nav-link custom-link me-2" href="{{ route('trashType.index') }}">Gestion types de dechets</a></li>
                            <li><a class="nav-link custom-link me-2" href="{{ route('lieux.index') }}">Gestion lieux</a></li>
                            <li>
                                <div class="action">
                                    <div class="profile" onclick="menuToggle();">                                         
                                            <img src="/images/users.png" /><a href="#"></a>   
                                        <!-- {{ Auth::user()->name }} -->
                                    </div>
                                    <div class="menu">
                                        <h3>{{ Auth::user()->name }}</h3>
                                        <ul>
                                        <li>
                                            <img src="/images/user.png" /><a href="#">My profile</a>
                                        </li>
                                        <li>
                                            <img src="/images/exit.png" />
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                <script>
                                function menuToggle() {
                                    const toggleMenu = document.querySelector(".menu");
                                    toggleMenu.classList.toggle("active");
                                }
                                </script>
                            </li>
                        @endguest
                    </ul>
                </div>
    
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>