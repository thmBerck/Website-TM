<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="{{ asset('css/app.css') }}">-->
</head>
<body>
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="/images/TM logo.png" alt="Logo" width="118,2" height="118,2">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('news.index')}}">Latest News</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('faq.index')}}">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('aboutus.index')}}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('contact.index')}}">Contact</a></li>
                    @auth
                    <li class="nav-item dropdown">
                            <a class="username"></a>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a>
                                </li>
                                <li>
                                    <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="btn">Logout</button>
                                    </form>
                                </li>
                            </ul>
                    </li>
                    @endauth 
                    @guest
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('register')}}">Register</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{route('login')}}">Login</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            @hasanyrole('admin|owner')
            <div class="position-sticky" style="margin-left: 10px">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="/images/admin-toggle.png" alt="Nav toggle" width="33" height="24,46666666666666667"></span> <!-- Original 495x367 -->
                </button>
                <div class="collapse show" id="sidebarCollapse">
                    <nav class="col-md-2 d-md-block bg-light sidebar">
                        <ul class="nav flex-column">
                            <li class="nav-item bg-secondary text-white p-2 mb-2 d-flex w-100">Admin Panel</li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.roles') }}">Roles & Permissions</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            @endrole
            <main class="ms-sm-auto px-md-4" style="margin-top: 20px;"> <!-- Adjust the margin-top value as needed -->
                @yield('content')
            </main>
        </div>
    </div>
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>