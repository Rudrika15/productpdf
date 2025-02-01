@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-md-3">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title">No of category</h5>
                  <h6 class="card-title">{{$category}}</h6>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title"> No of Product </h5>
<h6>{{$product}}</h6>
                </div>
              </div>
        </div>
    </div>
</div>


    @endsection
