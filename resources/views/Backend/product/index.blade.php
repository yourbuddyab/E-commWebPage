@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Product List </div>
                        <div class="col-md-6 text-right"><a href="/product/create" class="h5 text-dark"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Product No.</td>
                                <td>Product Name</td>
                                <td>Quantity</td>
                                <td>Price</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produect as $item)
                                <tr>
                                    <td>{{$item->number}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        <form action="/status/{{$item->id}}" method="post"> 
                                            @csrf
                                            @method('patch')
                                            <input type="text" hidden name="check" value="{{$item->status}}">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" {{$item->status == 0 ? '' : 'checked'}} name="status" onclick="this.form.submit()" value="{{$item->status}}" id="customSwitch{{$item->id}}">
                                                    <label class="custom-control-label" for="customSwitch{{$item->id}}">{{$item->status == 0 ? 'OFF' : 'ON'}}</label>
                                                </div>
                                            </div>
                                        </form>    
                                    </td>
                                    <td class="d-flex">
                                        <a href="/product/{{$item->id}}/edit" class="btn btn-info mr-2">Edit</a>
                                        <form action="/product/{{$item->id}}" method="post"> 
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>   
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
