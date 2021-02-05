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

   <div class="row" style="width:50%; margin:0px auto; float:left;">
    <table class="table table-sm">
      <div class="col-lg-12 margin-tb" style="margin-top:20px;">
        <div class="pull-left">
            <h3>Users</h3>
        </div>
        <div class="pull-right">
          @role('admin')
          <a href="{{ route('adduser') }}"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Create New User</a>
          @endrole
        </div>
    </div>
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
              @if(!empty($users->getRoleNames()))
              @foreach($users->getRoleNames() as $v)
                 <label class="badge badge-success">{{ $v }}</label>
              @endforeach
              @endif         
            </td>
            
            <td>
              @role('admin')
                <a href="{{ route('edituser',$users->id) }}"> <i class="fa fa-pencil" aria-hidden="true"></i> </a> &nbsp;|&nbsp;
                  <a class="remove-user" data-id="{{ $users->id }}" data-action="{{ route('deleteuser', $users->id) }}">
                  <i class="fa fa-trash"></i></a>
              @endrole
            </td>
          </tr>
          @endforeach
          </tbody>
      </table>
    </div>

      <div class="row" style="width:30%; margin:0px auto; float:right;">
      {{-- <table class="table table-bordered"> --}}
        <table class="table table-sm">
        <div class="col-lg-12 margin-tb" style="margin-top:20px;">
          <div class="pull-left">
            <h4>All Roles</h4>
        </div>
          <div class="pull-right">
              @role('admin')
              <a href="{{ route('addrole') }}"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Create New Role</a>
              @endrole
            </div>
          </div>
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
                @role('admin')
                <a href="{{ route('editrole',$role->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a> |           
                  <a class="remove-role" data-id="{{ $role->id }}" data-action="{{ route('deleterole', $role->id) }}">
                  <i class="fa fa-trash"></i></a>
                  @endrole
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
      </div>
      <hr/>
      <div style="width:40%; margin-top: 30%;">
        <table class="table table-sm">
          <div class="col-lg-12 margin-tb" style="margin-top:20px;">
            <div class="pull-left">
              <h4>Manage Permission</h4>
            </div>
          <div class="pull-right">
            @role('admin')
            <a href="{{ route('addPermission') }}"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Create New Permissions</a>
            @endrole
          </div>
            </div>
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
</div>
@endsection