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
            <th>State</th>
            <th>District</th>
            <th>Price</th>
            <th>Bus Number</th>
        </tr>
        <tr>
            <td>{{ $details->name }}</td>
            <td>{{ $details->start_from }}</td>
            <td>{{ $details->state->state_name }}</td>
            <td>{{ $details->district->district_name }}</td>
            <td>Rs. {{ $details->price }}</td>
            <td>
                    <select name="bus_id" id="busid" class="form-control">
                        @foreach ($regBus as $buses)
                            <option value="{{$buses->id}}">{{$buses->reg_num}}</option>
                        @endforeach
                    </select>
            </td>
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
    {{-- <div class="form-group col-md-2">
        <strong>Total Seats:</strong>
        <input type="number" id="totalseats" name="available_seats" value="" class="form-control" placeholder="" readonly>
    </div> --}}
    <div class="form-group col-md-3">
                <strong>Seats:</strong>
                <input type="number" id="seats" name="seats" oninput="calculate()" value="{{ old('seats') }}" class="form-control" placeholder="Seats Required">
                <input type="hidden" id="price" class="form-control" value="{{ $details->price }}" placeholder="Enter Price">
                <input type="hidden" id="" name="route_id" class="form-control" value="{{ $details->id }}">

    </div>
    <div class="form-group col-md-3">
                <strong>Total Price:</strong>
                <input type="number" id="total" name="price" value="{{ old('price') }}" class="form-control" readonly>
    </div>
    <div class="form-group col-md-3">
                <strong>Date:</strong>
                <input type="date" min="{{ date('Y-m-d') }}" name="date" class="form-control">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if ($nobus->isEmpty())
            <button type="submit" class="btn btn-primary" disabled='disabled'> Can't Book </button><br>
            <small>This route is currently closed due to unavailability of bus</small>
        @else
            <button type="submit" class="btn btn-primary"> Book Now </button>
        @endif
    </div>
    </div>
</form>
</div>
@endsection