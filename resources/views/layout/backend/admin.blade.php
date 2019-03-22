<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> @yield('title')</title>
    @yield('head')
    <link href="{{ URL::asset('css/backend/dashboard.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('bootstrap-3.3.5/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}" >
    <script src="{{ URL::asset('js/backend/dashboard.js') }}"></script>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
<div class="header">
    <a href="#" id="menu-action">
        <i class="fa fa-bars"></i>
        <span>{{ __('Close') }}</span>
    </a>
    <a href="{{ url('admin/dashboard') }}"> <div class="logo">{{ __('Admin') }}</div></a>
    <div class="top-nav">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                    {{--<img alt="" src="img/avatar1_small.jpg">--}}
                    <span class="username">{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="{{ url('admin/user') }}"><i class=" fa fa-suitcase"></i>{{ __('Profile') }}</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i>{{ __('Settings') }} </a></li>
                    <li><a href="#"><i class="fa fa-bell-o"></i>{{ __('Notification') }} </a></li>
                    <li><a href="{{ url('admin/logout') }}"><i class="fa fa-key"></i>{{ __('Log Out') }}</a></li>
                </ul>
            </li>
        </ul>
        <!--search & user info end-->
    </div>
</div>
<div class="sidebar">
    <ul>
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-desktop"></i><span>{{ __('Desktop') }}</span></a></li>
        <li><a href="{{ url('admin/category') }}"><i class="fa fa-server"></i><span>{{ __('Category') }}</span></a></li>
        <li><a href="{{ url('admin/time-show') }}"><i class="fa fa-calendar"></i><span>{{ __('Show times') }}</span></a></li>
        <li><a href="{{ url('admin/list-film') }}"><i class="fa fa-th-list"></i><span>{{ __('Film') }}</span></a></li>
        <li><a href="{{ url('admin/store') }}"><i class="fa fa-clinic-medical"></i><span>{{ __('Store') }}</span></a></li>
        <li><a href="{{ url('admin/room') }}"><i class="fa fa-person-booth"></i><span>{{ __('Room') }}</span></a></li>
        <li><a href="{{ url('admin/fast-food') }}"><i class="fa fa-utensils"></i><span>{{ __('Fast Food') }}</span></a></li>
        <li><a href="{{ url('admin/order') }}"><i class="fa fa-cart-plus"></i><span>{{ __('Order') }}</span></a></li>
        <li><a href="#"><i class="fa fa-comments"></i><span>{{ __('Messages') }}</span></a></li>
        <li><a href="{{ url('admin/role') }}"><i class="fa fa-ruler"></i><span>{{ __('Roles') }}</span></a></li>
        <li><a href="{{ url('admin/users/') }}"><i class="fa fa-user"></i></i><span>{{ __('Users') }}</span></a></li>
    </ul>
</div>

<!-- Content -->
<div class="main">
    @yield('content')
</div>

</body>
</html>
