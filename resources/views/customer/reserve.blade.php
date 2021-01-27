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
            <td>{{ $details->name }}</td>
            <td>{{ $details->start_from }}</td>
            <td>{{ $details->final_destination }}</td>
            <td>{{ $details->price }}</td>
            <td>{{ $details->bus->reg_num }}</td>
         </tr>
     </table>
     <div class="row col-xs-12 col-sm-12 col-md-12" style="margin-top:20px;">
     <div class="form-group col-md-6">
                <strong>Your Name:</strong>
                <input type="text" name="cus_name" value="{{ old('cus_name') }}" class="form-control" placeholder="Your Full Name">
    </div>
    <div class="form-group col-md-6">
                <strong>Your Phone Num:</strong>
                <input type="number" name="cus_phone" value="{{ old('cus_phone') }}" class="form-control" placeholder="Your Contact Number">
    </div>
    <div class="form-group col-md-3">
                <strong>Seats:</strong>
                <input type="hidden" id="price" class="form-control" value="{{ $details->price }}" placeholder="Enter Price">
                <input type="number" id="seats" name="seats" oninput="calculate()" value="{{ old('seats') }}" class="form-control" placeholder="Seats Required">
    </div>
    <div class="form-group col-md-3">
                <strong>Total Price:</strong>
                <input type="number" id="total" name="price" value="{{ old('price') }}" class="form-control" readonly>
    </div>
                <!-- hidden field to store values only -->
                <input type="hidden" name="bus_id" class="form-control" value="{{ $details->bus_id }}">
                <input type="hidden" name="route_id" class="form-control" value="{{ $details->id }}">
             
    <div class="form-group col-md-3">
                <strong>Date:</strong>
                <input type="date" min="{{ date('Y-m-d') }}" name="date" class="form-control">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Book Now</button>
        </div>
    </div>
</form>
</div>
@endsection