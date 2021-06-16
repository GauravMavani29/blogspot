@extends('layout')
@section('meta_desc', 'This is Users Page')
@section('title', 'Users')
@section('icons', '/user.png')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-users"></i> Users
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>

                                    <td style="display: flex; justify-content: space-evenly; align-content: center ">
                                        @if (!($item->id == 0))
                                            <div>
                                                <a href="{{ url('admin/users/post/' . $item->id) }}"
                                                    class="btn btn-warning btn-sm" style="color: white"
                                                    data-toggle="tooltip" data-placement="top" title="All Post"><i
                                                        class="fa fa-list" aria-hidden="true" style="color: white"></i></a>
                                            </div>
                                            <div>
                                                <a onclick="checkUserDelete({{ $item->id }})"
                                                    class="btn btn-danger btn-sm" style="color: white" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        @endif
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
    <script>
        function checkUserDelete(id) {
            if (confirm("Are you sure you want to delete!!")) {
                window.location.href = "{{ url('admin/users/delete') }}" + "/" + id;
            }
        }

    </script>
    <!-- /.container-fluid -->
@endsection
