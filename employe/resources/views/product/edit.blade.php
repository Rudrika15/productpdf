@extends('employee.app')
@section('content')


<h1>radheeeeeeeee</h1>
@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif



<a href="{{route('product.index',)}}" class="btn btn-link">back to table</a>
<form action="{{route('product.update')}}" method="POST" class="mt-3">
    @csrf
    <input type="hidden" name ="id" value="{{$products->id}}"/>
    <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" name="name" value={{$products->name}} aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">price</label>
        <input type="number" name="price" class="form-control" value="{{$products->price}}" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>



    <button type="submit" class="btn btn-primary">  UPDATE</button>
  </form>










@endsection

