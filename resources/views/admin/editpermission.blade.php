@extends('layouts.app')
@section('content')
<div class="container">
  
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a class="btn btn-primary" href="{{ route('role') }}"> Back</a>
    </div>
    <form action="{{ route('updatePermission', $permission->id ) }}" method="POST">
        @csrf
        <!-- @method('PUT') -->
         <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                <div class="form-group col-md-6">
                    <strong>Permission Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection