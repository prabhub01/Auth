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
                <h3>List of all buses </h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('addbus') }}"> Add New Bus</a>
            </div>
    </div>
        <tr>
            <th>I.D.</th>
            <th>Bus Type</th>
            <th>Bus Number</th>
            <th>Seat Capacity</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($businfo as $bus)
        <tr>
            <td>{{ $bus->id }}</td>
            <td>{{ $bus->type }}</td>
            <td>{{ $bus->reg_num }}</td>
            <td>{{ $bus->seat_capacity }}</td>
            <td>
                    <a class="btn btn-primary" href="{{ route('editbus',$bus->id) }}">Edit</a>
                    <button class="btn btn-danger remove-bus" data-id="{{ $bus->id }}" data-action="{{ route('deletebus', $bus->id) }}">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection