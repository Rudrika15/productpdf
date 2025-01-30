@extends('employee.app')
@section('content')
<h1>radheeeeeeeeee krishnnnn</h1>

@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif


<a href="{{Route('employee.index')}}" class="btn btn-link">back to table</a>
<form action="{{Route('employee.update')}}" method="post" class="mt-3">
    @csrf
    <input type="hidden" name="id"  value="{{$employees->id}}"/>
    <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" name="name" value={{$employees->name}} aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">salary</label>
        <input type="number" name="salary" class="form-control" value={{$employees->salary}}id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>



    <button type="submit" class="btn btn-primary">update</button>
  </form>











@endsection
