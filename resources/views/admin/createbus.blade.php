@extends('layouts.app')
@section('content')
<div class="container">
<div class="row" style="margin-top:20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Bus</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('bus') }}"> Back</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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

<form action="addbus-submit" method="POST">
    @csrf
  
     <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group col-md-6">
                <strong>Bus Type:</strong>
                <select class="form-control" name="type">
                <option value="" disabled selected>--Select One--</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Semi-Deluxe">Semi-Deluxe</option>
                <option value="Full AC">Full AC</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <strong>Registration Number:</strong>
                <input type="text" name="reg_num" class="form-control" placeholder="Your Vehicle's Number Plate">
            </div>

            <div class="form-group col-md-6">
                <strong>Seat Capacity:</strong>
                <input type="number" name="seat_capacity" class="form-control">
            </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection