@extends('layouts.frontend')
@section('content')

    <div class="card m-2">
      <div class="card-header">Product image Upload</div>
      <div class="card-body">
        <form action="/imagesstore/" method="post">
          @csrf 
          @method('PATCH')
            <div class="row" id="#preiv">

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary w-25">Submit</button>
            </div>
        </form>
      </div>
    </div>
    
@endsection