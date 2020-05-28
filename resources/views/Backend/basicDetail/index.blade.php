@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">Site Basic Detail</div>
                        <div class="col-md-6 text-right"></div>
                    </div>
                 </div>
                <div class="card-body">
                @if (!empty($detail))
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{$detail->logo}}" alt="">
                    </div>
                    <div class="col-md-6 p-5 btn">
                        <h2>{{$detail->name}}</h2>
                        <h5>{{$detail->email}}</h5>
                        <h5>{{$detail->number}}</h5>
                        <p>{{$detail->footer}}</p>
                        <a href="/detail/{{$detail->id}}/edit" class="btn btn-info" >Edit</a>
                    </div>
                </div>
                @else
                <div class="text-center">
                    <h3>Welcome!!</h3>
                    <a href="/detail/create" class="bg-dark btn text-white">Please click!! And Fill Basic Detail</a>
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
