    @extends('admin.layouts.app')

    @section('title', 'Bassion || Product edit')
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
                        <div class="p-2 "></div>
                        <div class="p-2 "><a class="text-dark" style="text-decoration: none"
                                href="{{ route('product.index') }}"><i class="bi bi-arrow-left-circle-fill"></i> Back</a></div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('product.update') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $products->id }}" />


                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Model no</label>
                            <input type="text" value="{{ $products->modelno }}" class="form-control"name="modelno"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Size</label>
                            <input type="number" value="{{ $products->size }}" name="size"class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">color</label>
                            <input type="text" value="{{ $products->color }}" name="color"class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mrp</label>
                            <input type="number" value="{{ $products->mrp }}"name="mrp" class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Stock</label>
                            <input type="number" value="{{ $products->stock }}" name="stock"class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">category</label>
                            <input type="text" value="{{ $products->category }}" name="category"class="form-control"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Vendorsku</label>
                            <input type="text"name="vendor" value="{{ $products->vendor }}"class="form-control"
                                id="exampleInputPassword1">
                        </div>




                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    @endsection
