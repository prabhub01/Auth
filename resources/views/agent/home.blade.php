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
            <td>{{ $val->cus_name }}</td>

            <td>
                <form action="{{ route('confirmbooking', $val->id) }}" method="get">
                    <a class="btn btn-info" href="{{ route('morebooking', $val->id) }}">View More</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success">Confirm</button>
                </form>
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
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addbus') }}"> Add New Bus</a>
            </div>
    </div>
        <tr>
            <th>S.N.</th>
            <th>Bus Type</th>
            <th>Bus Number</th>
            <th>Seat Capacity</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $bus)
        <tr>
            <td>{{ $bus->id }}</td>
            <td>{{ $bus->type }}</td>
            <td>{{ $bus->reg_num }}</td>
            <td>{{ $bus->seat_capacity }}</td>

            <td>
                <form action="{{ route('deletebus', $bus->id) }}" method="get">
                    <a class="btn btn-primary" href="{{ route('editbus',$bus->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
<hr>
    <table class="table table-bordered">
    <div class="col-lg-12 margin-tb" style="margin-top:20px;">
    <div class="pull-left">
                <h3>List of all Routes </h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addroute') }}"> Add New Route</a>
            </div>
    </div>
        <tr>
            <th>S.N.</th>
            <th>Route Name</th>
            <th>From</th>
            <th>To</th>
            <th>Price</th>
            <th>Bus Number</th>
            <th width="280px">Action</th>
        </tr>
    @foreach($route as $info)
        <tr>
            <td>{{ $info->id }}</td>
            <td>{{ $info->name }}</td>
            <td>{{ $info->start_from }}</td>
            <td>{{ $info->final_destination }}</td>
            <td>Rs {{ $info->price }}</td>
            <td>{{ $info->bus_id }}</td>
          
            <td>
                <form action="{{ route('deleteroute', $info->id) }}" method="get">
                    <a class="btn btn-primary" href="{{ route('editroute', $info->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>







</div>
@endsection
