@extends('layout')
@section('meta_desc', 'This is CategoryPage')
@section('title', 'Category')
@section('icons', '/category.png')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All Categories</li>
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
                                        <div>
                                            <a href="{{ url('admin/category/' . $item->id . '/edit') }}"
                                                class="btn btn-info btn-sm" style="margin: 2px" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                        </div>
                                        <div>
                                            <a onclick="checkCategoryDelete({{ $item->id }})"
                                                class="btn btn-danger btn-sm" style="color: white" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                        <div>
                                            <a href="{{ url('admin/category/allpost/' . $item->id) }}"
                                                class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                                                title="All Post"><i class="fa fa-list" aria-hidden="true"
                                                    style="color: white"></i></a>
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
    <script>
        function checkCategoryDelete(id) {
            if (confirm("Are you sure you want to delete!!")) {
                window.location.href = "{{ url('admin/category') }}" + "/" + id + '/delete';
            }
        }

    </script>
    <!-- /.container-fluid -->
@endsection
