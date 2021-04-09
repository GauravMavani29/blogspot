@extends('layout')
@section('title', 'Add ClubPoints')
@section('meta_desc', 'This is Add Clubpoints Page')
@section('icons', '/setting.png')
@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Clubpoints</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-bullseye"></i> Manage Clubpoint
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="{{ url('admin/clubpoints') }}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <span style="color: green">
                                @if (Session::has('success'))
                                    {{ session('success') }}
                                @endif
                            </span>
                            <tr>
                                <th>View Point</th>
                                <td><input type="text" name="view" class="form-control" @if ($collection) value="{{ $collection->view }}" @endif />
                                    <span style=" color: red">@error('view')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Comment</th>
                                <td><input type="text" name="comment" class="form-control" @if ($collection) value="{{ $collection->comment }}" @endif />
                                    <span style=" color: red">@error('comment')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
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
