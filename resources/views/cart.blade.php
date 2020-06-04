@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <h4>{{$product->name}}</h4>
        <h6>${{$product->price}}</h6>
            @if (Auth::user() == null)
                <script type="text/javascript">
                    alert("First Please Login");
                    window.location.href = "/login";
                </script>
            @else
            <form action="{{route('payment')}}" method="post">
                @csrf
                <input type="hidden" id="CUST_ID" name="CUST_ID" value="CUST001">
                <input type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail">
                <input type="hidden"  id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
                <div class="form-group">
                    <label>Order ID:</label>
                    <input type="text" class="form-control" id="ORDER_ID" name="ORDER_ID" size="20" maxlength="20" autocomplete="off" tabindex="1" value="<?php echo  "ORDER" . rand(10000,99999999)?>">
                </div>
                <div class="form-group">
                    <label>Amount to Pay: 20</label>
                    <input type="hidden" name="price" value="20">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label pr-4">
                        <input type="radio" class="form-check-input" name="payment_type" id="payment_type" value="cod">
                        COD
                      </label>
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="payment_type" id="payment_type" value="paytm">
                        Paytm
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="CheckOut" class="btn btn-success btn-lg" style="background-color:#0000FF; margin-left: 37%;">
                </div>
            </form>
            <form action="/cart" method="post">
                
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Customer Name" value="{{Auth::User()->name}}">
                    <input type="text" name="id" id="name" class="form-control" placeholder="Customer Name" hidden value="{{Auth::User()->id}}">
                    <input type="text" name="price" id="price" class="form-control" placeholder="Customer Name" hidden value="{{$product->price}}">
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
                    <div class="col-md-6">
                        <label for="">Total Item</label>
                        <div class="buttonAdd">
                            <div class="dec button btn btn-secondary" id="buttonless">-</div>
                            <input type="text"
                                class="cartInput"
                                name="cart" id="cart" value="{{$cart->quantity}}"
                            >
                            <div class="inc button btn btn-secondary" id="buttonincrease">+</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <label for="">Amount</label>
                       <input type="text" name="" class="form-control" value="<?php 
                    $total=$product->price*$cart->quantity ;
                    echo $total;
                    ?>" disabled id="cartvalue"></div>
                    <div class="col-md-12 mb-1">
                      <button class="btn btn-info" type="submit">Add to bag</button>
                    </div>
                </div>
            </form>
            @endif
        </div>  
        <div class="col-md-5">
            <div class="main-img">
                <img class="changepic" src="/{{$product->pic1}}">
            </div>
            <div class="additional-img">
              <img class="click-pic" src="/{{$product->pic1}}">
              <img class="click-pic2" src="/{{$product->pic2}}">
              <img class="click-pic3" src="/{{$product->pic3}}">
              <img class="click-pic4" src="/{{$product->pic4}}">
            </div>
          </div>  
    </div>    
</div>
<script>
    $('#buttonless').click(function(){
        var g = $('#cart').val()-1;
        var price = $('#price').val();
        d = g * price;
        $('#cartvalue').val(d)
        console.log("less ="+d+ "cart="+g);
    });
    $('#buttonincrease').click(function(){
        var gg = $('#cart').val();
        var total = parseInt(gg) + parseInt(1);
        var price = $('#price').val();
        da = total * price; 
        $('#cartvalue').val(da)
    })
</script>
@endsection