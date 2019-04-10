<!doctype html>
<html>
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>@yield('page')</title>
    <meta name="description" content="A Template by Gozha.net">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gozha.net">
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <link href="{{ URL::asset('css/frontend/custom.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="{{ URL::asset('font-awesome-v4/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Roboto -->
    <link href="{{ URL::asset('roboto-fontface/css/roboto/roboto-fontface.css') }}" rel="stylesheet" type="text/css">
    <!-- Open Sans -->
    <link href="{{ URL::asset('npm-font-open-sans/open-sans.css') }}" rel="stylesheet" type="text/css">


    <!-- Stylesheets -->

    <!-- Mobile menu -->
    <link href="{{ URL::asset('css/frontend/gozha-nav.css') }}" rel="stylesheet" type="text/css">

    <!-- Select -->
    <link href="{{ URL::asset('css/frontend/external/jquery.selectbox.css') }}" rel="stylesheet" type="text/css">


    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link href="{{ URL::asset('rs-plugin/css/settings.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom -->
    <link href="{{ URL::asset('css/frontend/style.css?v=1') }}" rel="stylesheet" type="text/css">


    <!-- Modernizr -->
    <script src="{{ URL::asset('js/frontend/external/modernizr.custom.js') }}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('html5shiv/dist/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('respond.js/src/respond.js') }}"></script>
    {{ Html::script('messages.js') }}
    <![endif]-->
    @yield('head')
</head>

<body>
<div class="wrapper">
<!-- Header section -->
    <header class="header-wrapper @yield('class-head')">
        <div class="container">
            <!-- Logo link-->
            <a href="{{ url('/home') }}" class="logo">
                <img alt="logo" src="{{ url::asset('images/logo.png') }}">
            </a>
            <!-- Main website navigation-->
            <nav id="navigation-box">
                <!-- Toggle for mobile menu mode -->
                <a href="#" id="navigation-toggle">
                        <span class="menu-icon">
                            <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                              <span class="lines"></span>
                            </span>
                        </span>
                </a>
                <!-- Link navigation -->
                <ul id="navigation">
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="{{ url('/home') }}">{{ __('Home') }}</a>
                    </li>
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="#">{{ __('Category') }}</a>
                        <ul>
                            @if ($menu)
                                @foreach ($menu as $value)
                                     <li class="menu__nav-item"><a href="{{ url('category/' . $value->id) }}">{{ $value->title }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="{{ url('/cinema') }}">{{ __('Cinemas') }}</a>
                    </li>
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="{{ url('/coming-soon') }}">{{ __('Comming Soon') }}</a>
                    </li>
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="{{ url('/contact') }}">{{ __('Contact')  }}</a>
                    </li>
                </ul>
            </nav>

            <!-- Additional header buttons / Auth and direct link to booking-->
            <div class="control-panel">
                @if (Auth::check())
                    <div class="auth auth--home">
                        <div class="auth__show">
                        <span class="auth__image">
                          <img alt="" src="{{ url::asset('img/auth.png') }}">
                        </span>
                        </div>
                        <a href="#" class="btn btn--sign btn--singin">{{ __('Me') }}</a>
                        <ul class="auth__function">
                            <li><a href="#" class="auth__function-item">{{ __('Watchlist') }}</a></li>
                            <li><a href="#" class="auth__function-item">{{ __('Booked tickets') }}</a></li>
                            <li><a href="#" class="auth__function-item">{{ __('Discussion') }}</a></li>
                            <li><a href="#" class="auth__function-item">{{ __('Settings') }}</a></li>
                            <li><a href="{{ url('/logout') }}" class="auth__function-item">{{ __('Logout') }}</a></li>
                        </ul>

                    </div>
                @else
                    <a href="{{ url('/login') }}" class="btn btn--sign">{{ __('Sign in') }}</a>
                @endif
                <a href="{{ url('/book') }}" class="btn btn-md btn--warning btn--book btn-control--home {{ Auth::Check() ? '' : 'login-window' }}">{{ __('Book a ticket') }}</a>
            </div>

        </div>
    </header>
    @yield('content')
    <div class="clearfix"></div>
    <footer class="footer-wrapper">
        <section class="container">
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="#" class="nav-link__item">{{ __('Cities') }}</a></li>
                    <li><a href="#" class="nav-link__item">{{ __('Movies') }}</a></li>
                    <li><a href="#" class="nav-link__item">{{ __('Trailers') }}</a></li>
                    <li><a href="#" class="nav-link__item">{{ __('Rates') }}</a></li>
                </ul>
            </div>
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="{{ url('coming-soon') }}" class="nav-link__item">{{ __('Coming soon') }}</a></li>
                    <li><a href="{{ url('cinema') }}" class="nav-link__item">{{ __('Cinemas') }}</a></li>
                    <li><a href="#" class="nav-link__item">{{ __('Best offers') }}</a></li>
                    <li><a href="#" class="nav-link__item">{{ __('News') }}</a></li>
                </ul>
            </div>
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="#" class="nav-link__item">{{ __('Terms of use') }}</a></li>
                    <li><a href="#" class="nav-link__item">{{ __('Gallery') }}</a></li>
                    <li><a href="{{ url('/contact') }}" class="nav-link__item">{{ __('Contacts') }}</a></li>
                    <li><a href="#" class="nav-link__item">{{ __('Shortcodes') }}</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="footer-info">
                    <p class="heading-special--small">{{ __('A.Movie') }}<br>
                        <span class="title-edition">{{ __('in the social media') }}</span></p>

                    <div class="social">
                        <a href="#" class="social__variant fa fa-facebook"></a>
                        <a href="#" class="social__variant fa fa-twitter"></a>
                        <a href="#" class="social__variant fa fa-vk"></a>
                        <a href="#" class="social__variant fa fa-instagram"></a>
                        <a href="#" class="social__variant fa fa-tumblr"></a>
                        <a href="#" class="social__variant fa fa-pinterest"></a>
                    </div>

                    <div class="clearfix"></div>
                    <p class="copy">&copy; {{ __('A.Movie, 2013. All rights reserved. Done by Olia Gozha') }}</p>
                </div>
            </div>
        </section>
    </footer>
</div>

<!-- open/close -->
<div class="overlay overlay-hugeinc">

    <section class="container">

        <div class="col-sm-4 col-sm-offset-4">
            <button type="button" class="overlay-close">{{ __('Close') }}</button>
            <form id="login-form" class="login" method="post" novalidate="" action="{{ url('login') }}">
                <p class="login__title">{{ __('sign in') }}<br>
                    <span class="login-edition">{{ __('welcome to A.Movie') }}</span></p>

                <div class="social social--colored">
                    <a href="#" class="social__variant fa fa-facebook"></a>
                    <a href="#" class="social__variant fa fa-twitter"></a>
                    <a href="#" class="social__variant fa fa-tumblr"></a>
                </div>

                <p class="login__tracker">{{ __('or') }}</p>

                <div class="field-wrap">
                    <input type="email" placeholder="{{ __('Email') }}" name="email" class="login__input">
                    <input type="password" placeholder="{{ __('Password') }}" name="password" class="login__input">

                    <input type="checkbox" id="#informed" class="login__check styled" name="remember" value="on">
                    <label for="#informed" class="login__check-info">{{ __('remember me') }}</label>
                </div>
                {{ csrf_field() }}
                <div class="login__control">
                    <button type="submit" class="btn btn-md btn--warning btn--wider">{{ __('sign in') }}</button>
                    <a href="#" class="login__tracker form__tracker">{{ __('Forgot password?') }}</a>
                </div>
            </form>
        </div>

    </section>
</div>

<!-- JavaScript-->
<!-- jQuery 1.9.1-->
<script src="{{ URL::asset('jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/frontend/external/jquery-1.10.1.min.js') }}"></script>
<!-- Migrate -->
<script src="{{ URL::asset('js/frontend/external/jquery-migrate-1.2.1.min.js') }}"></script>

<!-- jQuery REVOLUTION Slider -->
<script type="text/javascript" src="{{ URL::asset('rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Mobile menu -->
<script src="{{ URL::asset('js/frontend/jquery.mobile.menu.js') }}"></script>
<!-- Select -->
<script src="{{ URL::asset('js/frontend/external/jquery.selectbox-0.2.min.js') }}"></script>

<!-- Stars rate -->
<script src="{{ URL::asset('js/frontend/external/jquery.raty.js') }}"></script>

<!-- Form element -->
<script src="{{ URL::asset('js/frontend/external/form-element.js') }}"></script>

<!-- Form validation -->
<script src="{{ URL::asset('js/frontend/form.js') }}"></script>

<!-- Custom-->
<script src="{{ URL::asset('js/frontend/custom.js') }}"></script>

@yield('javascript')

</body>
</html>
