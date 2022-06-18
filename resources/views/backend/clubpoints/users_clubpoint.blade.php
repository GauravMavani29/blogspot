@extends('layout')
@section('title', 'All Userpoints')
@section('meta_desc', 'This is Post')
@section('icons', '/post.png')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users ClubPoint</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-bullseye"></i> Users Clubpoint
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <p style="color: green">
                            @if (session()->has('approve'))
                                {{ session('approve') }}
                            @endif
                        </p>
                        <p style="color: red;">
                            @if (session()->has('disapprove'))
                                {{ session('disapprove') }}
                            @endif
                        </p>
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>UpiId</th>
                                <th>Points</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Email</th>
                                <th>UpiId</th>
                                <th>Points</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->upiid }}</td>

                                    <td>{{ $item->clubpoints }}</td>
                                    <td
                                        style="display: flex; flex-direction: column; justify-content: center; align-items: center ">
                                        <div style="margin: 5px;">
                                            <a onclick="checkApprove({{ $item->id }})" class="btn btn-success btn-sm"
                                                style="margin: 2px; color: white;" data-toggle="tooltip"
                                                data-placement="left" title="Approve"><i class="fa fa-check-square"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                        <div style="margin: 5px;">
                                            <a onclick="checkdisApprove({{ $item->id }})" style="color: white"
                                                class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left"
                                                title="Disapprove"><i class="far fa-trash-alt"></i></a>
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
        function checkdisApprove(id) {
            if (confirm("Are you sure you want to disapprove!!")) {
                window.location.href = "{{ url('admin/clubpoints') }}" + "/" + id + "/disapprove";
            }
        }

        function checkApprove(id) {
            if (confirm("Are you sure you want to approve!!")) {
                window.location.href = "{{ url('admin/clubpoints/approve/') }}" + "/" + id;
            }
        }
    </script>
    <!-- /.container-fluid -->
@endsection
