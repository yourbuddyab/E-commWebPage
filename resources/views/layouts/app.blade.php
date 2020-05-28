
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">	
    <title>Single Page E-comm</title> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
    <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
    <!-- CSRF Token -->
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
    </nav>   <!--TOP-NAVBAR-END-->
    </div>
    
<!--====================== NAVBAR MENU START===================-->
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #009688;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
<div class="py-4">
@yield('content')
</div>
    
<!--   FOOTER START================== -->
    
    <footer class="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-3">
            <h4 class="title">ONE Page E-comm</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit, libero a molestie consectetur, sapien elit lacinia mi.</p>
            <ul class="social-icon text-center">
            <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
            </ul>
            </div>
        <div class="col-sm-3">
            <h4 class="title">My Account</h4>
            <span class="acount-icon">          
            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wish List</a>
            <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
            <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language</a>           
          </span>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Category</h4>
            <div class="category">
            <a href="#">men</a>
            <a href="#">women</a>
            <a href="#">boy</a>
            <a href="#">girl</a>
            <a href="#">bag</a>
            <a href="#">teshart</a>
            <a href="#">top</a>
            <a href="#">shos</a>
            <a href="#">glass</a>
            <a href="#">kit</a>
            <a href="#">baby dress</a>
            <a href="#">kurti</a>           
            </div>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Payment Methods</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ul class="payment">
            <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>            
            <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
            </ul>
            </div>
        </div>
        <hr>
        
        <div class="row text-center">Powerd By ITPlus || Copyright, {{date('Y')}} </div>
        </div>
    </footer>
    <script>
        
$(function() {

$(".buttonAdd").append('<div class="dec button btn btn-secondary" id="buttonless">-</div><input type="text"'+
"style='width:50px!important; margin: 5px;"+
"background-color: #fff;"+
    "background-clip: padding-box;"+
    "border: 1px solid #ced4da; padding:10px;"+
    "border-radius: 0.25rem;"+
    "transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;"+
    "height: calc(1.6em + 0.75rem + 2px);'"+
    '"padding: 0.375rem 0.75rem;" name="cart" id="cart" value="1"><div class="inc button btn btn-secondary">+</div>');
$(".button").on("click", function() {

var $button = $(this);
var oldValue = $button.parent().find("input").val();

if ($button.text() == "+") {
  var newVal = parseFloat(oldValue) + 1;
} else {
 // Don't allow decrementing below zero
  if (oldValue > 0) {
    var newVal = parseFloat(oldValue) - 1;
  } else {
    newVal = 0;
  }
}

$button.parent().find("input").val(newVal);

});
});
    </script>
</body>
</html>