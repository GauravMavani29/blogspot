@extends('layout')
@section('title', 'Update Post')
@section('meta_desc', 'This is UpdatePost Page')
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
                <i class="fas fa-table"></i> Update Post
                <a href="{{ url('admin/post') }}" class="float-right btn btn-sm btn-dark">All Posts</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="{{ url('admin/post/' . $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <table class="table table-bordered">
                            <span style="color: green">
                                @if (Session::has('success'))
                                    {{ session('success') }}
                                @endif
                            </span>
                            <tr>
                                <th>Post</th>
                                <td>
                                    <select name="category" class="form-control">
                                        @foreach ($collection as $item)
                                            @if ($item->id == $data->cat_id)
                                                {
                                                <option selected value="{{ $item->id }}">{{ $item->title }}</option>
                                                }
                                            @else{
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                }
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><input type="text" name="title" class="form-control" value="{{ $data->title }}" />
                                    <span style="color: red">@error('title')
                                            {{ $message }}
                                        @enderror</span>
                                </td>

                            </tr>
                            <tr>
                                <th>Thumbnail<span class="text-danger">*</span>(500x500)</th>

                                <td>
                                    <p>
                                        <input type="hidden" value="{{ $data->thumb }}" name="cur_thumbimage" />
                                        <img src="{{ asset('Post images/Thumbnail/') }}/{{ $data->thumb }}" alt=""
                                            height="60px" width="60px">
                                    </p>
                                    <input type="file" name="post_thumb" />
                                    <span style="color: red">

                                        @error('post_thumb')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <th>Post Image<span class="text-danger">*</span>(1024x1024)</th>
                                <td>
                                    <p>
                                        <input type="hidden" value="{{ $data->full_img }}" name="cur_postimage" />
                                        <img src="{{ asset('Post images/Main Images/') }}/{{ $data->full_img }}"
                                            alt="" height="60px" width="60px">
                                    </p>
                                    <input type="file" name="post_image" />
                                    <span style="color: red">

                                        @error('post_image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td>
                                    <textarea class="ckeditor form-control" name="detail">
                                                                                                    {{ $data->detail }}
                                                                                                </textarea>
                                    <span style="color: red">

                                        @error('detail')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>
                                    <textarea name="tags" class="form-control">{{ $data->tags }}</textarea>
                                    <span style="color: red">@error('tags')
                                            {{ $message }}
                                        @enderror</span>
                                </td>
                            </tr>
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <!-- /.container-fluid -->
@endsection
