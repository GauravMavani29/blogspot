@php
$count = \App\Models\Profile::where('user_id', Auth::user()->id)->count();
@endphp
@if ($count == 1)
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Comments</title>
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

        <!-- Page level plugin CSS-->
        <link href="{{ asset('backend') }}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('icon') }}/comment.png" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            body {
                letter-spacing: 1px;
            }

        </style>
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
                        <!-- Navbar Brand --><a href="index.html" class="navbar-brand">Bootstrap Blog</a>
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
                            <li class="nav-item"><a href="{{ url('frontend/post') }}" class="nav-link">Post</a>
                            </li>
                            <li class="nav-item"><a href="{{ url('/contactus') }}" class="nav-link ">Contact</a>
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
        <div id="wrapper">


            <div id="content-wrapper">
                <div class="container-fluid col-sm">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-comments"></i> All Comments
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Comment</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                            <th>User</th>
                                            <th>Comment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($collection as $item)
                                            <tr>


                                                <td>
                                                    @if ($item->id)

                                                        {{ $item->user->name }}

                                                    @else
                                                        nothing
                                                    @endif

                                                </td>

                                                <td>

                                                    {{ $item->comment }}

                                                </td>

                                                <td
                                                    style="display: flex; justify-content: space-evenly; align-content: center ">
                                                    <a onclick="checkUserPostCommentDelete({{ $item->id }})"
                                                        class="btn btn-danger btn-sm" style="color: white"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                            class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function checkUserPostCommentDelete(id) {
                if (confirm("Are you sure you want to delete!!")) {
                    window.location.href = "{{ url('/frontend/post/comments/delete') }}" + "/" + id;
                }
            }
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <!-- JavaScript files-->
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend') }}/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="{{ asset('frontend') }}/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
        <script src="{{ asset('frontend') }}/js/front.js"></script>
        <script src="{{ asset('backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('backend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugin JavaScript-->
        {{-- <script src="{{ asset('backend') }}/vendor/chart.js/Chart.min.js"></script> --}}
        <script src="{{ asset('backend') }}/vendor/datatables/jquery.dataTables.js"></script>
        <script src="{{ asset('backend') }}/vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('backend') }}/js/sb-admin.min.js"></script>

        <!-- Demo scripts for this page-->
        <script src="{{ asset('backend') }}/js/demo/datatables-demo.js"></script>
        {{-- <script src="{{ asset('backend') }}/js/demo/chart-area-demo.js"></script> --}}
    </body>

    </html>
@else
    <script>
        window.location = "{{ url('/create/profile') }}";
    </script>
@endif
