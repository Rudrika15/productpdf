@extends('employee.app')
@section('content')


@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif

  <a href="{{Route('product.index')}}" class="btn btn-link">back to table</a>
<form action="{{Route('product.store')}}" method="post" class="mt-3">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" name="name"  aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">price</label>
        <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>








@endsection
