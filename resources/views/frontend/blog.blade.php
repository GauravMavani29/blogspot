<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
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
    <link rel="icon" type="image/png" href="{{ asset('icon') }}/feed.png" />

</head>

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
                        <li class="nav-item"><a href="{{ url('frontend/blog') }}" class="nav-link active">Blog</a>
                        </li>
                        <li class="nav-item"><a href="{{ url('frontend/post') }}" class="nav-link">Post</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link ">Contact</a>
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
                                <a class="nav-link" href="{{ url('frontend/post/addpost') }}">{{ __('Add Post') }}</a>
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
    <div class="container">
        <div class="row">
            <main class="posts-listing col-lg-8" style="padding-top: 20px; padding: 20px 0px 0px 0px;">
                <div class="container">
                    @if ($name)
                        <h3 style="margin: 0px 0px 15px 0px; color: #9b9a9a">{{ $name }}</h3>
                    @endif
                    <div class="row">
                        <!-- post -->
                        @if (count($collection) > 0)
                            @foreach ($collection as $item)
                                @php
                                    $cat = \App\Models\Category::where('id', $item->cat_id)
                                        ->select('title')
                                        ->get();
                                @endphp
                                <div class="post col-xl-6">
                                    <div class="post-thumbnail"><a
                                            href="{{ url('frontend/post/' . $item->id) }}"><img
                                                src="{{ asset('Post images/Thumbnail/' . $item->thumb) }}" alt="..."
                                                class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date meta-last">{{ $item->created_at }}</div>
                                            <div class="category"><a
                                                    href="{{ url('frontend/category-blog/' . $item->cat_id) }}">{{ $cat[0]->title }}</a>
                                            </div>
                                        </div>
                                        <a href="{{ url('frontend/post/' . $item->id) }}">
                                            <h3 class="h4" style="margin: 0">{{ $item->title }}</h3>
                                        </a>
                                        <p class="text-muted">{!! Str::limit($item->detail, 150) !!}</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="{{ url('frontend/post/' . $item->id) }}"
                                                class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img
                                                        src="{{ asset('frontend/img/profile/' . $item->user->profile) }}"
                                                        alt="..." class="img-fluid">
                                                </div>
                                                <div class="title"><span>{{ $item->user->name }}</span></div>
                                            </a>
                                            <div class="views"><i class="icon-eye"></i> {{ $item->views }}
                                            </div>
                                            <div class="comments meta-last"><i
                                                    class="icon-comment"></i>{{ count($item->comments) }}</div>
                                        </footer>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="alert alert-danger">No Post Found</p>
                        @endif
                        <!-- Pagination -->
                    </div>
                    <div style="margin: 15px 0px">
                        {{ $collection->links() }}
                    </div>
            </main>
            <aside class="col-lg-4">
                <!-- Widget [Search Bar Widget]-->
                <div class="widget search">
                    <header>
                        <h3 class="h6">Search the blog</h3>
                    </header>
                    <form action="{{ url('frontend/blog') }}" class="search-form">
                        <div class="form-group">
                            <input type="search" placeholder="What are you looking for?" name="que" required>
                            <button type="submit" class="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <!-- Widget [Latest Posts Widget]        -->
                <div class="widget latest-posts">
                    <header>
                        <h3 class="h6">Popular Posts</h3>
                    </header>
                    <div class="blog-posts">
                        @if ($popular_posts)
                            @foreach ($popular_posts as $item)
                                <a href="{{ url('frontend/post/' . $item->id) }}">
                                    <div class="item d-flex align-items-center">
                                        <div class="image"><img
                                                src="{{ asset('Post images/Thumbnail') . '/' . $item->full_img }}"
                                                alt="..." class="img-fluid">
                                        </div>
                                        <div class="title"><strong>{{ $item->title }}</strong>
                                            <div class="d-flex align-items-center">
                                                <div class="views"><i class="icon-eye"></i> {{ $item->views }}</div>
                                                <div class="comments"><i
                                                        class="icon-comment"></i>{{ count($item->comments) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- Widget [Categories Widget]-->
                <div class="widget categories">
                    <header>
                        <h3 class="h6">Categories</h3>
                    </header>
                    @if ($categories)
                        @foreach ($categories as $item)
                            <div class="item d-flex justify-content-between"><a
                                    href="{{ url('frontend/category-blog/' . $item->id) }}">{{ $item->title }}</a><span>{{ count($item->posts) }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Widget [Tags Cloud Widget]-->
                {{-- <div class="widget tags">
                    <header>
                        <h3 class="h6">Tags</h3>
                    </header>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
                    </ul>
                </div> --}}
            </aside>
        </div>
    </div>
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
