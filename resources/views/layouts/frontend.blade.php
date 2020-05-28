<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Single Page E-comm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">

    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <script src="/js/main.js"></script>
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="d-none d-lg-block">
        <nav class="top-bar pt-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="nav-text">
                            <i class="fa fa-phone" aria-hidden="true"></i> 8823908641
                            <i class="fa fa-envelope" aria-hidden="true"></i> arjunbhati180@gmail.com
                        </span>
                    </div>
                    <div class="col-md-6 text-center pt-1">
                        <a href="#" class="social text-white"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="social text-white"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="social text-white"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" class="social text-white"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        <a href="#" class="social text-white"><i class="fa fa-google" aria-hidden="true"></i></a>
                        <a href="#" class="social text-white"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </nav>
        
    </div>

    

    <div class="d-flex" id="wrapper">

        
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Start Bootstrap </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="/detail" class="list-group-item list-group-item-action bg-light">Basic Details</a>
                <a href="/product" class="list-group-item list-group-item-action bg-light">Product Details</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #009688;">
                <button class="btn" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        
                        <ul class="navbar-nav ml-auto">
                            
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pt-4">
                @yield('content')
            </div>
        </div>
    </div>
    
    <nav class="top-bar pt-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-white p-1">
                    <div class="row text-center">Powerd By ITPlus || Copyright, {{date('Y')}} </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    
</body>

</html>