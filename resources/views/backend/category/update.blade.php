@extends('layout')
@section('title', 'Update Category')
@section('meta_desc', 'This is UpdateCategory Page')
@section('icons', '/category.png')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Update Category</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Update Category
                <a href="{{ url('admin/post') }}" class="float-right btn btn-sm btn-dark">All Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="{{ url('admin/post/' . $collection->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <table class="table table-bordered">
                            <span style="color: green">
                                @if (Session::has('success'))
                                    {{ session('success') }}
                                @endif
                            </span>
                            <tr>
                                <th>Title</th>
                                <td>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $collection->title }}" />
                                    <span style="color: red">@error('title')
                                            {{ $message }}
                                        @enderror</span>
                                </td>

                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <input type="text" name="detail" class="form-control"
                                        value="{{ $collection->detail }}" />
                                    <span style="color: red">@error('detail')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>

                                    <p><img src="{{ asset('images') }}/{{ $collection->image }}" alt="" height="60px"
                                            width="60px"></p>
                                    <input type="hidden" value="{{ $collection->image }}" name="cur_image" />
                                    <input type="file" name="cat_image" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
