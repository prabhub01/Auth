@extends('layouts.app')
@section('content')
<div class="container">

    <form action="addrole-submit" method="POST">
        @csrf
         <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                <div class="form-group col-md-6">
                    <strong>Role Name:</strong>
                    <input type="text" name="role" class="form-control" placeholder="Define a role here">
                </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>
@endsection