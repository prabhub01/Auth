@extends('layouts.app')
@section('content')
<div class="container">

    <form action="addPermission-submit" method="POST">
        @csrf
         <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                <div class="form-group col-md-6">
                    <strong>Permission Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Define a Permission here">
                </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>
@endsection