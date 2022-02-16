@extends('layouts.web')

@section('content')
<form action="/edit" method="POST" enctype="multipart/form-data" class="m-5" >
    <h3 class="bg-primary text-light m-3 p-3 text-center">Update mployee Data</h3>
    @if ($message = Session::get('success'))
        <div class="alert-success">{{$message}}</div>
    @endif
       @csrf
       <input type="hidden" name="id" value="{{$employees['id']}}">
       <div class="form-group mb-2">
        <input type="file" name="image" class="form-control">
     </div>
       <div class="form-group mb-2">
           <input type="text" name="first_name" class="form-control" placeholder="Enter Employee First Name" value="{{$employees['first_name']}}">
       </div>
       <div class="form-group mb-2">
           <input type="text" name="last_name" class="form-control" placeholder="Enter Employee Last Name" value="{{$employees['last_name']}}">
       </div>
       <div class="form-group mb-2">
           <input type="text" name="email" class="form-control" placeholder="Enter Employee Email" value="{{$employees['email']}}">
       </div>
       <div class="form-group mb-2">
           <input type="text" name="pho_no" class="form-control" placeholder="Enter Employee Phone Number" value="{{$employees['pho_no']}}">
       </div>
       <div class="form-group mb-2">
           <input type="text" name="address" class="form-control" placeholder="Enter Employee Address" value="{{$employees['address']}}">
       </div>
       <div class="form-group mb-2">
          <button type="submit" class="btn btn-success form-control">Update</button>
       </div>
</form>
@endsection
