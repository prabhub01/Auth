@extends('layouts.app')
@section('content')
<div class="container">
<div class="row" style="margin-top:20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Update User's Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('role') }}"> Back</a>
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

<form action="{{ route('updateuser', $details->id ) }}" method="POST">
    @csrf
    <!-- @method('PUT') -->
     <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group col-md-6">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{ $details->name }}">
            </div>

            <div class="form-group col-md-6">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" value="{{ $details->email }}">
            </div>
            
            <div class="form-group col-md-6">
                <strong>Role:</strong>
                <select name="role_id" class="form-control">
                @foreach($data as $role_info) 
                <option value="{{ $role_info->id }}" {{ $role_info->id == $details->role->id ? 'selected':''  }}> {{ $role_info->role }} </option>
                @endforeach

                {{-- @foreach ($data as $bus)
                <option value="{{ $bus->id }}" {{ $bus->id == $info->bus->id ? 'selected':''}}> {{ $bus->reg_num }} </option>
                @endforeach --}}


                </select>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endsection