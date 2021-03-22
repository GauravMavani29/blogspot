@extends('layout')
@section('title', 'Dashboard')
@section('meta_desc', 'This is Dashboard')
@section('icons', '/dashboard.png')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">{{ \App\Models\Category::count() }} Categories</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="category">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-address-card"></i>
                            </div>
                            <div class="mr-5">{{ \App\Models\Post::count() }} Posts</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="post">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">{{ \App\Models\Comment::count() }} Comments</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="comments">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-users"></i>
                            </div>
                            <div class="mr-5">{{ \App\Models\User::count() }} Users</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="users">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Admin's Post
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Thumb Image</th>
                                    <th>Full Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Thumb Image</th>
                                    <th>Full Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($collection as $item)
                                    <tr>
                                        <p style="display: none">
                                            {{ $cat = \App\Models\Category::where('id', $item->cat_id)->select('title')->get() }}
                                        </p>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            @foreach ($cat as $a)
                                                {{ $a->title }}
                                            @endforeach
                                        </td>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ asset('Post images/Thumbnail') . '/' . $item->thumb }}" alt=""
                                                height="100px" width="100px"></td>
                                        <td><img src="{{ asset('Post images/Main Images') . '/' . $item->full_img }}"
                                                alt="" height="100px" width="100px"></td>
                                        <td
                                            style="display: flex; flex-direction: column; justify-content: center; align-items: center ">
                                            <div style="margin: 5px">

                                                <a href="{{ url('admin/post/comments/' . $item->id) }}"
                                                    class="btn btn-secondary btn-sm">Comments</a>
                                            </div>
                                            <div style="margin: 5px">

                                                <a href="{{ url('admin/post/' . $item->id . '/edit') }}"
                                                    class="btn btn-info btn-sm">Update</a>
                                            </div>
                                            <div style="margin: 5px">

                                                <a onclick="confirm('Are You Sure You Want To Delete??')"
                                                    href="{{ url('admin/post/' . $item->id . '/delete') }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endsection
