<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> @yield('title')</title>
    <link href="{{ URL::asset('css/backend/dashboard.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="{{ URL::asset('js/backend/dashboard.js') }}"></script>
</head>
<body>
<div class="header">
    <a href="#" id="menu-action">
        <i class="fa fa-bars"></i>
        <span>Close</span>
    </a>
    <div class="logo">
        Simple Admin
    </div>
</div>
<div class="sidebar">
    <ul>
        <li><a href="#"><i class="fa fa-desktop"></i><span>Desktop</span></a></li>
        <li><a href="#"><i class="fa fa-server"></i><span>Server</span></a></li>
        <li><a href="#"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
        <li><a href="#"><i class="fa fa-envelope-o"></i><span>Messages</span></a></li>
        <li><a href="#"><i class="fa fa-table"></i><span>Data Table</span></a></li>
        <li><a href="{{ url('admin/users/') }}"><i class="fa fa-user"></i></i><span>Users</span></a></li>
    </ul>
</div>

<!-- Content -->
<div class="main">
    @yield('content')
</div>

</body>
</html>
