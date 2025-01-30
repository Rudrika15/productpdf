@extends('app')
@section('content')


 @if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif 

    <div class="d-flex justify-content-between mx-5">
        <div class="">
            <h3>Students</h3>
        </div>
        <div class="">
            <a href="{{route('student.create')}}" class="btn btn-success">Add Student</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">Address</th>
                <th scope="col">Course</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->city}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->course}}</td>
                    <td>

                        <a href="{{route('student.edit',$data->id)}}" class="btn btn-secondary">EDIT</a>
                        <a  href="{{route('student.destroy',$data->id)}}" class="btn btn-danger">DELETE</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
