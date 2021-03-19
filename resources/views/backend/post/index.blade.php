@extends('layout')
@section('meta_desc', 'This is CategoryPage')
@section('title', 'Category')
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
                                <th>Category</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->cat_id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ asset('Post images/Thumbnail') . '/' . $item->thumb }}" alt=""
                                            height="100px" width="100px"></td>
                                    <td style="display: flex; justify-content: space-evenly; align-content: center ">
                                        <a href="{{ url('admin/post/' . $item->id . '/edit') }}"
                                            class="btn btn-info btn-sm" style="margin: 2px">Update</a>
                                        <a onclick="confirm('Are You Sure You Want To Delete??')"
                                            href="{{ url('admin/post/' . $item->id . '/delete') }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
