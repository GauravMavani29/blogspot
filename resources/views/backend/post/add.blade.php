@extends('layout')
@section('title', 'Add Post')
@section('meta_desc', 'This is Add Post Page')
@section('icons', '/post.png')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Post</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Add Post
                <a href="{{ url('admin/post') }}" class="float-right btn btn-sm btn-dark">All Posts</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="{{ url('admin/post') }}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered">
                            <span style="color: green">
                                @if (Session::has('success'))
                                    {{ session('success') }}
                                @endif
                            </span>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <select class="form-control" name="category" id="">
                                        @foreach ($collection as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Title<span class="text-danger">*</span></th>
                                <td><input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                                    <span style="color: red">@error('title')
                                            {{ $message }}
                                        @enderror</span>
                                </td>

                            </tr>
                            <tr>
                                <th>Thumbnail<span class="text-danger">*</span>(540x540)</th>
                                <td><input type="file" name="post_thumb" required />
                                    <span style="color: red">

                                        @error('post_thumb')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <th>Post Image<span class="text-danger">*</span>(720x720)</th>
                                <td><input type="file" name="post_image" required />
                                    <span style="color: red">

                                        @error('post_image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <th>Description<span class="text-danger">*</span></th>
                                <td>
                                    <textarea class="ckeditor form-control" name="detail">

                                                                                                                                                                                            </textarea>
                                    <span style="color: red">

                                        @error('detail')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tags<span class="text-danger">*</span></th>
                                <td style="display: flex; align-items: center">
                                    <input data-role="tagsinput" type="text" name="tags"
                                        style="margin: 0; height: 1.875rem; margin: 0; padding: 0;" />
                                    <span style="color: red">@error('tags')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" value="Add Post" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend') }}/js/tags.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <!-- /.container-fluid -->
@endsection
