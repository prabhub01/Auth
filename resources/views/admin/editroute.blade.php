@extends('layouts.app')
@section('content')
<div class="container">
<div class="row" style="margin-top:20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update this Route Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('route') }}"> Back</a>
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

<form action="{{ route('updateroute', $info->id ) }}" method="POST">
    @csrf
    <!-- @method('PUT') -->
     <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group col-md-6">
                <strong>Route Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ $info->name }}">
            </div>
            <div class="form-group col-md-6">
            <strong>From:</strong>
                <input type="text" name="start_from" class="form-control" value="{{ $info->start_from }}">
            </div>

            <div class="form-group col-md-6">
                <strong>Destination Provience:</strong>
                <select class="form-control" id="state" name="state_id">
                <option selected disabled>--Select State--</option>
                @foreach ($state as $states)
                    <option value="{{ $states->id }}" {{ $info->state_id == $states->id ? 'selected':''  }}> {{ $states->state_name }} </option>    
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <strong>Destination District:</strong>
                <select class="form-control" name="district_id" id="district">
                    @foreach ($districts as $district_value)
                            <option value="{{ $district_value->id }}" {{ $info->id == $info->id ? 'selected':''  }}> {{ $district_value->district_name }} </option>                          
                         @endforeach
                    {{-- <option value="{{ $info->district_id }}" {{ $info->id == $info->id ? 'selected':''  }}> {{ $info->district->district_name }} </option> --}}
                </select>
            </div>
            
            <div class="form-group col-md-6">
                <strong>Select Bus:</strong>
                <select name="bus_id" class="form-control">
                @foreach ($data as $bus)
                <option value="{{ $bus->id }}" {{ $bus->id == $info->bus->id ? 'selected':''}}> {{ $bus->reg_num }} </option>
                @endforeach
                </select>

            </div>
            <div class="form-group col-md-6">
                <strong>Price:</strong>
                <input type="number" name="price" class="form-control" value="{{ $info->price }}">
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection