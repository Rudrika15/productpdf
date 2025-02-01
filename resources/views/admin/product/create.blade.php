@extends('admin.layouts.app')

@section('title', 'Bassion || Product create')
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
                    <div class="p-2 ">Product List</div>
                    <div class="p-2 "><a class="text-dark" style="text-decoration: none"
                            href="{{ route('product.index') }}"><i class="bi bi-arrow-left-circle-fill"></i> Back</a></div>
                </div>

            </div>
            <div class="card-body">
                <form action={{ route('product.store') }} method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Model no</label>
                        <input type="text" class="form-control"name="modelno" id="exampleInputPassword1">
                        @error('modelno')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Size</label>
                        <input type="number" name="size"class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">color</label>
                        <input type="text" name="color"class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mrp</label>
                        <input type="number" name="mrp" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Stock</label>
                        <input type="number" name="stock"class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">category</label>
                        <select name="category"class="form-select" id="exampleInputPassword1">
                            @foreach ($category as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Vendorsku</label>
                        <input type="text"name="vendor" class="form-control" id="exampleInputPassword1">
                    </div>






                    <button type="submit" class="btn btn-primary mb-5">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
