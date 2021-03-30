@extends('layouts.app')
@section('content')\

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Profile') }}</div>
                    <div class="card-body" style="padding: 15px 15px 0px 15px">
                        <form method="POST" action="{{ route('register') }}" onsubmit="return isreCaptchaChecked()"
                            enctype="multipart/form-data">
                            @csrf
                            {{ Request::is('contactd') }}
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Fullname') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="fname" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            @if (Session::has('name'))
                                                {{ session('fnameerr') }}
                                            @endif
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profile"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}
                                    100x100</label>

                                <div class="col-md-6">
                                    <input id="profile" type="file" class="form-control" name="profile" required>

                                    @error('profile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mno" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                                <div class="col-md-6">
                                    <input id="mno" type="text" pattern="[0-9]+" class="form-control" name="mno"
                                        value="{{ old('mno') }}"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                        required>

                                    @error('mno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"
                                        value="{{ old('eaddress') }}" required>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bdate"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>
                                <div class="col-md-6">
                                    <input id="bdate" type="date" class="form-control" name="bdate"
                                        value="{{ old('bdate') }}" required>

                                    @error('bdate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Github"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Github Username') }}</label>
                                <div class="col-md-6">
                                    <input id="github" type="text" class="form-control" name="github"
                                        value="{{ old('github') }}">

                                    @error('github')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Twitter"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Twitter Username') }}</label>
                                <div class="col-md-6">
                                    <input id="twitter" type="text" class="form-control" name="twitter"
                                        value="{{ old('twitter') }}">

                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Instagram"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Instagram Username') }}</label>
                                <div class="col-md-6">
                                    <input id="instagram" type="text" class="form-control" name="instagram"
                                        value="{{ old('instagram') }}">

                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Facebook"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Facebook Username') }}</label>
                                <div class="col-md-6">
                                    <input id="facebook" type="text" class="form-control" name="facebook"
                                        value="{{ old('facebook') }}">

                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btnSubmit">
                                        {{ __('Register') }}
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
