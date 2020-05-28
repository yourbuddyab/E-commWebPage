@extends('layouts.frontend')
@section('content')
<style>
    .file-upload{
  background-position: center center!important;
  background-repeat: no-repeat!important;
  background-size: cover!important;
  height: 250px!important;
  width: 250px!important;
  }
  </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Product</div>
                <div class="card-body">
                    <form action="/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                          <label for="name">Product Name</label>
                          <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}" placeholder="Enter Your Product Name">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="number">Product No</label>
                                <input type="text" name="number" id="number" class="form-control" value="{{$product->number}}" placeholder="Enter Your Number Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" value="{{$product->quantity}}" placeholder="Enter Your Quantity Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}" placeholder="Enter Your Price Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <input type="text" name="category" id="category" class="form-control" value="{{$product->category}}" placeholder="Enter Your Category Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description" aria-describedby="helpId">{{$product->description}}</textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Upload Proudct Pictures</label>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="file" name="pic1" class="form-control my-2 upload_pic" id="profile1">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="file" name="pic2" class="form-control my-2 upload_pic" id="profile2">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="file" name="pic3" class="form-control my-2 upload_pic" id="profile3">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="file" name="pic4" class="form-control my-2 upload_pic" id="profile4">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-info w-25">Submit</button>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-3">
                            <div class="file-upload" id="image1" style="background-image: url({{$product->pic1}})">{{$product->pic1}}</div>
                          </div>
                          <div class="form-group col-md-3">
                            <div class="file-upload" id="image2" style="background-image: url({{$product->pic2}})"></div>
                          </div>
                          <div class="form-group col-md-3">
                            <div class="file-upload" id="image3" style="background-image: url({{$product->pic3}})"></div>
                          </div>
                          <div class="form-group col-md-3">
                            <div class="file-upload" id="image4" style="background-image: url({{$product->pic4}})"></div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
      $('#profile1').change(function(e) {
        var url = URL.createObjectURL(e.target.files[0]);
        var z = 'background-image:url(' + url + ')';
        $('#image1').attr('style', z);
      });
      $('#profile2').change(function(e) {
        var url = URL.createObjectURL(e.target.files[0]);
        var z = 'background-image:url(' + url + ')';
        $('#image2').attr('style', z);
      });
      $('#profile3').change(function(e) {
        var url = URL.createObjectURL(e.target.files[0]);
        var z = 'background-image:url(' + url + ')';
        $('#image3').attr('style', z);
      });
      $('#profile4').change(function(e) {
        var url = URL.createObjectURL(e.target.files[0]);
        var z = 'background-image:url(' + url + ')';
        $('#image4').attr('style', z);
      });
  
    });

  </script>
@endsection
