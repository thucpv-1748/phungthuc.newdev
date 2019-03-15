<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> @yield('title')</title>
    @yield('head')
    <link href="{{ URL::asset('css/backend/dashboard.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="{{ URL::asset('js/backend/dashboard.js') }}"></script>
    <link rel="shortcut icon" href="{{asset('img/favicon.ico') }}">

</head>
<body>
<div class="header">
    <a href="#" id="menu-action">
        <i class="fa fa-bars"></i>
        <span>Close</span>
    </a>
    <a href="{{url('admin/dashboard')}}"> <div class="logo">Admin</div></a>
    <div class="top-nav " style="height: 50px; position: relative;">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu" style="height: 50px;">
            <!-- user login dropdown start-->
            <li class="dropdown" style="height: 50px;">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                    {{--<img alt="" src="img/avatar1_small.jpg">--}}
                    <span class="username">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="{{url('admin/user')}}"><i class=" fa fa-suitcase"></i> Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                    <li><a href="{{url('admin/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
        <!--search & user info end-->
    </div>
</div>
<div class="sidebar">
    <ul>
        <li><a href="#"><i class="fa fa-desktop"></i><span>Desktop</span></a></li>
        <li><a href="{{ url('admin/category') }}"><i class="fa fa-server"></i><span>Category</span></a></li>
        <li><a href="{{ url('admin/time-show') }}"><i class="fa fa-calendar"></i><span>Show times</span></a></li>
        <li><a href="{{ url('admin/list-film') }}"><i class="fa fa-th-list"></i><span>Film</span></a></li>
        <li><a href="{{ url('admin/store') }}"><i class="fa fa-clinic-medical"></i><span>Store</span></a></li>
        <li><a href="{{ url('admin/room') }}"><i class="fa fa-person-booth"></i><span>Room</span></a></li>
        <li><a href="{{ url('admin/order') }}"><i class="fa fa-cart-plus"></i><span>Order</span></a></li>
        <li><a href="#"><i class="fa fa-comments"></i><span>Messages</span></a></li>
        <li><a href="{{ url('admin/users/') }}"><i class="fa fa-user"></i></i><span>Users</span></a></li>
    </ul>
</div>

<!-- Content -->
<div class="main">
    @yield('content')
</div>

</body>
</html>
