@extends('employee.app');
@section('content')

<h1>helllloooo</h1>
@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif

<a href="{{route('item.index')}}" class="btn btn-danger">back to table</a>

<form action="{{route('item.update')}}" method="post" class="mt-3">
    @csrf
    <input type="hidden" name ="id" value="{{$items->id}}"/>
    <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" name="item_name" value="{{$items->item_name}}" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">code</label>
        <input type="text" class="form-control" name="code" value="{{$items->code}}" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">price</label>
        <input type="number" name="price" class="form-control" value="{{$items->price}}" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">upload img</label>
        <input class="form-control" type="file" id="formFile">
      </div>




    </div>


    <button type="submit" class="btn btn-primary">Update</button>
  </form>








@endsection
