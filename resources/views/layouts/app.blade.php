<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
        @include('inc.navbar')
        <br>
        <br>
        <div class="container">
             @yield('content')
             <br>
             <br>
             <!-- Footer -->

             <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
        </div>
       
   
</body>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400);

body {
  
  width: 100%;
  margin: 0 auto;
}

.center {
  display: table;
  width: 100%;
  height: 5vh;
}

#social-test {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
  font-size: 30px;
  .social {
    padding-left: 0px;
  }
  li {
    display: inline-block;
  }
  li a {
    color: rgba(256, 256, 256, 0.6);
    border-radius: 6px;
    list-style-type: none;
    display: inline-block;
    width: 100px;
    height: 100px;
    line-height: 100px;
    padding: 1%;
    border: 1px solid rgba(256, 256, 256, 0.6);
    cursor: pointer;
    margin-left: 10px;
    margin-bottom: 20px;
    transition: ease .3s;
    &:hover {
      color: rgba(256, 256, 256, 1);
      border: 1px solid rgba(256, 256, 256, 1);
    }
  }
}

.social:hover > li {
  opacity: 0.5;
}

.social:hover > li:hover {
  opacity: 1;
}
.credits, .credits a {
  font-size: 20px;
  font-family: Open Sans;
  color: rgba(256, 256, 256, 0.6);
}
    </style>
<footer class="w3-center w3-black w3-padding-17 ">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="center">
          <div id="social-test">
          <ul class="social">
            <a href="https://facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://twitter.com/"><i class="fa fa-twitter" aria-hidden="true"></a></i>
            <a href="https://instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/c"><i class="fa fa-youtube" aria-hidden="true"></a></i>
            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></a></i>
            <a href="https://github.com/"><i class="fa fa-github" aria-hidden="true"></a></i>         
          </ul>
          </div>
        </div>
        
      </footer>
</html>
