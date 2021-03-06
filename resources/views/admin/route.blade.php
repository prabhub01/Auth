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
                <h3>List of all Routes </h3>
            </div>
            <div class="pull-right">
                @role('admin|agent')
                <a class="btn btn-success" href="{{ route('addroute') }}"> Add New Route</a>
                @endrole
            </div>
    </div>
        <tr>
            <th>I.D.</th>
            <th>Route Name</th>
            <th>From</th>
            <th>To</th>
            <th>Departure Time</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @if (!empty($route) && $route->count())
            @foreach($route as $in)
            <tr>
                <td>{{ $in->id }}</td>
                <td>{{ $in->name }}</td>
                <td>{{ $in->start_from }}</td>
                <td>{{ $in->district->district_name }}</td>
                @if (!empty($in->departure_time))
                    <td>{{ $in->departure_time }}</td>                
                @else
                   <td><em> Unknown </em> </td> 
                @endif
                <td>Rs {{ $in->price }}</td>
                <td>
                    @can('edit-route')
                        <a class="btn btn-primary" href="{{ route('editroute', $in->id) }}">Edit</a>
                    @endcan
                    @can('delete-route')
                        <button class="btn btn-danger remove-route" data-id="{{ $in->id }}" data-action="{{ route('deleteroute', $in->id) }}">Delete</button>
                    @endcan
                </td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">There are no routes registered.</td>
            </tr>
        @endif
    </table>
</div>
@endsection
