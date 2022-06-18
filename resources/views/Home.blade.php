<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
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
    <link rel="icon" type="image/png" href="{{ asset('icon') }}/home.png" />
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<style>
    .content {
        padding: 0;
    }

    body {
        letter-spacing: 1px;
    }

</style>

<body>
    <header class="header">
        <!-- Main Navbar-->
        <nav class="navbar navbar-expand-lg">
            <div class="search-area">
                <div class="search-area-inner d-flex align-items-center justify-content-center">
                    <div class="close-btn"><i class="icon-close"></i></div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <form action="{{ url('frontend/blog') }}" class="search-form">
                                <div class="form-group">
                                    <input type="search" placeholder="What are you looking for?" name="que" required>
                                    <button type="submit" class="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Navbar Brand -->
                <div class="navbar-header d-flex align-items-center justify-content-between">
                    <!-- Navbar Brand --><a href="{{ url('/') }}" class="navbar-brand">Blogspot</a>
                    <!-- Toggle Button-->
                    <button type="button" data-toggle="collapse" data-target="#navbarcollapse"
                        aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler"><span></span><span></span><span></span></button>
                </div>
                <!-- Navbar Menu -->
                <div id="navbarcollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link active ">Home</a>
                        </li>
                        <li class="nav-item"><a href="{{ url('frontend/blog') }}" class="nav-link ">Blog</a>
                        </li>
                        <li class="nav-item"><a href="{{ url('frontend/post') }}" class="nav-link ">Post</a>
                        </li>
                        <li class="nav-item"><a href="{{ url('/contactus') }}" class="nav-link ">
                                Contact
                            </a>
                        </li>
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

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/profile') }}">
                                    {{ __('Profile') }}
                                </a>
                            </li>
                        @endguest
                    </ul>
                    <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Hero Section-->
    <section
        style="background: url({{ asset('frontend') }}/img/hero.jpg); background-size: cover; background-position: center center"
        class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1>The first thing you learn when you're blogging is that people are one click away from leaving
                        you.</h1><a href="frontend/blog" class="hero-link">Discover More</a>
                </div>
            </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
        </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="h3">Some great intro here</h2>
                    <p class="text-big">A <strong>blog</strong> (a shortened version of “weblog”) is an online journal
                        or informational
                        website displaying information in reverse chronological order, with the latest posts appearing
                        first, at the top. It is a platform where a writer or a group of writers share their views on an
                        individual subject.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-posts no-padding-top">
        <div class="container">
            <!-- Post-->
            @php
                $count = 0;
            @endphp
            @if ($recent_posts)
                @foreach ($recent_posts as $item)

                    @if ($count == 0)
                        @php
                            $cat = \App\Models\Category::where('id', $item->cat_id)
                                ->select('title')
                                ->get();
                        @endphp
                        <div class="row d-flex align-items-stretch">
                            <div class="image col-lg-5" style="position: relative; height:100vh; width: 100vw;"><img
                                    src="{{ asset('Post images/Thumbnail/' . $item->thumb) }}" alt="..."
                                    style="position: absolute; background-size: 100% 100%; height:100%; width:100%;">
                            </div>
                            <div class="text col-lg-7">
                                <div class="text-inner d-flex align-items-center">
                                    <div class="content">
                                        <header class="post-header">
                                            <div class="category"><a
                                                    href="{{ url('frontend/category-blog/' . $item->cat_id) }}">{{ $cat[0]->title }}</a>
                                            </div>
                                            <a href="{{ url('frontend/post/' . $item->id) }}">
                                                <h2 class="h4">{{ $item->title }}</h2>
                                            </a>
                                        </header>
                                        <p id="pt">{!! Str::limit($item->detail, 230) !!}</p>
                                        <footer class="post-footer d-flex align-items-center"><a
                                                href="{{ url('frontend/post/' . $item->id) }}"
                                                class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img
                                                        src="{{ asset('frontend/img/profile/' . $item->user->profile) }}"
                                                        alt="..." class="img-fluid"></div>
                                                <div class="title"><span>{{ $item->user->name }}</span></div>
                                            </a>
                                            <div class="views"><i class="icon-eye"></i> {{ $item->views }}
                                            </div>
                                        </footer>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @php
                            $count = 1;
                        @endphp
                    @else
                        @php
                            $cat = \App\Models\Category::where('id', $item->cat_id)
                                ->select('title')
                                ->get();
                        @endphp
                        <div class="row d-flex align-items-stretch">
                            <div class="text col-lg-7">
                                <div class="text-inner d-flex align-items-center">
                                    <div class="content">
                                        <header class="post-header">
                                            <div class="category"><a
                                                    href="{{ url('frontend/category-blog/' . $item->cat_id) }}">{{ $cat[0]->title }}</a>
                                            </div>
                                            <a href="{{ url('frontend/post/' . $item->id) }}">
                                                <h2 class="h4">{{ $item->title }}</h2>
                                            </a>
                                        </header>
                                        <p>{!! Str::limit($item->detail, 230) !!}</p>
                                        <footer class="post-footer d-flex align-items-center"><a
                                                href="{{ url('frontend/post/' . $item->id) }}"
                                                class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img
                                                        src="{{ asset('frontend/img/profile/' . $item->user->profile) }}"
                                                        alt="..." class="img-fluid"></div>
                                                <div class="title"><span>{{ $item->user->name }}</span></div>
                                            </a>
                                            <div class="views"><i class="icon-eye"></i> {{ $item->views }}
                                            </div>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                            <div class="image col-lg-5" style="position: relative; height:100vh; width: 100vw;"><img
                                    src="{{ asset('Post images/Thumbnail/' . $item->thumb) }}" alt="..."
                                    style="position: absolute; background-size: 100% 100%; height:100%; width:100%;">
                            </div>
                        </div>
                        @php
                            $count = 0;
                        @endphp
                    @endif
                @endforeach
            @endif
        </div>
    </section>
    <!-- Divider Section-->
    <section
        style="background: url({{ asset('frontend') }}/img/divider-bg.jpg); background-size: cover; background-position: center bottom"
        class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h3 style="letter-spacing: 3px;">In the general scheme of things, a good blog is one
                        that gives its
                        users great content,
                        regularly. Content that enriches those readers' lives, and gives them something to look forward
                        to for the next time. A good blog is one that compels the reader to tell all their friends about
                        what they're reading.</h3><a href="#" class="hero-link">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts">
        <div class="container">
            <header>
                <h2>Popular from the blog</h2>
                <p class="text-big">This is helpful content for your audience, and great content for your website.</p>
            </header>
            <div class="row">
                @foreach ($popular_posts as $item)
                    @php
                        $cat = \App\Models\Category::where('id', $item->cat_id)
                            ->select('title')
                            ->get();
                    @endphp
                    <div class="post col-md-4">
                        <div class="post-thumbnail"><a href="{{ url('frontend/post/' . $item->id) }}"><img
                                    src="{{ asset('Post images/Thumbnail/' . $item->thumb) }}" alt="..."
                                    class="img-fluid"></a>
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date">{{ $item->created_at }}</div>
                                <div class="category"><a
                                        href="{{ url('frontend/category-blog/' . $item->cat_id) }}">{{ $cat[0]->title }}</a>
                                </div>
                            </div><a href="{{ url('frontend/post/' . $item->id) }}">
                                <h3 class="h4" style="margin: 0">{{ $item->title }}</h3>
                            </a>
                            <p class="text-muted">{!! Str::limit($item->detail, 100) !!} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section-->
    <section class="gallery no-padding">
        <div class="row">
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="{{ asset('frontend') }}/img/gallery-1.jpg" data-fancybox="gallery"
                        class="image"><img src="{{ asset('frontend') }}/img/gallery-1.jpg" alt="..."
                            class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i
                                class="icon-search"></i></div>
                    </a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="{{ asset('frontend') }}/img/gallery-2.jpg" data-fancybox="gallery"
                        class="image"><img src="{{ asset('frontend') }}/img/gallery-2.jpg" alt="..."
                            class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i
                                class="icon-search"></i></div>
                    </a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="{{ asset('frontend') }}/img/gallery-3.jpg" data-fancybox="gallery"
                        class="image"><img src="{{ asset('frontend') }}/img/gallery-3.jpg" alt="..."
                            class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i
                                class="icon-search"></i></div>
                    </a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="{{ asset('frontend') }}/img/gallery-4.jpg" data-fancybox="gallery"
                        class="image"><img src="{{ asset('frontend') }}/img/gallery-4.jpg" alt="..."
                            class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i
                                class="icon-search"></i></div>
                    </a></div>
            </div>
        </div>
    </section>
    <!-- Page Footer-->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <h6 class="text-white">Bootstrap Blog</h6>
                    </div>
                    <div class="contact-details">
                        <p>53 Broadway, Broklyn, NY 11249</p>
                        <p>Phone: (020) 123 456 789</p>
                        <p>Email: <a href="mailto:info@company.com">Info@Company.com</a></p>
                        <ul class="social-menu">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="menus d-flex">
                        <ul class="list-unstyled">
                            <li> <a href="#">My Account</a></li>
                            <li> <a href="#">Add Listing</a></li>
                            <li> <a href="#">Pricing</a></li>
                            <li> <a href="#">Privacy &amp; Policy</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li> <a href="#">Our Partners</a></li>
                            <li> <a href="#">FAQ</a></li>
                            <li> <a href="#">How It Works</a></li>
                            <li> <a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2017. All rights reserved. Your great site.</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel"
                                class="text-white">Bootstrapious</a>
                            <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="{{ asset('frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/front.js"></script>
</body>

</html>
