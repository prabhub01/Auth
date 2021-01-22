@extends('layouts.app')
@section('content')
<div class="container">
<div class="row" style="margin-top:20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Book This Ticket</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
        </div> <br/>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br> <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('booknow') }}" method="POST">
    @csrf
    <table class="table table-bordered">
     <tr>
            <th>Route Name</th>
            <th>From</th>
            <th>To</th>
            <th>Price</th>
            <th>Bus Number</th>
        </tr>
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->start_from }}</td>
            <td>{{ $data->final_destination }}</td>
            <td>{{ $data->price }}</td>
            <td>{{ $data->bus_id }}</td>
         </tr>
     </table>
     <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
     <div class="form-group col-md-6">
                <strong>Your Name:</strong>
                <input type="text" name="cus_name" class="form-control" placeholder="Your Full Name">
    </div>
    <div class="form-group col-md-6">
                <strong>Your Phone Num:</strong>
                <input type="number" name="cus_phone" class="form-control" placeholder="Your Contact Number">
    </div>
    <div class="form-group col-md-3">
                <strong>Seats:</strong>
                <input type="number" name="seats" class="form-control" placeholder="Seats Required">
    </div>
                <!-- hidden field to store values only -->
                <input type="hidden" name="bus_id" class="form-control" value="{{ $data->bus_id }}">
                <input type="hidden" name="route_id" class="form-control" value="{{ $data->id }}">

    <div class="form-group col-md-3">
                <strong>Price:</strong>
                <input type="number" name="price" class="form-control" value="{{ $data->price }}" readonly>
    </div>
    <div class="form-group col-md-3">
                <strong>Date:</strong>
                <input type="date" name="date" class="form-control">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Book Now</button>
        </div>
    </div>
</form>
</div>
@endsection