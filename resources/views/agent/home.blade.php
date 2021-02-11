@extends('layouts.app')

@section('content')
<div class="container">
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

 @if (session('status'))
      <div class="alert alert-success" role="alert">
         {{ session('status') }}
      </div>
 @endif

     <table class="table table-bordered">
    <div class="col-lg-12 margin-tb" style="margin-top:20px;">
    <div class="pull-left">
                <h3>Reservation List </h3>
            </div>
    </div>
        <tr>
            <th>Date</th>
            <th>Route</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($info as $val)
        <tr>
            <td>{{ $val->date }}</td>
            <td>{{ $val->route->name }}</td>  
            <!-- route is the function name of the relationship written in model -->
            <td>{{ $val->cus_name }}</td>

            <td>
                    @can('view-reservation')
                    <a class="btn btn-info" href="{{ route('morebooking', $val->id) }}">View More</a>
                    @endcan
                    @can('delete-reservation')
                    <button class="btn btn-danger delete-ticket" data-id="{{ $val->id }}"
                        data-action="{{ route('deletebooking', $val->id) }}"> Delete </button>
                    @endcan
                    @can('confirm-tickets')
                    <button class="btn btn-success confirm-ticket" data-id="{{ $val->id }}"
                        data-action="{{ route('confirmbooking', $val->id) }}"> Confirm </button>
                    @endcan
            </td>
        </tr>
        @endforeach
    </table>
<hr>

    <table class="table table-bordered">
    <div class="col-lg-12 margin-tb" style="margin-top:20px;">
    <div class="pull-left">
                <h3>List of all buses </h3>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addbus') }}"> Add New Bus</a>
            </div> --}}
    </div>
        <tr>
            <th>I.D.</th>
            <th>Bus Type</th>
            <th>Bus Number</th>
            <th>Seat Capacity</th>
            <th>Assigned Route</th>
        </tr>
        @foreach ($data as $bus)
        <tr>
            <td>{{ $bus->id }}</td>
            <td>{{ $bus->bus_type->bus_type }}</td>
            <td>{{ $bus->reg_num }}</td>
            <td>{{ $bus->seat_capacity }}</td>
            <td>{{ $bus->route->name }}</td>
        </tr>
        @endforeach
    </table>
<hr>
    <table class="table table-bordered">
    <div class="col-lg-12 margin-tb" style="margin-top:20px;">
    <div class="pull-left">
                <h3>List of all Routes </h3>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addroute') }}"> Add New Route</a>
            </div> --}}
    </div>
        <tr>
            <th>I.D.</th>
            <th>Route Name</th>
            <th>From</th>
            <th>To</th>
            <th>Price</th>
        </tr>
    @foreach($route as $in)
        <tr>
            <td>{{ $in->id }}</td>
            <td>{{ $in->name }}</td>
            <td>{{ $in->start_from }}</td>
            <td>{{ $in->district->district_name }}</td>
            <td>Rs {{ $in->price }}</td>
        </tr>
        @endforeach
    </table>

</div>
@endsection
