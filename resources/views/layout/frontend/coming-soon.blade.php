<!doctype html>
<html>
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>{{ __('AMovie - Coming soon') }}</title>
    <meta name="description" content="A Template by Gozha.net">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gozha.net">

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="{{ URL::asset('font-awesome-v4/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Stylesheets -->

    <!-- Custom -->
    <link href="{{ URL::asset('css/frontend/style.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ URL::asset('js/frontend/external/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('html5shiv/dist/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('respond.js/src/respond.js') }}"></script>
    {{ Html::script('messages.js') }}
    <![endif]-->
</head>
<body>
<div class="wrapper wrapper-images">
    <div class="comming-wrapper">
        <a href="{{ url('/home') }}" class="logo logo--lg">
            <img alt='coming-title' src="{{ asset('images/logo-lg.png') }}">
            <h3 class="coming-title">{{ __('coming soon') }}</h3>
        </a>
        <section class="container">
            <div class="couter">
                <div class="timer-wrap">
                    <div class="timer-bg"></div>
                    <span class="digits"></span>
                    <input class="knob day" data-min="0" data-max="100" data-bgColor="rgba(255,255,255,0.2)" data-fgColor="#ffd564" data-displayInput=false data-width="200" data-height="200" data-thickness=".11">
                    <div class="digits-label">{{ __('days') }}</div>
                </div>
                <div class="timer-wrap">
                    <div class="timer-bg"></div>
                    <span class="digits"></span>
                    <input class="knob hour" data-min="0" data-max="24" data-bgColor="rgba(255,255,255,0.2)" data-fgColor="#ffd564" data-displayInput=false data-width="200" data-height="200" data-thickness=".11">
                    <div class="digits-label">{{ __('hours') }}</div>
                </div>
                <div class="timer-wrap">
                    <div class="timer-bg"></div>
                    <span class="digits"></span>
                    <input class="knob minute" data-min="0" data-max="60" data-bgColor="rgba(255,255,255,0.2)" data-fgColor="#ffd564" data-displayInput=false data-width="200" data-height="200" data-thickness=".11">
                    <div class="digits-label">{{ __('minutes') }}</div>
                </div>
                <div class="timer-wrap">
                    <div class="timer-bg"></div>
                    <span class="digits"></span>
                    <input class="knob second" data-min="0" data-max="60" data-bgColor="rgba(255,255,255,0.2)" data-fgColor="#ffd564" data-displayInput=false data-width="200" data-height="200" data-thickness=".11">
                    <div class="digits-label">{{ __('seconds') }}</div>
                </div>
            </div>

            <p class="text--light">
                {{ __('Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                Praesent sed tristique massa.
                Aenean iaculis diam nec ligula ullamcorper eu tempus dolor ullamcorper.
                Morbi in nisi tincidunt neque gravida facilisis.
                Pellentesque mattis nisl eget neque scelerisque adipiscing.
                Vestibulum euismod commodo odio sit amet congue.
                Donec ut sem vel mauris sodales egestas.
                Nulla eget lorem vitae diam ullamcorper tincidunt ut vel est.') }}
            </p>
        </section>
    </div>

    <div class="copy-bottom copy-bottom--high">
        <p class="copy copy--light">&copy; {{ __('A.Movie, 2013. All rights reserved. Done by Olia Gozha') }}</p>
    </div>

</div>
<!-- JavaScript-->
<!-- jQuery 1.9.1-->
<script src="{{ URL::asset('jquery/dist/jquery.min.js') }}"></script>
<!-- Knob js -->
<script src="{{ URL::asset('js/frontend/external/jquery.knob.js') }}"></script>

<!-- Count comimg soon -->
<script src="{{ URL::asset('js/frontend/external/count.down.js') }}"></script>

<script>
    $(document).ready(function() {
        //CountDown
        var dateOfBeginning = 'Jan 17, 2019', //type your date of the Beginnig
            dateOfEnd = 'Dec 25, 2019'; //type your date of the end

        countDown(dateOfBeginning, dateOfEnd);
    });
</script>
</body>
