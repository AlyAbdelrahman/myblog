<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
        <nav class="navbar navbar-expand-lg navbar-light">
        
                <div class="container">
                        <a href="#home" class="w3-bar-item w3-button"><b>BLOgger</b></a>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else

                                   <li class="nav-item dropdown  ">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        hello {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
        
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        @if(Auth::user()->id==3)
                                        <a class="dropdown-item" href="/users" >Users </a>
                                        @endif
                                        <a class="dropdown-item" href="/home" >My Dashborad </a>
                                        <a class="dropdown-item" href={{ route('categories.index') }} >Categories </a>
        
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
        







<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img class="w3-image" src="http://www.pigeontech.co.uk/images/background1.jpeg" alt="Me" width="1500" height="600">
  <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
      <style>
        .blinking-cursor {
            font-weight: 90;
            font-size: 50px;
            color: whitesmoke;
           
            -webkit-animation: 1s blink step-end infinite;
            -moz-animation: 1s blink step-end infinite;
            -ms-animation: 1s blink step-end infinite;
            -o-animation: 1s blink step-end infinite;
            animation: 1s blink step-end infinite;
          }
          
          @keyframes "blink" {
            from, to {
              color: transparent;
            }
            50% {
              color: black;
            }
          }
          
          @-moz-keyframes blink {
            from, to {
              color: transparent;
            }
            50% {
              color: black;
            }
          }
          
          @-webkit-keyframes "blink" {
            from, to {
              color: transparent;
            }
            50% {
              color: black;
            }
          }
          
          @-ms-keyframes "blink" {
            from, to {
              color: transparent;
            }
            50% {
              color: black;
            }
          }
          
          @-o-keyframes "blink" {
            from, to {
              color: transparent;
            }
            50% {
              color: black;
            }
          }
          </style>
  <h1 class="w3-hide-medium w3-hide-small w3-xxxlarge">What's in Ur Mind .. </h1><span class="blinking-cursor">|</span>
    <h5 class="w3-hide-large" style="white-space:nowrap">What's in Ur Mind  ..</h5>

  </div>
  
  <!-- Navbar (placed at the bottom of the header image) -->
  <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px">
        <a href="/posts" class="w3-bar-item w3-button">Home</a>
        <a href="/categories" class="w3-bar-item w3-button">Categories</a>
        
        <a href="/services" class="w3-bar-item w3-button">About</a>
        <a href="/posts/create" class="w3-bar-item w3-button">Create Post</a>
        
  </div>
</header>

<!-- Navbar on small screens -->
<div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
<div class="w3-bar w3-light-grey">
        <a href="/posts" class="w3-bar-item w3-button">Home</a>
        <a href="/about" class="w3-bar-item w3-button">About</a>
        <a href="/services" class="w3-bar-item w3-button">Services</a>
        <a href="/posts/create" class="w3-bar-item w3-button">Create Post</a>
</div>
</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
