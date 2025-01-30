@extends("employee.app")
@section('content')

@if (Session::has('message'))
<div class="alert alert-success">
{{ Session::get('message') }}
</div>
@endif

  <a href="{{Route('item.index')}}" class="btn btn-link">back to table</a>
<form action="{{Route('item.store')}}" method="post" class="mt-3" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" name="item_name"  aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">code</label>
        <input type="text" class="form-control" name="code"  aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">price</label>
        <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
           <div class="mb-3">
        <label for="formFile" class="form-label">upload img</label>
        <input class="form-control" type="file" id="formFile" name='img[]' multiple>
      </div>


    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>




@endsection
