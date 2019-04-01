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
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
    <!-- Open Sans -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic' rel='stylesheet' type='text/css'>

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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->
    @yield('head')
</head>

<body>
<div class="wrapper">
<!-- Header section -->
    <header class="header-wrapper @yield('class-head')">
        <div class="container">
            <!-- Logo link-->
            <a href='{{ url('/home') }}' class="logo">
                <img alt='logo' src=" {{ url('images/logo.png') }}">
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
                            @if($menu)
                                @foreach($menu as $value)
                                     <li class="menu__nav-item"><a href="{{ url('category/'.@$value->id) }}">{{ @$value->title }}</a></li>
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
                    <li>
                        <span class="sub-nav-toggle plus"></span>
                        <a href="#">Mega menu</a>
                        <ul class="mega-menu container">
                            <li class="col-md-3 mega-menu__coloum">
                                <h4 class="mega-menu__heading">Now in the cinema</h4>
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">The Counselor</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Bad Grandpa</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Blue Is the Warmest Color</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Capital</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Spinning Plates</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Bastards</a></li>
                                </ul>
                            </li>

                            <li class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Gravity</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Captain Phillips</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Carrie</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Cloudy with a Chance of Meatballs 2</a></li>
                                </ul>
                            </li>

                            <li class="col-md-3 mega-menu__coloum">
                                <h4 class="mega-menu__heading">Ending soon</h4>
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Escape Plan</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Rush</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Prisoners</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Enough Said</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">The Fifth Estate</a></li>
                                    <li class="mega-menu__nav-item"><a href="#">Runner Runner</a></li>
                                </ul>
                            </li>

                            <li class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                                <ul class="mega-menu__list">
                                    <li class="mega-menu__nav-item"><a href="#">Insidious: Chapter 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Additional header buttons / Auth and direct link to booking-->
            <div class="control-panel">
                @if (Auth::check())
                    <div class="auth auth--home">
                        <div class="auth__show">
                        <span class="auth__image">
                          <img alt="" src="http://placehold.it/31x31">
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
                <a href="#" class="btn btn-md btn--warning btn--book btn-control--home login-window">{{ __('Book a ticket') }}</a>
            </div>

        </div>
    </header>
    @yield('content')
    <div class="clearfix"></div>
    <footer class="footer-wrapper">
        <section class="container">
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="#" class="nav-link__item">Cities</a></li>
                    <li><a href="movie-list-left.html" class="nav-link__item">Movies</a></li>
                    <li><a href="trailer.html" class="nav-link__item">Trailers</a></li>
                    <li><a href="rates-left.html" class="nav-link__item">Rates</a></li>
                </ul>
            </div>
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="coming-soon.html" class="nav-link__item">Coming soon</a></li>
                    <li><a href="cinema-list.html" class="nav-link__item">Cinemas</a></li>
                    <li><a href="offers.html" class="nav-link__item">Best offers</a></li>
                    <li><a href="news-left.html" class="nav-link__item">News</a></li>
                </ul>
            </div>
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="#" class="nav-link__item">Terms of use</a></li>
                    <li><a href="gallery-four.html" class="nav-link__item">Gallery</a></li>
                    <li><a href="contact.html" class="nav-link__item">Contacts</a></li>
                    <li><a href="page-elements.html" class="nav-link__item">Shortcodes</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="footer-info">
                    <p class="heading-special--small">A.Movie<br><span class="title-edition">in the social media</span></p>

                    <div class="social">
                        <a href='#' class="social__variant fa fa-facebook"></a>
                        <a href='#' class="social__variant fa fa-twitter"></a>
                        <a href='#' class="social__variant fa fa-vk"></a>
                        <a href='#' class="social__variant fa fa-instagram"></a>
                        <a href='#' class="social__variant fa fa-tumblr"></a>
                        <a href='#' class="social__variant fa fa-pinterest"></a>
                    </div>

                    <div class="clearfix"></div>
                    <p class="copy">&copy; A.Movie, 2013. All rights reserved. Done by Olia Gozha</p>
                </div>
            </div>
        </section>
    </footer>
</div>

<!-- open/close -->
<div class="overlay overlay-hugeinc">

    <section class="container">

        <div class="col-sm-4 col-sm-offset-4">
            <button type="button" class="overlay-close">Close</button>
            <form id="login-form" class="login" method='get' novalidate=''>
                <p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p>

                <div class="social social--colored">
                    <a href='#' class="social__variant fa fa-facebook"></a>
                    <a href='#' class="social__variant fa fa-twitter"></a>
                    <a href='#' class="social__variant fa fa-tumblr"></a>
                </div>

                <p class="login__tracker">or</p>

                <div class="field-wrap">
                    <input type='email' placeholder='Email' name='user-email' class="login__input">
                    <input type='password' placeholder='Password' name='user-password' class="login__input">

                    <input type='checkbox' id='#informed' class='login__check styled'>
                    <label for='#informed' class='login__check-info'>remember me</label>
                </div>

                <div class="login__control">
                    <button type='submit' class="btn btn-md btn--warning btn--wider">sign in</button>
                    <a href="#" class="login__tracker form__tracker">Forgot password?</a>
                </div>
            </form>
        </div>

    </section>
</div>

<!-- JavaScript-->
<!-- jQuery 1.9.1-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
{{--        <script>window.jQuery || document.write('<script src="{{ URL::asset('js/frontend/external/jquery-1.10.1.min.js') }}"></script>')</script>--}}
<script src="{{ URL::asset('js/frontend/external/jquery-1.10.1.min.js') }}"></script>
<!-- Migrate -->
{{--<script src="js/external/jquery-migrate-1.2.1.min.js"></script>--}}
<script src="{{ URL::asset('js/frontend/external/jquery-migrate-1.2.1.min.js') }}"></script>
<!-- Bootstrap 3-->
{{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>--}}

<!-- jQuery REVOLUTION Slider -->
{{--<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>--}}
<script type="text/javascript" src="{{ URL::asset('rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>

{{--<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>--}}
<script type="text/javascript" src="{{ URL::asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Mobile menu -->
{{--<script src="js/jquery.mobile.menu.js"></script>--}}
<script src="{{ URL::asset('js/frontend/jquery.mobile.menu.js') }}"></script>
<!-- Select -->
{{--<script src="js/external/jquery.selectbox-0.2.min.js"></script>--}}
<script src="{{ URL::asset('js/frontend/external/jquery.selectbox-0.2.min.js') }}"></script>

<!-- Stars rate -->
{{--<script src="js/external/jquery.raty.js"></script>--}}
<script src="{{ URL::asset('js/frontend/external/jquery.raty.js') }}"></script>

<!-- Form element -->
{{--<script src="js/external/form-element.js"></script>--}}
<script src="{{ URL::asset('js/frontend/external/form-element.js') }}"></script>

<!-- Form validation -->
{{--<script src="js/form.js"></script>--}}
<script src="{{ URL::asset('js/frontend/form.js') }}"></script>

<!-- Twitter feed -->
{{--<script src="js/external/twitterfeed.js"></script>--}}
{{--<script src="{{ URL::asset('js/frontend/external/twitterfeed.js') }}"></script>--}}

<!-- Custom -->
{{--<script src="js/custom.js"></script>--}}
<script src="{{ URL::asset('js/frontend/custom.js') }}"></script>

@yield('javascript')



</body>
</html>
