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
        <div class="nav-logo"><img src="/images/TM logo.png" alt="TMentertainment logo" width="145"></div> <!-- Here comes the logo if I ever need one. -->
        <ulv class="nav-links">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('news.index')}}">Latest News</a></li>
            <li><a href="{{route('faq.index')}}">FAQ</a></li>
            <li><a href="{{route('aboutus.index')}}">About Us</a></li>
            <li><a href="{{route('contact.index')}}">Contact</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav>
    <div>
        @yield('content')
    </div>
   

    
    
</body>
</html>