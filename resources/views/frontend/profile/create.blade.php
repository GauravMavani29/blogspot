@php
$count = \App\Models\Profile::where('user_id', Auth::user()->id)->count();
@endphp
@if ($count == 0)
    @extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create Profile</div>
                        <div class="card-body" style="padding: 15px 15px 0px 15px">
                            <h2>
                                @if (Session::has('success'))
                                    {{ session('success') }}
                                @endif
                            </h2>
                            <form method="POST" action="{{ url('/storeprofile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="uname" class="col-md-4 col-form-label text-md-right">Username</label>
                                    <div class="col-md-6">
                                        <input id="fname" type="text" class="form-control" name="username"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-4 col-form-label text-md-right">Fullname</label>
                                    <div class="col-md-6">
                                        <input id="fname" type="text" class="form-control" name="fullname"
                                            value="{{ old('fullname') }}">

                                        @error('fullname')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profileimg" class="col-md-4 col-form-label text-md-right">Profile Image
                                        100x100</label>

                                    <div class="col-md-6">
                                        <input type="file" name="profileimg" class="form-control"
                                            value="{{ old('profileimg') }}" id="profileimg" />

                                        @error('profileimg')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mno" class="col-md-4 col-form-label text-md-right">Mobile</label>
                                    <div class="col-md-6">
                                        <input id="mno" type="text" pattern="[0-9]+" class="form-control" name="mobileno"
                                            value="{{ old('mobileno') }}"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                        @error('mobileno')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control" name="address"
                                            value="{{ old('address') }}">

                                        @error('address')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bdate" class="col-md-4 col-form-label text-md-right">Birth Date</label>
                                    <div class="col-md-6">
                                        <input id="bdate" type="date" class="form-control" name="birthdate"
                                            value="{{ old('birthdate') }}">

                                        @error('birthdate')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Github" class="col-md-4 col-form-label text-md-right">Github
                                        Username</label>
                                    <div class="col-md-6">
                                        <input id="github" type="text" class="form-control" name="github"
                                            value="{{ old('github') }}">

                                        @error('github')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Twitter" class="col-md-4 col-form-label text-md-right">Twitter
                                        Username</label>
                                    <div class="col-md-6">
                                        <input id="twitter" type="text" class="form-control" name="twitter"
                                            value="{{ old('twitter') }}">

                                        @error('twitter')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Instagram" class="col-md-4 col-form-label text-md-right">Instagram
                                        Username</label>
                                    <div class="col-md-6">
                                        <input id="instagram" type="text" class="form-control" name="instagram"
                                            value="{{ old('instagram') }}">

                                        @error('instagram')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Facebook" class="col-md-4 col-form-label text-md-right">Facebook
                                        Username</label>
                                    <div class="col-md-6">
                                        <input id="facebook" type="text" class="form-control" name="facebook"
                                            value="{{ old('facebook') }}">
                                        @error('facebook')
                                            <span class="text text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="btnSubmit">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@else
    {{-- @php
        header('location : /profile');
    @endphp --}}
    <script>
        window.location = "{{ url('/profile') }}";

    </script>
@endif
