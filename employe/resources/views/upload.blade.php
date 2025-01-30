
@extends('employee.app')
@section('content')
<div>

    <h1>upload file</h1>
    <form action="upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type=file name="file">
        <button class="btn btn-primary">upload</button>

    </form>

</div>
@endsection

