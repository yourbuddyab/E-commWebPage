@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <h4>{{$product->name}}</h4>
        <h6>${{$product->price}}</h6>
            <form action="/cart" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Customer Name" value="{{Auth::User()->name}}">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Customer Name" hidden value="{{Auth::User()->id}}">
                </div>
                    <div class="form-group">
                        <label for="name">Phone Number</label>
                        <input type="text" name="number" id="number" class="form-control" placeholder="Customer Phone">
                    </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <textarea type="text" name="phone" id="phone" class="form-control" placeholder="Customer Address"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="buttonAdd"></div>
                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-info" type="submit">Add to bag</button>
                    </div>
                </div>
            </form>
        </div>  
        <div class="col-md-5">
            <div class="main-img"><img class="changepic" src="https://i.picsum.photos/id/820/300/300.jpg"></div>
            <div class="additional-img">
              <img class="click-pic" src="https://i.picsum.photos/id/820/300/300.jpg">
              <img class="click-pic2" src="https://i.picsum.photos/id/225/300/300.jpg">
              <img class="click-pic3" src="https://i.picsum.photos/id/740/300/300.jpg">
              <img class="click-pic4" src="https://i.picsum.photos/id/620/300/300.jpg">
            </div>
          </div>  
    </div>    
</div>
<script>
$(document).ready(function(){
    alert('cart');
    $("#buttonless").click(function(){
    var cart = $("#cart").val();
  });
  
});
</script>
@endsection