@extends('layout')
@section('content')
    <div class="container">
        <div class="card" style="width:24rem;margin:auto;">
            <div class="card-body">
                <span style="color: green">

                    @if (Session::has('success'))
                        {{ session('success') }}
                    @endif
                </span>
                <form action="{{ route('store.plan') }}" method="post">
                    @csrf
                    <h3>Add Plan</h3>
                    <div class="form-group">
                        <label for="plan name">Plan Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Plan Name">
                    </div>
                    <div class="form-group">
                        <label for="cost">Cost:</label>
                        <input type="text" class="form-control" name="cost" placeholder="Enter Cost">
                    </div>
                    <div class="form-group">
                        <label for="cost">Plan Description:</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter Description">
                    </div>
                    <button type="submit" class="btn btn-primary" style="color: white">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
