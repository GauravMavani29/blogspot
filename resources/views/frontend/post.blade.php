<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Post</title>
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
    <link rel="icon" type="image/png" href="{{ asset('icon') }}/post.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <!-- Tweaks for older IEs-->
    <style>
        #commentscroll {
            overflow-y: scroll;
            height: 30rem;
            scrollbar-width: none;
            box-sizing: border-box;
            border: 0.1rem solid rgb(236, 236, 236);
            padding: 1rem;
        }

        #commentscroll::-webkit-scrollbar {
            width: 0 !important;
            display: none;

        }

    </style>
</head>

<body>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>
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
                        <li class="nav-item"><a href="{{ url('frontend/blog') }}" class="nav-link ">Blog</a>
                        </li>
                        <li class="nav-item"><a href="{{ url('frontend/post') }}" class="nav-link active">Post</a>
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
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                        @endguest
                    </ul>
                    <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="share-btn-container">
        <a href="#" class="twitter-btn">
            <i class="fab fa-twitter"></i>
        </a>

        <a href="#" class="pinterest-btn">
            <i class="fab fa-pinterest"></i>
        </a>

        <a href="#" class="linkedin-btn">
            <i class="fab fa-linkedin"></i>
        </a>

        <a href="#" class="whatsapp-btn">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <div class="container">

        <div class="row">
            <main class="post blog-post col-lg-8">
                <div class="container">
                    @if ($collection)
                        <p style="display: none">
                            {{ $cat = \App\Models\Category::where('id', $collection->cat_id)->select('title')->get() }}
                        </p>
                        <div class="post-single">
                            <div class="post-thumbnail"><img
                                    src="{{ asset('Post images/Main images') . '/' . $collection->full_img }}"
                                    alt="..." class="img-fluid"></div>
                            <div class="post-details">
                                <div class="post-meta d-flex justify-content-between">
                                    <div class="category">
                                        <a href="{{ url('frontend/category-blog/' . $collection->cat_id) }}">
                                            {{ $cat[0]->title }}
                                        </a>
                                    </div>
                                </div>
                                <h1>{{ $collection->title }}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#"
                                        class="author d-flex align-items-center flex-wrap">
                                        <div class="avatar"><img
                                                src="{{ asset('frontend/img/profile/' . $collection->user->profile) }}"
                                                alt="..." class="img-fluid post-image"></div>
                                        <div class="title"><span>{{ $collection->user->name }}</span></div>
                                    </a>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="date"><i class="icon-clock"></i> {{ $collection->created_at }}
                                        </div>
                                        <div class="views"><i class="icon-eye"></i> {{ $collection->views }}</div>
                                        <div class="comments meta-last"><i
                                                class="icon-comment"></i>{{ count($collection->comments) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="post-body">
                                <p class="lead">{!! $collection->detail !!}</p>
                            </div>
                            <div class="post-tags">
                                @php
                                    $tagarr = explode(',', $collection->tags);
                                @endphp

                                @foreach ($tagarr as $item)

                                    <a href="#" class="tag">#{{ $item }}</a>
                                @endforeach
                            </div>

                            @auth
                                <div class="add-comment">
                                    <header>
                                        <h3 class="h6">Leave a reply</h3>
                                        <p class="text-success">
                                            @if (Session::has('success'))
                                                {{ session('success') }}@endif
                                        </p>
                                    </header>
                                    <form action="{{ url('save-comment/' . $collection->id) }}" class="commenting-form"
                                        method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <textarea name="usercomment" id="usercomment"
                                                    placeholder="Type your comment" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-secondary">Submit Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div style="margin: 10px">
                                    <div class="form-group col-md-12">
                                        <a class="btn btn-secondary" style="color: aliceblue"
                                            href="{{ route('login') }}">Login</a>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <a class="btn btn-secondary" style="color: aliceblue"
                                            href="{{ route('register') }}">Register</a>
                                    </div>
                                </div>
                            @endauth

                            <div class="post-comments">
                                <header>
                                    <h3 class="h6">Post Comments<span
                                            class="no-of-comments">({{ count($collection->comments) }})</span>
                                    </h3>
                                </header>
                                @if (count($collection->comments) > 0)
                                    <div class="comment" id="commentscroll">
                                        @if ($collection->comments)
                                            @foreach ($collection->comments as $item)
                                                <div class="comment-header d-flex justify-content-between">
                                                    <div class="user d-flex align-items-center">
                                                        <div class="image"><img
                                                                src="{{ asset('frontend/img/profile/' . $item->user->profile) }}"
                                                                alt="..." class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="title">
                                                            @if ($item->user_id == 0)
                                                                <strong>Admin</strong>
                                                            @else
                                                                <strong>{{ $item->user->name }}</strong>
                                                            @endif
                                                            <span class="date">{{ $item->created_at }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment-body">
                                                    <p>{{ $item->comment }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                </div>
            @else
                <div class="alert alert-danger col-lg-3">
                    No Post Found
                </div>
                @endif
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
                <div class="widget tags">
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
                </div>
            </aside>
        </div>
    </div>
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
    <script>
        const facebookBtn = document.querySelector(".facebook-btn");
        const twitterBtn = document.querySelector(".twitter-btn");
        const pinterestBtn = document.querySelector(".pinterest-btn");
        const linkedinBtn = document.querySelector(".linkedin-btn");
        const whatsappBtn = document.querySelector(".whatsapp-btn");

        function init() {
            const pinterestImg = document.querySelector(".post-image");

            let postUrl = encodeURI(document.location.href);
            let postTitle = encodeURI("Hi everyone, please check this out: ");
            let postImg = encodeURI(pinterestImg.src);

            // facebookBtn.setAttribute(
            //     "href",
            //     `https://www.facebook.com/sharer.php?u=${postUrl}`
            // );

            twitterBtn.setAttribute(
                "href",
                `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
            );

            pinterestBtn.setAttribute(
                "href",
                `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`
            );

            linkedinBtn.setAttribute(
                "href",
                `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
            );

            whatsappBtn.setAttribute(
                "href",
                `https://wa.me/?text=${postTitle} ${postUrl}`
            );
        }

        init();

    </script>
    <script src="{{ asset('frontend') }}/js/front.js"></script>
</body>

</html>
