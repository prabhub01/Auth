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
            <th>S.N.</th>
            <th>Date</th>
            <th>Route</th>
            <th>Bus</th>
            <th>Name</th>
            <th>Booked Seats</th>
            <th width="280px">Action</th>
        </tr>
        @if(!empty($info) && $info->count())
                @foreach ($info as $val)
                <tr>
                    <td>{{ $val->id}}</td>
                    <td>{{ $val->date }}</td>
                    <td>{{ $val->route->name }}</td>
                    <td>{{ $val->bus->reg_num }}</td>
                    <!-- route is the function name of the relationship written in model -->
                    <td>{{ $val->cus_name }}</td>
                    <td>{{ $val->seats }}</td>

                    <td>
                            @can('view-reservation')
                            <a class="btn btn-info" href="{{ route('morebooking', $val->id) }}">
                                <i class="fa fa-eye" aria-hidden="true"></i> &nbsp;View More</a>
                            @endcan
                            {{-- @can('delete-reservation')
                            <button class="btn btn-danger delete-ticket" data-id="{{ $val->id }}"
                                data-action="{{ route('deletebooking', $val->id) }}"> Delete </button>
                            @endcan
                            @can('confirm-tickets')
                            <button class="btn btn-success confirm-ticket" data-id="{{ $val->id }}"
                                data-action="{{ route('confirmbooking', $val->id) }}"> Confirm </button>
                            @endcan --}}
                    </td>
                </tr>
                @endforeach
         @else
            <tr>
                <td colspan="7">There are no bookings.</td>
            </tr>
        @endif
    </table>
    {{ $info->links('pagination::bootstrap-4') }}
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
        @if(!empty($data) && $data->count())
            @foreach ($data as $bus)
                <tr>
                    <td>{{ $bus->id }}</td>
                    <td>{{ $bus->bus_type->bus_type }}</td>
                    <td>{{ $bus->reg_num }}</td>
                    <td>{{ $bus->seat_capacity }}</td>
                    <td>{{ $bus->route->name }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">There are no buses registered.</td>
            </tr>
        @endif

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
        @if(!empty($route) && $route->count())
            @foreach($route as $in)
                <tr>
                    <td>{{ $in->id }}</td>
                    <td>{{ $in->name }}</td>
                    <td>{{ $in->start_from }}</td>
                    <td>{{ $in->district->district_name }}</td>
                    <td>Rs {{ $in->price }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">There are no routes registered.</td>
            </tr>
        @endif
    </table>
    <hr>
    <section class="home-newsletter" style="margin-top:5%;">
        <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="single">
                <h3>Want to Get Notification?</h3>
                <form id="subsEmail">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email">
                     </div>
                     <div class="form-group">
                        <button class="btn btn-success" type="submit" id="submit">Submit</button>
                     </div>

                 </form>
            </div>
        </div>
        </div>
        </div>
        </section>

        <section style="margin-top:5%;">
            @if (!empty($testimonial) && $testimonial->count())
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol> <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                         @foreach ($testimonial as $item)
                            @if ($loop->first)
                            <div class="item carousel-item active">
                                <div class="img-box"><img src="{{ asset('uploads/'.$item->image) }}" alt="Image Not Found"></div>
                                <p class="testimonial">{{ $item->review }}</p>
                                <p class="overview"><b>{{ $item->name }}</b>{{ $item->date }} </p>
                                <div class="star-rating"> </div>
                            </div>
                             @else
                             <div class="item carousel-item">
                                <div class="img-box"><img src="{{ asset('uploads/'.$item->image) }}" alt="Image Not Found"></div>
                                <p class="testimonial">{{ $item->review }}</p>
                                <p class="overview"><b>{{ $item->name }}</b>{{ $item->date }} </p>
                                <div class="star-rating"> </div>
                            </div>
                             @endif
                        @endforeach
                </div> <!-- Carousel controls --> <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev"> <i class="fa fa-angle-left"></i> </a> <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next"> <i class="fa fa-angle-right"></i> </a>
            </div>
            @else
            <div>There are no Reviews Yet</div>
            @endif
        </section>
</div>

@endsection
