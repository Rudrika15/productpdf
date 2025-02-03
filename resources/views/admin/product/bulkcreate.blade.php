@extends('admin.layouts.app')
@section('title', 'Bassion || Bulk product create')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between  mb-3">
                    <div class="p-2 ">Product bulk create</div>
                    <div class="p-2 "><a class="text-dark" style="text-decoration: none"
                            href="{{ route('product.index') }}"><i class="bi bi-arrow-left-circle-fill"></i> Back</a></div>
                </div>

            </div>

            <div class="card-body">
                <form action={{ route('users.import') }} method="post" accept=".csv,.xl" enctype="multipart/form-data">
                    @csrf


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Vendorsku</label>
                        <input type="file" name="file" class="form-control" id="exampleInputPassword1">

                    </div>
                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
