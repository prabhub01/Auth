
@extends('layouts.custom')
 
 @section('content')
 <div class="row" style="margin-top: 30px;">
         <div class="col-lg-12 margin-tb">
             <div class="pull-left">
                 <h2>Bus Ticket Reservation System </h2>
             </div>
             <div class="pull-right">
             @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                    <!-- <a href="{{ route('index') }}" class="text-sm text-gray-700 underline"> Booking Here</a> &nbsp;&nbsp;&nbsp; -->
        
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">  Login</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

                 <!-- <a class="btn btn-success" href="{{url('login')}}"> Agent Login</a> -->
                 <!-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"> Agent Login</a> ||
                 <a href="{{ route('register') }}" class="text-sm text-gray-700 underline"> Agent Register</a> -->
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
    @foreach($value as $info)
        <tr>
            <td>{{ $info->id }}</td>
            <td>{{ $info->name }}</td>
            <td>{{ $info->start_from }}</td>
            <td>{{ $info->district->district_name }}</td>
            <td>Rs {{ $info->price }}</td>
            <td>{{ $info->bus->reg_num }}</td>

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