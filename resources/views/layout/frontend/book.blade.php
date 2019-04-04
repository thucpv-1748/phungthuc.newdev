@extends('layout.frontend.frontend_master')

@section('page', __('step 1'))

@section('head')
    <!-- jQuery UI -->
    <link href="{{ URL::asset('jquery-ui-themes/themes/smoothness/jquery-ui.css') }}" rel="stylesheet" />
    <!-- Swiper slider -->
    <link href="{{ URL::asset('css/frontend/external/idangerous.swiper.css') }}" rel="stylesheet" />
@endsection

@section('content')
        <!-- Main content -->
        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="{{ url::asset('images/tickets.png') }}">
                    <p class="order__title">{{ __('Book a ticket') }}<br><span class="order__descript">{{ __('and have fun movie time') }}</span></p>
                    <div class="order__control">
                        <a href="#" class="order__control-btn active">{{ __('Purchase') }}</a>
                        <a href="#" class="order__control-btn">{{ __('Reserve') }}</a>
                    </div>
                </div>
            </div>
                <div class="order-step-area">
                    <div class="order-step first--step">{{ '1.' . __('What') . '&amp;' . __('Where') . '&amp;' . __('When') }}1. </div>
                </div>
            <h2 class="page-heading heading--outcontainer">{{ __('Choose a movie') }}</h2>
        </section>
        
        <div class="choose-film">
            <div class="swiper-container">
              <div class="swiper-wrapper">
               @if ($film)
                   @foreach ($film as $value)
                      <div class="swiper-slide" data-film="{{ $value->title }}" data-id="{{ $value->id }}">
                            <div class="film-images">
                                <img alt="" src="{{ url($value->img) }}" width="380px" height="200px">
                            </div>
                            <p class="choose-film__title">{{ $value->title }}</p>
                      </div>
                   @endforeach
                @endif
              </div>
            </div>
        </div>

        <section class="container">
            <div class="col-sm-12">
                <div class="choose-indector choose-indector--film">
                    <strong>{{ __('Choosen') }}: </strong><span class="choosen-area"></span>
                </div>

                <h2 class="page-heading">{{ __('City') . '&amp;' . __('Date') }}</h2>

                <div class="choose-container choose-container--short">
                    <div class="datepicker">
                        <span class="datepicker__marker"><i class="fa fa-calendar"></i>{{ __('Date') }}</span>
                        <input type="text" id="datepicker" value="{{ now()->format('d-m-Y') }}" class="datepicker__input time-show">
                    </div>
                </div>
                <h2 class="page-heading">{{ __('Pick time') }}</h2>

                <div class="time-select time-select--wide data-time"></div>

                <div class="choose-indector choose-indector--time">
                    <strong>{{ __('Choosen') }}: </strong><span class="choosen-area"></span>
                </div>
            </div>

        </section>
        <div class="clearfix"></div>

        <form id='film-and-time' class="booking-form" method='post' action="">
            <input type='text' name='choosen_movie' class="choosen-movie" value="" required>
            <input type='text' name='choosen_time' class="choosen-time" required>
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
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var action = '{!! url('step1') !!}';
            var _token = $('input[name="_token"]').val();
            var url = '{!! url('/get-time-date/') !!}';
            selectFilm(action, url,  _token);
        });
    </script>
@endsection
