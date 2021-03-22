@extends('layout')
@section('meta_desc', 'This is Post')
@section('title', 'Post')
@section('icons', '/post.png')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All Post</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Posts
                <a href="{{ url('admin/post/create') }}" class="float-right btn btn-sm btn-dark">Add Post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
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
                                <th>Username</th>
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

                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->cat_id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ asset('Post images/Thumbnail') . '/' . $item->thumb }}" alt=""
                                            height="100px" width="100px"></td>
                                    <td><img src="{{ asset('Post images/Main Images') . '/' . $item->thumb }}" alt=""
                                            height="100px" width="100px"></td>
                                    <td
                                        style="display: flex; flex-direction: column; justify-content: center; align-items: center ">
                                        <div style="margin: 5px;">
                                            <a href="{{ url('admin/post/comments/' . $item->id) }}"
                                                class="btn btn-secondary btn-sm" style="margin: 2px">Comments</a>
                                        </div>
                                        <div style="margin: 5px;">
                                            <a href="{{ url('admin/post/' . $item->id . '/edit') }}"
                                                class="btn btn-info btn-sm" style="margin: 2px">Update</a>
                                        </div>
                                        <div style="margin: 5px;">
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
    <!-- /.container-fluid -->
@endsection
