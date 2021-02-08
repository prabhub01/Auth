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

<form action="{{ route('updaterole', $details->id ) }}" method="POST">
    @csrf
    <!-- @method('PUT') -->
     <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
            <div class="form-group col-md-6">
                <strong>Role:</strong>
                <input type="text" name="name" class="form-control" value="{{ $details->name }}">
            </div>
            
            <div class="form-group col-md-6">
                <strong>Permissions:</strong>

                <select name="rolePermission[]" class="form-control roles" multiple>
                @foreach($permissions as $per) 
                <option value="{{ $per->id }}" {{ $per->id == in_array($per->id, $rolePermissions) ? 'selected':'' }}> 
                    {{ $per->name }} 
                </option>
                @endforeach
                </select>

                {{-- <select class="roles form-control" name="roles[]" multiple="multiple">
                   <option value="1">Admin</option>
                   <option value="2">Agent</option>
                   <option value="3">Customer</option>
                  </select> --}}
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

</div>
@endsection