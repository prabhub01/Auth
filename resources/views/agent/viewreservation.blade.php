@extends('layouts.app')
@section('content')
<div class="container">
<div class="row" style="margin-top:20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Booking Information</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div> <br/>
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

    <table class="table table-bordered table-sm">
         <tr>
            <th>Date</th>
            <td>{{ $info->date}}</td>
        </tr>
        <tr>
            <th>Route Name</th>
            <td>{{ $info->route->name }}</td>
        </tr>
        <tr>
            <th>From</th>
            <td>{{ $info->route->start_from }}</td>
        </tr>
        <tr>
            <th>To</th>
            <td>{{ $info->route->final_destination }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $info->cus_name }}</td>
        </tr>
        <tr>
            <th>Contact</th>
            <td>{{ $info->cus_phone }}</td>
        </tr>
        <tr>
            <th>Num of Seats</th>
            <td>{{ $info->seats}}</td>
        </tr>
        <tr>
            <th>Price per Seat</th>
            <td>Rs. {{ $info->price }}</td>
        </tr>
     </table>
    
</div>
@endsection