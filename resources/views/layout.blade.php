<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_desc')">
    <meta name="author" content="">

    <title>@yield('title','Admin Dashboard')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('backend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('backend') }}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend') }}/css/sb-admin.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('icon') }}@yield('icons')" />
</head>
@if (!session()->has('adminData'))
    <script>
        window.location.href = "{{ url('admin/login') }}";

    </script>
@endif

<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="{{ url('admin/dashboard') }}">Laravel Blog</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Category -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Category</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{ url('admin/category') }}">View All</a>
                    <a class="dropdown-item" href="{{ url('admin/category/create') }}">Add New</a>
                </div>
            </li>
            <!-- Post -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Post</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{ url('admin/post') }}">View All</a>
                    <a class="dropdown-item" href="{{ url('admin/post/create') }}">Add New</a>
                </div>
            </li>
            <!-- Comments -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/comments') }}">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Comments</span>
                </a>
            </li>
            <!-- Users -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/users') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <!-- Settings -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/setting') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/logout') }}">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

        <!-- Content -->
        <div id="content-wrapper">
            @yield('content')

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © BlogSpot 2021</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('backend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('backend') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('backend') }}/vendor/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('backend') }}/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="{{ asset('backend') }}/js/demo/datatables-demo.js"></script>
    <script src="{{ asset('backend') }}/js/demo/chart-area-demo.js"></script>
</body>

</html>
