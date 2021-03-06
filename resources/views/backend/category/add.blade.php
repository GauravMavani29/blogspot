@extends('layout')
@section('title', 'Add Category')
@section('meta_desc', 'This is Add Category Page')
@section('icons', '/category.png')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Add Category
                <a href="{{ url('admin/category') }}" class="float-right btn btn-sm btn-dark">All Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="{{ url('admin/category') }}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <span style="color: green">
                                @if (Session::has('success'))
                                    {{ session('success') }}
                                @endif
                            </span>
                            <tr>
                                <th>Title</th>
                                <td><input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                                    <span style="color: red">@error('title')
                                            {{ $message }}
                                        @enderror</span>
                                </td>

                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td><input type="text" name="detail" class="form-control"
                                        value="{{ old('detail') }}" /><span style="color: red">@error('detail')
                                            {{ $message }}
                                        @enderror</span></td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td><input type="file" name="cat_image" required /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" value="Add" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
