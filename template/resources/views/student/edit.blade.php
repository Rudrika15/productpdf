@extends('app')
@section('content')

@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif



<div class="d-flex justify-content-between mx-5">
    <div class="">
        <h3></h3>
    </div>
    <div class="">
        <a href="{{route('student.index')}}" class="btn btn-success">Back</a>
    </div>
</div>

<form action="{{route('student.update')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$students->id}}"/>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">name</label>
    <input type="text" class="form-control" name="name" value={{$students->name}}>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">email</label>
    <input type="email" class="form-control" name="email"  value="{{$students->email}}"id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">city</label>
    <input type="text" class="form-control" name="city"  value="{{$students->city}}"id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">address</label>
    <textarea  name="address" id="" class="form-control">{{$students->address}}</textarea>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">course</label>
   <select name="courseId" value="{{$students->courseId}}" class="form-control" id="">
    <option value="1">MCA</option>
    <option value="1">BCA</option>
    <option value="1">MBA</option>
    <option value="1">BBA</option>
   </select>
  </div>
  <button type="submit" class="btn btn-dark">UPDATE</button>

</form>





@endsection
