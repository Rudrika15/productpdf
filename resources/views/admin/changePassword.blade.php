@extends('admin.layouts.app')

@section('title', 'Bassion || Change Password')
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success mt-3">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Change Password</h5>

                <form action="{{ route('update.password') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control" id="exampleInputPassword1">
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
