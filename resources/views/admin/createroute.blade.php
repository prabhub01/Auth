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
            <div class="form-group col-md-4">
                <strong>Route Name:</strong>
                <input type="text" name="name" class="form-control" {{ old('name') }} placeholder="Name of the route">
            </div>

            <div class="form-group col-md-4">
                <strong>Select Bus:</strong>
                <select name="bus_id" class="form-control" {{ old('bus_id') }}>
                @foreach ($data as $bus_id)
                    <option value="{{ $bus_id->id }}">{{ $bus_id->reg_num }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <strong>Price:</strong>
                <input type="number" name="price" {{ old('price') }} class="form-control">
            </div>

            <div class="form-group col-md-4">
                <strong>Startig From:</strong>
                <input type="text" name="start_from" {{ old('start_from') }} class="form-control" placeholder="Kathmandu">
            </div>

            <div class="form-group col-md-4">
                <strong>Destination Provience:</strong>
                <select class="form-control" id="state" name="state_id" {{ old('state') }}>
                <option selected disabled>--Select State--</option>
                @foreach ($states as $state)
				    		<option value="{{ $state->id }}">{{ $state->state_name }}</option>
				    	@endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <strong>Destination District:</strong>
                <select class="form-control" name="district" id="district" {{ old('district') }}>
                </select>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection