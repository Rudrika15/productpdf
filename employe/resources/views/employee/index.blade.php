@extends('employee.app')
@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<a class="btn btn-info" href="{{Route('employee.create')}}">ADD</a>
<table class="table">

    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">salary</th>

      </tr>
    </thead>
    <tbody>
       @foreach ($employees as  $emp)
       <tr>
       <td>{{$emp->id}}</td>
       <td>{{$emp->name}}</td>
       <td>{{$emp->salary}}</td>

    <td>
        <a href="{{route('employee.edit',$emp->id)}}" class="btn btn-danger">EDIT</a>
        <a href="{{route('employee.destroy',$emp->id)}}" class="btn btn-primary",emp->id>DELETE</a>

    </td>



       </tr>



       @endforeach


         </tbody>
  </table>


@endsection
