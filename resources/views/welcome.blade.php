@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6">
            <div class="main-img p-4"><img class="changepic" src="https://i.picsum.photos/id/820/300/300.jpg"></div>
            <div class="additional-img">
                <img class="click-pic" src="https://i.picsum.photos/id/820/300/300.jpg">
                <img class="click-pic2" src="https://i.picsum.photos/id/225/300/300.jpg">
                <img class="click-pic3" src="https://i.picsum.photos/id/740/300/300.jpg">
                <img class="click-pic4" src="https://i.picsum.photos/id/620/300/300.jpg">
            </div>
        </div>
        <div class="col-md-6">
            @foreach ($product as $item)
            <span class="category">{{$item->category}}</span>
            @if ($item->quantity <= 0) <span class="stock bg-danger">out Stock</span>
                @else
                <span class="stock">In Stock</span>
                @endif
                <h1>{{$item->name}}</h1>
                <div class="block-price-rating clearfix">
                    <!--price-->
                    <div class="block-price clearfix">
                        <div class="price-new clearfix">
                            <span class="price-new-dollar">${{$item->price}}</span>
                            <span class="price-new-cent">90</span>
                        </div>
                        <div class="price-old clearfix">
                            <span class="price-old-dollar">$599</span>
                            <span class="price-old-cent">&#8228;90</span>
                        </div>
                    </div>
                    <div class="block-rating clearfix">
                        <!--review-->
                        <span class="review">40 Reviews</span>
                        <span class="rating"><img
                                src="http://thrivedigital.wpengine.com/wp-content/uploads/2015/03/Review-Stars.png"></span>
                    </div>
                </div>
                <div class="descr">
                    <p>{{$item->description}}</p>
                </div>
                <!--SELECT BLOCK-->
                <div class="block-select clearfix ml-3">
                    <form action="/cart/check" method="POST">
                        @csrf
                        <input type="text" hidden name="product_id" value="{{$item->id}}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="buttonAdd {{$item->quantity <= 0 ? "d-none" : "" }}"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-block">
                                    <div class="dec button btn btn-secondary" id="buttonless">-</div>
                                    <input type="text" class="cartInput" name="cart" id="cart" value="1">
                                    <div class="inc button btn btn-secondary" id="buttonincrease">+</div>
                                </div>
                                <button class="btn btn-info" {{$item->quantity <= 0 ? "disabled" : "" }}
                                    type="submit">Add to bag</button>
                            </div>
                        </div>
                        <!--BUTTON-->
                    </form>
                </div>

        </div>
        @endforeach
    </div>
</div>
@endsection