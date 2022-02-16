@extends('layouts.web')
@section('content')
    <div class="container">
        <h3 class="bg-primary text-light m-3 p-3 text-center">Manage Your Site Here</h3>
        @if ($message = Session::get('success'))
            <div class="alert-success">{{$message}}</div>
         @endif
         <p class="float-start">All Employees</p>
         <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Employee
          </button>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>

                @foreach ($employees as $employee)
                    <tr>
                        <td>CSE-00{{$employee->id}}</td>
                        <td><img src="{{asset('uploads/employee/'.$employee->image)}}" width="50px" height="50px" alt=""></td>
                        <td>{{$employee->first_name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->pho_no}}</td>
                        <td>{{$employee->address}}</td>
                        <td><a class="btn btn-primary" href="{{'edit/'.$employee['id']}}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{'delete/'.$employee['id']}}">Delete</a></td>
                    </tr>
                @endforeach
            </tr>
        </table>



        <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/insert" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group mb-2">
                 <input type="file" name="image" class="form-control">
                 @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                 @enderror
              </div>
               <div class="form-group mb-2">
                   <input type="text" name="first_name" class="form-control" placeholder="Enter Employee First Name">
                   @error('first_name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                 @enderror
               </div>
               <div class="form-group mb-2">
                   <input type="text" name="last_name" class="form-control" placeholder="Enter Employee Last Name">
                   @error('last_name')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                 @enderror
               </div>
               <div class="form-group mb-2">
                   <input type="text" name="email" class="form-control" placeholder="Enter Employee Email">
                   @error('email')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                 @enderror
               </div>
               <div class="form-group mb-2">
                   <input type="text" name="pho_no" class="form-control" placeholder="Enter Employee Phone Number">
                   @error('pho_no')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                 @enderror
               </div>
               <div class="form-group mb-2">
                   <input type="text" name="address" class="form-control" placeholder="Enter Employee Address">
                   @error('address')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                 @enderror
               </div>
        </div>
        <div class="modal-footer">
          <button type="buttom" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="buttom" class="btn btn-primary">Add</button>
        </div>
    </form>
      </div>
    </div>
  </div>
    </div>
@endsection