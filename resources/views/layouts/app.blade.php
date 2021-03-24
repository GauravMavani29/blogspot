<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <link rel="icon" type="image/png" href="{{ asset('icon') }}@yield('icons')" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div id="app">
        <header class="header">
            <!-- Main Navbar-->
            <nav class="navbar navbar-expand-lg">
                <div class="search-area">
                    <div class="search-area-inner d-flex align-items-center justify-content-center">
                        <div class="close-btn"><i class="icon-close"></i></div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8">
                                <form action="#">
                                    <div class="form-group">
                                        <input type="search" name="search" id="search"
                                            placeholder="What are you looking for?">
                                        <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <!-- Navbar Brand -->
                    <div class="navbar-header d-flex align-items-center justify-content-between">
                        <!-- Navbar Brand --><a href="{{ url('/') }}" class="navbar-brand">Bootstrap Blog</a>
                        <!-- Toggle Button-->
                        <button type="button" data-toggle="collapse" data-target="#navbarcollapse"
                            aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation"
                            class="navbar-toggler"><span></span><span></span><span></span></button>
                    </div>
                    <!-- Navbar Menu -->
                    <div id="navbarcollapse" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link ">Home</a>
                            </li>
                            <li class="nav-item"><a href="{{ url('frontend/blog') }}" class="nav-link ">Blog</a>
                            </li>
                            <li class="nav-item"><a href="{{ url('frontend/post') }}" class="nav-link ">Post</a>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link ">Contact</a>
                            </li>
                            {{-- composer require laravel/ui 
                                php artisan ui bootstrap --auth --}}
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
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ url('/frontend/post/addpost') }}">{{ __('Add Post') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ url('/frontend/post/managepost') }}">{{ __('All Post') }}</a>
                                </li>
                            @endguest
                        </ul>
                        <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
    var recaptchachecked = false;

    function recaptchaCallback() {
        recaptchachecked = true;
    }

    function isreCaptchaChecked() {
        document.getElementById("err").innerHTML = "Please ensure that you are a human!";
        return recaptchachecked;
    }

</script>
<script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('frontend') }}/vendor/popper.js/umd/popper.min.js"> </script>
<script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="{{ asset('frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
<script src="{{ asset('frontend') }}/js/front.js"></script>

</html>
