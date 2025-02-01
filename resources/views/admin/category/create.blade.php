@extends('admin.layouts.app')
@section('content')





@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between  mb-3">
                <div class="p-2 ">category list</div>
                <div class="p-2 "><a class="text-dark" style="text-decoration: none" href="{{route('category.index')}}"><i class="bi bi-arrow-left-circle-fill"></i> Back</a></div>
              </div>

        </div>
        <div class="card-body" >
    <form action="{{route('category.store')}}" method="post">
        @csrf

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">name</label>
                  <input type="text" class="form-control"name="name" id="exampleInputPassword1">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

        </div>
      </div>
</div>
 @endsection














