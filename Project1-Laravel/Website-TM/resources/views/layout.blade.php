<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="nav">
        
        <div class="nav-logo">
            <a href="{{route('home')}}">
                <img src="/images/TM logo.png" alt="TMentertainment logo" width="145">
            </a>   
        </div> 
        <ulv class="nav-links">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('news.index')}}">Latest News</a></li>
            <li><a href="{{route('faq.index')}}">FAQ</a></li>
            <li><a href="{{route('aboutus.index')}}">About Us</a></li>
            <li><a href="{{route('contact.index')}}">Contact</a></li>
            @auth
            <div class="dropdown-auth">
                <span>{{ Auth::user()->name }}</span>
                <div class="dropdown-auth-content">
                    <li>
                        <form method="GET" action="{{route('profile.edit')}}">
                            <button type="submit">Profile</button>
                        </form>
                    </li>
                    @hasanyrole('admin|owner')
                    <p>AM I admin?</p>
                    <li>
                        <form method="GET" action="{{route('admin.index')}}">
                            <button type="submit">Admin Panel</button>
                        </form>
                    </li>
                    @endrole
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </div>
            </div>
            @endauth
            @guest
            <li><a href="{{route('register')}}">Register</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
            @endguest
        </ul>
    </nav>
    <div>
        @yield('content')
    </div>
   

    
    
</body>
</html>