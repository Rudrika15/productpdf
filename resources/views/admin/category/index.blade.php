@extends('admin.layouts.app')

@section('title', 'Bassion || Category view')
@section('content')
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between  mb-3">
                    <div class="p-2 ">Category List</div>
                    <div class="p-2"><a class="text-dark"href="{{ route('category.create') }}"
                            style="text-decoration: none"><i class="bi bi-plus-circle-fill"></i> Add new category</a></div>
                </div>

            </div>
           

            <div class="card-body">

                <table class="table table-bordered table-hover justify-contenet-center">
                    <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Option</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($categories as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->name ?? '' }}</td>
                                <td>
                                    <a href={{ route('category.edit', $data->id) }} class="bg-success p-2 text-white"> <i
                                            class="bi bi-pen-fill"></i></a>
                                            <a href={{route('product.bulkcreate')}} class="bg-success p-2 text-white"><i class="bi bi-plus-circle-fill"></i>Import data</a>
                                    {{-- <a  href={{route('product.destroy',$data->id)}} class="bg-danger p-2 text-white" ><i class="bi bi-trash-fill"></i></a> --}}


                                    {{-- <a href="{{ route('category.destroy', $data->id) }}"
                                        class="bg-danger p-2 text-white"
                                        onclick="event.preventDefault();deleteProduct(this);">
                                        <i class="bi bi-trash-fill"></i>
                                    </a> --}}

                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        function deleteProduct(element) {
                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: "Do you want to delete this category?",
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
                                                        'category has been Deleted.',
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
            </div>
        </div>
    </div>
@endsection
