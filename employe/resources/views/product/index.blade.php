@extends('employee.app')
@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="">
    <a href="{{Route('product.create')}}" class="btn btn-success">Add product</a>
</div>

<div class="d-flex justify-content-between mx-5">

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">price</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($product as $data )
      <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->price}}</td>
        <td>
            <a href="{{route('product.edit',$data->id)}}" class="btn btn-secondary">Edit</a>
            <a href="{{route('product.destroy',$data->id)}}" class="btn btn-success">delete</a>
        <td>
      </tr>

      @endforeach
    </tbody>
  </table>

@endsection
