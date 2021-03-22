@extends('layout')
@section('meta_desc', 'This is Comments Page')
@section('title', 'Comments')
@section('icons', '/comment.png')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">All Comments</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-comments"></i> All Comments
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Title</th>
                                <th>Username</th>
                                <th>Comment</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Post Title</th>
                                <th>Username</th>
                                <th>Comment</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ $item->post->title }}
                                    </td>
                                    <td>
                                        @if ($item->id)

                                            {{ $item->user->name }}

                                        @else
                                            nothing
                                        @endif

                                    </td>

                                    <td>

                                        {{ $item->comment }}

                                    </td>

                                    <td style="display: flex; justify-content: space-evenly; align-content: center ">
                                        <a onclick="confirm('Are You Sure You Want To Delete??')"
                                            href="{{ url('admin/comments/delete/' . $item->id) }}"
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
