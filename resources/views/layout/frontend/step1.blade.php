@extends('layout.frontend.frontend_master')

@section('page', __('step 1'))

@section('head')
    <!-- jQuery UI -->
    <link href="{{ URL::asset('jquery-ui-themes/themes/smoothness/jquery-ui.css') }}" rel="stylesheet"/>
    <!-- Swiper slider -->
    <link href="{{ URL::asset('css/frontend/external/idangerous.swiper.css') }}" rel="stylesheet"/>
@endsection

@section('content')

    <!-- Main content -->
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt="" src="{{ asset(config('asset.tickets')) }}">
                <p class="order__title">{{ __('Book a ticket') }}<br><span class="order__descript">{{ __('and have fun movie time') }}</span></p>
                <div class="order__control">
                    <a href="#" class="order__control-btn active">{{ __('Purchase') }}</a>
                    <a href="#" class="order__control-btn">{{ __('Reserve') }}</a>
                </div>
            </div>
        </div>
        <div class="order-step-area">
            <div class="order-step first--step">{{ __('1. What &amp; Where &amp; When') }}</div>
        </div>

        <h2 class="page-heading heading--outcontainer">{{ __('Film : ') }}{{ $film->title  }}</h2>
    </section>

    <section class="container">
        <div class="col-sm-12">

            <h2 class="page-heading">{{ __('City') }} &amp; {{ __('Date') }}</h2>

            <div class="choose-container choose-container--short">
                <div class="datepicker">
                    <span class="datepicker__marker"><i class="fa fa-calendar"></i>{{ __('Date') }}</span>
                    <input type="text" id="datepicker" value='{{ now()->format('d-m-Y') }}' class="datepicker__input time-show">
                </div>
            </div>

            <h2 class="page-heading">{{ __('Pick time') }}</h2>

            <div class="time-select time-select--wide data-time">
                @if ($data = $film->timeShow->where('time_show', '>=', date('Y-m-d', strtotime(now())))->where('time_show', '<',  date('Y-m-d', strtotime(now()->modify('+1 day'))))->groupBy('room_id'))
                    @foreach ($data as $key => $value)
                        <div class="time-select__group group--first">
                            <div class="col-sm-3">
                                <p class="time-select__place">{{ $room->findOrFail($key)->store->name }}</p>
                            </div>
                            <ul class="col-sm-6 items-wrap">
                                @foreach ($value as $time )
                                    <li class="time-select__item" data-time='{{ $time->id }}'>{{ date('H:i', strtotime($time->time_show)) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="choose-indector choose-indector--time">
                <strong>{{ __('Choosen: ') }}</strong><span class="choosen-area"></span>
            </div>
        </div>

    </section>

    <div class="clearfix"></div>

    <form id="film-and-time" class="booking-form" method="post" action="{{ url('step1/' . $film->id) }}">
        <input type="text" name="choosen_movie" class="choosen-movie" value="{{ $film->id }}" required>
        <input type="text" name="choosen_time" class="choosen-time" required>
        {{ csrf_field() }}
        <div class="booking-pagination">
            <button href="#" class="booking-pagination__prev hide--arrow">
                <span class="arrow__text arrow--prev"></span>
                <span class="arrow__info"></span>
            </button>
            <button type="submit" class="booking-pagination__next">
                <span class="arrow__text arrow--next">{{ __('next step') }}</span>
                <span class="arrow__info">{{ __('choose a sit') }}</span>
            </button>
        </div>
    </form>

    <div class="clearfix"></div>
    {{ csrf_field() }}
@endsection

@section('javascript')
    <!-- jQuery UI -->
    <link href="{{ URL::asset('jquery-ui/external/jquery-1.10.2/jquery.js') }}" rel="stylesheet" />
    <!-- Swiper slider -->
    <script src="{{ URL::asset('js/frontend/external/idangerous.swiper.min.js') }}"></script>

    <script src="{{ URL::asset('js/frontend/getTime.js') }}"></script>

    <!-- JavaScript-->
    <script type="text/javascript">
        $(document).ready(function() {
            init_BookingOne();
            var id = '{{ $film->id }}';
            var url = '{!! url('/get-time-date/') !!}';
            var _token = $('input[name="_token"]').val();
            getTimeBydate(id, url, _token);
        });
    </script>
@endsection
