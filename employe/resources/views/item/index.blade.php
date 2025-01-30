@extends('employee.app')
@section('content')

@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif


<div class="mx-auto" style="width: 200px;">
    Centered element
  </div>

<div class="mx=auto"style="width:200px;">

    <a href="{{Route('item.create')}}" class="btn btn-success">Add item</a>
</div>

<div class="d-flex justify-content-between mx-5">

<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">item_name</th>
        <th scope="col">code</th>
        <th scope="col">price</th>
        <th scope="col">img</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($item as $data )
      <tr>
        <td>{{$data->id}}</td>
       <td>{{$data->item_name}}</td>
       <td>{{$data->code}}</td>
       <td>{{$data->price}}</td>
       <td><img src="{{ asset('images/' . $data->img) }}" />
        
       </td>


       <td>
        <a href="{{Route('item.edit',$data->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('item.destroy',$data->id)}}" class="btn btn-primary">Delete</a>
       </td>

      </tr>

      @endforeach
    </tbody>
  </table>






@endsection
