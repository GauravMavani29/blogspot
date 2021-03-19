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
            <li class="breadcrumb-item active">All Category</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Categories
                <a href="{{ url('admin/category/create') }}" class="float-right btn btn-sm btn-dark">Add Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ asset('images') . '/' . $item->image }}" alt="" height="100px"
                                            width="100px"></td>
                                    <td style="display: flex; justify-content: space-evenly;">
                                        <a href="{{ url('admin/category/' . $item->id . '/edit') }}"
                                            class="btn btn-info btn-sm" style="margin: 2px">Update</a>
                                        <a onclick="confirm('Are You Sure You Want To Delete??')"
                                            href="{{ url('admin/category/' . $item->id . '/delete') }}"
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
