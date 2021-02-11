@extends('layouts.app')
@section('content')
<div class="container">
<div class="row" style="margin-top:20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update this Bsus Details</h2>
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

<form action="{{ route('updatebus', $details->id ) }}" method="POST">
    @csrf
    <!-- @method('PUT') -->
     <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group col-md-6">
                <strong>Bus Type:</strong>
                <select name="bus_type_id" class="form-control">
                @foreach($type as $b_type) 
                <option value="{{ $b_type->id }}" {{ $b_type->id == $details->bus_type->id ? 'selected':''  }}> {{ $b_type->bus_type }} </option>
                @endforeach
                </select>

            </div>

            <div class="form-group col-md-6">
                <strong>Route:</strong>
                <select name="route_id" class="form-control">
                @foreach($route as $route_val) 
                    <option value="{{ $route_val->id }}" {{ $route_val->id == $details->route->id ? 'selected':''  }}> {{ $route_val->name }} </option>
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <strong>Registration Number:</strong>
                <input type="text" name="reg_num" class="form-control" value="{{ $details->reg_num }}">
            </div>

            <div class="form-group col-md-6">
                <strong>Seat Capacity:</strong>
                <input type="number" name="seat_capacity" class="form-control" value="{{ $details->seat_capacity }}">
            </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection