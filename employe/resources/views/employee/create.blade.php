@extends('employee.app')
@section('content')

@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif

  <a href="{{Route('employee.index')}}" class="btn btn-link">back to table</a>
<form action="{{Route('employee.store')}}" method="post" class="mt-3" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" name="name"  aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">salary</label>
        <input type="number" name="salary" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>



    <button type="submit" class="btn btn-primary">Submit</button>
  </form>









@endsection
