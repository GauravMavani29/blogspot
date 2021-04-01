@php
$count = \App\Models\Profile::where('user_id', Auth::user()->id)->count();
@endphp
@if ($count == 1)
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Post</title>
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
        <!-- Custom fonts for this template-->
        <link href="{{ asset('backend') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="bootstrap-tagsinput.css">

        <script src="bootstrap-tagsinput.min.js"></script>
        <link rel="icon" type="image/png" href="{{ asset('icon') }}/post.png" />
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
                                        <input type="search" placeholder="What are you looking for?" name="que"
                                            required>
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
                            <li class="nav-item"><a href="{{ url('frontend/post') }}"
                                    class="nav-link @yeild('val','active') ">Post</a>
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

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active"
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
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Add Post
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="{{ url('frontend/savepost') }}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <span style="color: green">
                                @if (Session::has('success'))
                                    {{ session('success') }}
                                @endif
                            </span>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <select class="form-control" name="category" id="">
                                        @foreach ($collection as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Title<span class="text-danger">*</span></th>
                                <td style="display: flex; justify-content: center; align-items: center"><input
                                        type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        style="margin: 0; height: 1.875rem" />
                                    <span style="color: red">@error('title')
                                            {{ $message }}
                                        @enderror</span>
                                </td>

                            </tr>
                            <tr>
                                <th>Thumbnail<span class="text-danger">*</span>(540x540)</th>
                                <td style="display: flex;align-items: center"><input type="file" name="post_thumb"
                                        required style="margin: 0; height: 2.5rem" />
                                    <span style="color: red">

                                        @error('post_thumb')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <th>Post Image<span class="text-danger">*</span>(720x720)</th>
                                <td style="display: flex; align-items: center"><input type="file" name="post_image"
                                        required style="margin: 0; height: 2.5rem" />
                                    <span style="color: red">

                                        @error('post_image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <th>Detail<span class="text-danger">*</span></th>
                                <td>
                                    <textarea class="ckeditor form-control" name="detail">
                                    {{ old('detail') }}
                                </textarea>
                                    <span style="color: red">

                                        @error('detail')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tags<span class="text-danger">*</span></th>
                                <td style="display: flex; align-items: center">
                                    <input data-role="tagsinput" type="text" name="tags"
                                        style="margin: 0; height: 1.875rem; margin: 0; padding: 0;" />
                                    <span style="color: red">@error('tags')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="btn btn-secondary">Submit Post</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <!-- JavaScript files-->
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="{{ asset('frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
        <script src="{{ asset('frontend') }}/js/tags.js"></script>
        <script src="{{ asset('frontend') }}/js/front.js"></script>

    </body>

    </html>
@else
    <script>
        window.location = "{{ url('/create/profile') }}";

    </script>
@endif
