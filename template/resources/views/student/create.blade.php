@extends('app')


@section('content')

@if(Session::has('message'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
  </div>
@endif

<div class="d-flex justify-content-between mx-5">
    <div class="">
        <h3>Add Students</h3>
    </div>
    <div class="">
        <a href="{{route('student.index')}}" class="btn btn-success">Back</a>
    </div>
</div>

<form action="{{route('student.store')}}" method="post">
    @csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">name</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">email</label>
    <input type="email" class="form-control" name="email" id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">city</label>
    <input type="text" class="form-control" name="city" id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">address</label>
    <textarea  name="address" id="" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">course</label>
   <select name="courseId" class="form-control" id="">
    <option value="1">MCA</option>
    <option value="1">BCA</option>
    <option value="1">MBA</option>
    <option value="1">BBA</option>
   </select>
  </div>
  <button type="submit" class="btn btn-dark">add</button>

</form>




@endsection
