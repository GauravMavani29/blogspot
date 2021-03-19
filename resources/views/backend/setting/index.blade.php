@extends('layout')
@section('title', 'Add Settings')
@section('meta_desc', 'This is Add Settings Page')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Setting</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-cog"></i> Manage Setting
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="{{ url('admin/setting') }}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <span style="color: green">
                                @if (Session::has('success'))
                                    {{ session('success') }}
                                @endif
                            </span>
                            <tr>
                                <th>Comment Auto Approve</th>
                                <td><input type="text" name="comment_auto" class="form-control" @if ($collection) value="{{ $collection->comment_auto }}" @endif />
                                    <span style="color: red">@error('comment_auto')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
                            <tr>
                                <th>User Auto Approve</th>
                                <td><input type="text" name="user_auto" class="form-control" @if ($collection) value="{{ $collection->user_auto }}" @endif />
                                    <span style=" color: red">@error('user_auto')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Recent Post Limit</th>
                                <td><input type="text" name="recent_post_limit" class="form-control" @if ($collection) value="{{ $collection->recent_post_limit }}" @endif />
                                    <span style=" color: red">@error('recent_post_limit')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Popular Post Limit</th>
                                <td><input type="text" name="popular_post_limit" class="form-control" @if ($collection) value="{{ $collection->popular_post_limit }}" @endif />
                                    <span style=" color: red">@error('popular_post_limit')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Recent Comment Limit</th>
                                <td><input type="text" name="recent_comment_limit" class="form-control" @if ($collection) value="{{ $collection->recent_comment_limit }}" @endif />
                                    <span style=" color: red">@error('recent_comment_limit')
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
