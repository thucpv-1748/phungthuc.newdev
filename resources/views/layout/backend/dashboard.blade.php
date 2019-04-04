@extends('layout.backend.admin')

@section('title', __('Dashboard'))

@section('head')
    <link href="{{ URL::asset('css/backend/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/backend/dashboard.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/backend/mini-event-calendar.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="col-sm-12 col-sm-offset-3 col-lg-12 col-lg-offset-2 main dashboard">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('Dashboard') }}</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $user }}</div>
                            <div class="text-muted">{{ __('User') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $category }}</div>
                            <div class="text-muted">{{ __('Category') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $film }}</div>
                            <div class="text-muted">{{ __('Film') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="large">{{ $order }}</div>
                            <div class="text-muted">{{ __('Order') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-red">
                    <div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>{{ trans('remember.Calendar') }}</div>
                    <div class="panel-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div><!--/.col-->
        </div><!--/.row-->
    </div>
    <script src="{{ URL::asset('jquery/dist/jquery.slim.min.js') }}"></script>
    <script src="{{ URL::asset('js/backend/mini-event-calendar.js') }}"></script>
    <script>
        var sampleEvents = [
            {
                title: "Soulful sundays bay area",
                date: new Date().setDate(new Date().getDate() - 7), // last week
                link: "#"
            },
            {
                title: "London Comicon",
                date: new Date().getTime(), // today
                link: "#"
            },
            {
                title: "Youth Athletic Camp",
                date: new Date().setDate(new Date().getDate() + 31), // next month
                link: "#"
            }
        ];

        $("#calendar").MEC({
            events: sampleEvents
        });

        $("#calendar").MEC({
            events: sampleEvents,
            from_monday: true
        });
    </script>

@endsection
