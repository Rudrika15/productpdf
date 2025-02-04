@extends('admin.layouts.app')

@section('title', 'Bassion || Prodcut view')
@section('content')
    <div class="container-fluid my-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between" style="background-color: white">
                <div class="mb-3">
                    <h4>Product list</h4>
                </div>
                <div class="mb-3">
                    <a class="btn btn-success"href="{{ route('product.create') }}" style="text-decoration: none"><i
                            class="bi bi-plus-circle-fill"></i> Add new product</a>

                </div>

            </div>
            <div class="card-body">
                <div class="my-2">
                    {{-- <form action="{{ route('product.index') }}" method="get">
                        @csrf --}}
                    <div class="row ">
                        <div class="col-md-6">
                            <form action="{{ route('generate.pdf') }}" method="post">
                                @csrf
                                <select name='category' class="form-select" id='category'>
                                    <option selected disabled>--Select Category--</option>
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary mt-3">Download PDF</button>
                            </form>
                            {{-- <input type="submit" class="btn btn-success" /> --}}
                        </div>
                    </div>
                    </form>
                </div>

                <table class="table table-bordered table-hover justify-contenet-center">
                    <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Model no</th>
                            <th scope="col">Image</th>
                            <th scope="col">Size</th>
                            <th scope="col">Color</th>
                            <th scope="col">Mrp</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Category</th>
                            {{-- <th scope="col">Vendor sku</th> --}}

                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($products as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->modelno ?? '' }}</td>
                                {{-- }} <td><img src="{{ asset('product/' . $data->image) }}" style="height: 200px"
                                        alt="{{ $data->image }}"></td> --}}
                                <td> <img src="{{ $data->image }}" style="height:250px" /></td>
                                <td>{{ $data->size ?? '' }}</td>
                                <td>{{ $data->color ?? '' }}</td>
                                <td>{{ $data->mrp ?? '' }}</td>
                                <td>{{ $data->stock ?? '' }}</td>
                                <td>{{ $data->name ?? '' }}</td>
                                <td>{{ $data->vendor ?? '' }}</td>

                                <td>
                                    <a href={{ route('product.edit', $data->id) }} class="bg-success p-2 text-white"> <i
                                            class="bi bi-pen-fill"></i></a>
                                    {{-- <a  href={{route('product.destroy',$data->id)}} class="bg-danger p-2 text-white" ><i class="bi bi-trash-fill"></i></a> --}}


                                    <a href="{{ route('product.destroy', $data->id) }}" class="bg-danger p-2 text-white"
                                        onclick="event.preventDefault();deleteProduct(this);">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>

                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        function deleteProduct(element) {
                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: "Do you want to delete this product?",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = element.href;
                                                    Swal.fire(
                                                        'Deleted!',
                                                        'Product has been Deleted.',
                                                        'success'
                                                    )
                                                }
                                            })
                                        }
                                    </script>



                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-end">{{ $products->links() }} </div>
            </div>
        </div>
    </div>
@endsection
