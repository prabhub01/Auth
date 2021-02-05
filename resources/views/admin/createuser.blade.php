@extends('layouts.app')
@section('content')
<div class="container">
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

    <form action="adduser-submit" method="POST">
        @csrf
         <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
                <div class="form-group col-md-6">
                    <strong>Full Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Users Full Name">
                </div>
                <div class="form-group col-md-6">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="User's Email">
                </div>
                <div class="form-group col-md-6">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="User's Passoword">
                </div>
                <div class="form-group col-md-6">
                    <strong>Assign Role:</strong>
                    <select name="role[]" class="form-control select-2" multiple="multiple" placeholder="Select One">
                        <option value="" disabled>---Select Role(s)---</option>
                        @foreach($info as $role_info) 
                            <option value="{{ $role_info->id }}"> {{ $role_info->name }} </option>
                        @endforeach
                    </select>
                 {{-- <input type="text" name="password" class="form-control" placeholder="User's Passoword"> --}}
                </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

</div>
@endsection