<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Learncode') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Contact page Links  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    </head>
    <body class="{{ $class ?? '' }}">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <div class="container-fluid">
             
        <a class="navbar-brand" href="#"><span class="logo">LC</span> Learncode</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse links" id="navbarSupportedContent">
            <form method="get" action="/search" class="form-inline my-2 my-lg-0 search-form">
                <input name="q" placeholder="What do wanna learn..." class="form-control mr-sm-2" type="search" aria-label="Search">
                <i class="fas fa-search"></i>
            </form>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/allcourses">All Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="nav-item dropdown">
                @auth
                <a class="nav-link @auth dropdown-toggle @endauth" href="/login" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{\Str::limit(auth()->user()->name, 10)}}
                </a>
                @endauth
                @guest
                    <a class="nav-link" href="/login">Login</a>
                @endguest
                @auth
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/profile">Profile</a>
                    <a class="dropdown-item" href="/mycourses">My Courses</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
                @endauth
            </li>
        </ul>
        
      </div>
  </div>
    </nav>


    @yield('content')


    @include('includes.footer')

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        
        <script src="/js/jquery.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="/js/script.js"></script>



<!--===============================================================================================-->
    <script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="/vendor/bootstrap/js/popper.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="/vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
    <script src="/js/main.js"></script>

    </body>
</html>
