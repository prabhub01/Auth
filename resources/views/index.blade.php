
@extends('layouts.custom')
 
 @section('content')
 <div class="row" style="margin-top: 30px;">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Bus Ticket Reservation System </h2>
             </div>
             <div class="pull-right">
                 <!-- <a class="btn btn-success" href="{{url('login')}}"> Agent Login</a> -->
                 <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"> Agent Login</a> ||
                 <a href="{{ route('register') }}" class="text-sm text-gray-700 underline"> Agent Register</a>
             </div>
         </div>
     </div>
    
     @if ($message = Session::get('success'))
         <div class="alert alert-success">
             <p>{{ $message }}</p>
         </div>
     @endif
 
    
     <table class="table table-bordered">
     <div class="col-lg-12 margin-tb" style="margin-top:20px;">
     <div class="pull-left">
                 <h3>Available Routes </h3>
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
    @foreach($data as $info)
        <tr>
            <td>{{ $info->id }}</td>
            <td>{{ $info->name }}</td>
            <td>{{ $info->start_from }}</td>
            <td>{{ $info->final_destination }}</td>
            <td>Rs {{ $info->price }}</td>
            <td>{{ $info->bus_id }}</td>
          
            <td>
                <form action="" method="POST">
                    <a class="btn btn-primary" href="{{ route('book', $info->id) }}">Book a Ticket</a>
                </form>
            </td>
        </tr>
        @endforeach
     </table>
 <hr>
 @endsection