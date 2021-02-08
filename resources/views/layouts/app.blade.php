<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

       <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_base_url" content="{{ url('/') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   <!-- Sweet Alert Message -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

    {{-- Select2 library --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                @auth
                <span class="nav-item">
                    Welcome, {{ Auth::user()->name }}
                </span>
                @endauth

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!-- @if (Route::has('login'))
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif -->
                            
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }} </a>
                                </li>
                            @endif -->
                        @else
                                @auth
                              <li class="nav-item">
                              <a class="nav-link" href="{{ route('index') }}"> <i class="fa fa-money" aria-hidden="true"></i>&nbsp; {{ __('Booking Here') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">  <i class="fa fa-home" aria-hidden="true"></i>&nbsp; {{ __('Home') }}</a>
                                </li>

                                <li class="nav-item">
                                   <a class="nav-link" href="{{ route('bus') }}">  <i class="fa fa-bus" aria-hidden="true"></i>&nbsp; {{ __('Bus') }}</a>
                                </li>

                                <li class="nav-item">
                                 <a class="nav-link" href="{{ route('route') }}">  <i class="fa fa-road" aria-hidden="true"></i>&nbsp;  {{ __('Route') }}</a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" href="{{ route('role') }}">  <i class="fa fa-users" aria-hidden="true"></i>&nbsp;  {{ __('Role') }}</a>
                                </li>
                                
                                @endauth
                                
                                <li class="nav-item">
                                    {{-- <a class="nav-link" href="{{ route('logout') }}"> <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;  {{ __('Logout') }}</a> --}}
                                    <form id="" action="{{ route('logout') }}" method="POST" class="nav-link">
                                        @csrf
                                        <input type="submit" value="Logout" style="border: none; border-color: transparent;">
                                    </form>
                                </li>
                                
                                {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user" aria-hidden="true"></i>   {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"> </script>
    
  <script type="text/javascript">
// Sweet Alert Message for deleting Bus
  $("body").on("click",".remove-bus",function(){
    var current_object = $(this);
    swal({
        title: "Are you sure?",
        text: "You want to remove this Bus ?",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='get' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});

// Sweet Alert Message for deleting Route
$("body").on("click",".remove-route",function(){
    var current_object = $(this);
    swal({
        title: "Are you sure?",
        text: "You want to remove this route ?",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='get' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});

// Sweet Alert Message for deleting Roles
$("body").on("click",".remove-role",function(){
    var current_object = $(this);
    swal({
        title: "Are you sure?",
        text: "You want to remove this role ?",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='get' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});

// Sweet Alert Message for deleting Users
$("body").on("click",".remove-user",function(){
    var current_object = $(this);
    swal({
        title: "Are you sure?",
        text: "You want to remove this User ?",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='get' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});

//Depended Dropdown for State and District
$(document).ready(function() {
        $('#state').on('change', function() {
            var stateID = $(this).val();
            var APP_URL = $('meta[name="_base_url"]').attr('content');
            if(stateID) {
                $.ajax({
                    url: APP_URL+"/find-district/"+stateID,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#district').empty();
                        $('#district').focus;
                        $('#district').append('<option value="">-- Select District --</option>'); 
                        $.each(data, function(key, value){
                        $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name+ '</option>');
                    });
                  }else{
                    $('#district').empty();
                  }
                  }
                });
            }else{
              $('#district').empty();
            }
        });
    });


//Calculate total price of booking
function calculate() {
		var myBox1 = document.getElementById('price').value;	
		var myBox2 = document.getElementById('seats').value;
		var result = document.getElementById('total');	
		var myResult = myBox1 * myBox2;
		total.value = myResult;		
	}
</script>

<script type="text/javascript">
    $(function() {
        $(".roles").select2();
    });
    </script>

{{-- <script type="text/javascript">
    $(".roles").select2();
</script> --}}

</body>
</html>
