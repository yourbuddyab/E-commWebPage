@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Basic Details Edit</div>
                <div class="card-body">
                    {{$errors}}
                   <form action="/detail/{{$detail->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <div class="form-group">
                          <label for="name">Enter Site Name</label><span class="text-danger">*</span>
                          <input type="text" name="name" id="name" class="form-control" value="{{$detail->name}}" placeholder="Enter Your Site Name">
                        </div>
                        <div class="form-group">
                          <label for="number">Enter Number</label><span class="text-danger">*</span>
                          <input type="text" name="number" id="number" class="form-control" value="{{$detail->number}}" placeholder="Enter Your Toll Free Number">
                        </div>
                        <div class="form-group">
                          <label for="email">Email Address</label><span class="text-danger">*</span>
                          <input type="text" name="email" id="email" class="form-control" value="{{$detail->email}}" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                          <label for="footer">Footer</label><span class="text-danger">*</span>
                        <textarea type="text" name="footer" id="footer" class="form-control" placeholder="Enter Footer Tag Lines">{{$detail->footer}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="logo">Logo</label><span class="text-danger">*</span>
                          <input type="file" class="form-control" name="logo" value="{{$detail->logo}}" id="logo" placeholder="Upload Logo">
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
