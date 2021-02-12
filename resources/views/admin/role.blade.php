@extends('layouts.app')

@section('content')

<div class="container">

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
  @endif

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif

  <div class="row">
    <div class="col" style="padding:0 10% 3% 0;">
      <div class="pull-left">
        <h3>Users</h3>
      </div>
      <div class="pull-right">
        @can('manage-user')
        <a href="{{ route('adduser') }}"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Create New User</a>
        @endcan
      </div>

      <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($userinfo as $users)
          <tr>
            <th scope="row">{{ $users->id }}</th>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>
            <td>
              @if(!empty($users->role))
              @foreach($users->role as $v)
                 <label class="badge badge-success">{{ $v->name }}</label>
              @endforeach
              @endif         
            </td>
            
            <td>
              @can('manage-user')
                <a href="{{ route('edituser',$users->id) }}"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp;|&nbsp;
                  <a class="remove-user" data-id="{{ $users->id }}" data-action="{{ route('deleteuser', $users->id) }}">
                  <i class="fa fa-trash"></i></a>
              @endcan
            </td>
          </tr>
          @endforeach
          </tbody>
      </table>
    </div>

    <div class="col-right">
      <div class="pull-left">
          <h4>All Roles</h4>
      </div>
      <div class="pull-right">
              @can('manage-role')
              <a href="{{ route('addrole') }}"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Create New Role</a>
              @endcan
      </div>

      <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Roles</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roleinfo as $role)
          <tr>
            <th scope="row">{{ $role->id }}</th>
            <td>{{ $role->name }}</td>
            <td>
              @can('manage-role')
              <a href="{{ route('editrole',$role->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> |           
                <a class="remove-role" data-id="{{ $role->id }}" data-action="{{ route('deleterole', $role->id) }}">
                <i class="fa fa-trash"></i></a>
                @endcan
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-5" >
      <div class="pull-left">
        <h4>Manage Permission</h4>
      </div>
      <div class="pull-right">
         @role('admin')
         <a href="{{ route('addPermission') }}"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Create New Permissions</a>
          @endrole
      </div>
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Permisisons</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($per as $permission)
        <tr>
          <th scope="row">{{ $permission->id }}</th>
          <td>{{ $permission->name }}</td>
          <td>
            @role('admin')
            <a href="{{ route('editPermission',$permission->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
            @endrole
          </td>  
        </tr>
        @endforeach
        </tbody>
    </table>
  </div>

    <div class="col-md-7">
      <div class="pull-left">
        <h4>Routes and Confirmed Tickets</h4>
      </div>

      <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Route Name</th>
            <th scope="col">Bus Number</th>
            <th scope="col">Total Passanger</th>
            <th scope="col">Total Revenue</th>
          </tr>
        </thead>
        <tbody>
          @if (!empty($ticketsinfo) && $ticketsinfo->count())
              @foreach ($ticketsinfo as $tickets)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{ $tickets->date }}</td>
                    <td>{{ $tickets->route->name }}</td>
                    <td>{{ $tickets->bus->reg_num }}</td>
                    <td><h5 style="display: inline;">{{ $tickets->sumSeats }}/</h5>
                        <small style="color: rgb(25, 7, 105);">{{ $tickets->bus->seat_capacity }}</small>
                    </td>
                    <td>Rs. {{ $tickets->sumPrice }}</td>
                </tr>
              @endforeach
          @else
              <tr>
                <td colspan="6">There are no bookings.</td>
              </tr>
          @endif
          </tbody>
      </table>
    </div>
  </div>
</div>

@endsection