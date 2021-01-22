@extends('layouts.app')
@section('content')
<div class="container">
<div class="row" style="margin-top:20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Route</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="addroute-submit" method="POST">
    @csrf
  
     <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group col-md-6">
                <strong>Route Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name of the route">
                
            </div>
            <div class="form-group col-md-6">
                <strong>From:</strong>
                <input type="text" name="start_from" class="form-control" placeholder="Start Point">
            </div>
            <div class="form-group col-md-6">
                <strong>To:</strong>
                <input type="text" name="final_destination" class="form-control" placeholder="End Point">
            </div>

            <div class="form-group col-md-6">
                <strong>Select Bus:</strong>
                <select name="bus_id" class="form-control">
                @foreach ($data as $bus_id)
                    <option value="{{ $bus_id->id }}">{{ $bus_id->reg_num }}</option>
                @endforeach
                </select>
            </div>
            

            <div class="form-group col-md-6">
                <strong>Price:</strong>
                <input type="number" name="price" class="form-control">
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection