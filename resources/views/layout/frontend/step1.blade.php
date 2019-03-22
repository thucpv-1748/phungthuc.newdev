@extends('layout.frontend.frontend_master')

@section('page','book1')

@section('head')
    <!-- jQuery UI --> 
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />
        <!-- Swiper slider -->
        <link href="{{ URL::asset('css/frontend/external/idangerous.swiper.css') }}" rel="stylesheet" />

@endsection


@section('content')
        <!-- Search bar -->
        <div class="search-wrapper">
            <div class="container container--add">
                <form id='search-form' method='get' class="search">
                    <input type="text" class="search__field" placeholder="Search">
                    <select name="sorting_item" id="search-sort" class="search__sort" tabindex="0">
                        <option value="1" selected='selected'>By title</option>
                        <option value="2">By year</option>
                        <option value="3">By producer</option>
                        <option value="4">By title</option>
                        <option value="5">By year</option>
                    </select>
                    <button type='submit' class="btn btn-md btn--danger search__button">search a movie</button>
                </form>
            </div>
        </div>
        
        <!-- Main content -->

        <section class="container">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src=" {{ url('images/tickets.png') }}">
                    <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                    <div class="order__control">
                        <a href="#" class="order__control-btn active">Purchase</a>
                        <a href="#" class="order__control-btn">Reserve</a>
                    </div>
                </div>
            </div>
                <div class="order-step-area">
                    <div class="order-step first--step">1. What &amp; Where &amp; When</div>
                </div>

            <h2 class="page-heading heading--outcontainer">Film : {{ $film->title  }}</h2>
        </section>

        <section class="container">
            <div class="col-sm-12">

                <h2 class="page-heading">City &amp; Date</h2>

                <div class="choose-container choose-container--short">
                    <div class="datepicker">
                      <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                      <input type="text" id="datepicker" value='{{ now()->format('d-m-Y') }}' class="datepicker__input">
                    </div>
                </div>

                <h2 class="page-heading">Pick time</h2>

                <div class="time-select time-select--wide">
                    @if($data = $film->timeShow->where('time_show', '>=', date('Y-m-d', strtotime(now())))->where('time_show', '<',  date('Y-m-d', strtotime(now()->modify('+1 day'))))->groupBy('room_id'))
                        @foreach($data as $key => $value)
                        <div class="time-select__group group--first">
                            <div class="col-sm-3">
                                <p class="time-select__place">{{ $room->find($key)->store->name }}</p>
                            </div>
                            <ul class="col-sm-6 items-wrap">
                                @foreach($value as $time )
                                <li class="time-select__item" data-time='{{ @$time->id }}'>{{ date('H:i', strtotime($time->time_show)) }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                     @endif
                    </div>

                <div class="choose-indector choose-indector--time">
                    <strong>Choosen: </strong><span class="choosen-area"></span>
                </div>
            </div>

        </section>

        <div class="clearfix"></div>

        <form id='film-and-time' class="booking-form" method='post' action="{{ url('step1/'.$film->id) }}">
            <input type='text' name='choosen_movie' class="choosen-movie" value="{{ $film->id }}" required>
            <input type='text' name='choosen_time' class="choosen-time" required>
            {{csrf_field()}}
            <div class="booking-pagination">
                    <button href="#" class="booking-pagination__prev hide--arrow">
                        <span class="arrow__text arrow--prev"></span>
                        <span class="arrow__info"></span>
                    </button>
                    <button type="submit" class="booking-pagination__next">
                        <span class="arrow__text arrow--next">next step</span>
                        <span class="arrow__info">choose a sit</span>
                    </button>
            </div>
        </form>
        
        <div class="clearfix"></div>
@endsection


@section('javascript')
    <!-- jQuery UI -->
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Swiper slider -->
    <script src="{{ URL::asset('js/frontend/external/idangerous.swiper.min.js') }}"></script>
	<!-- JavaScript-->
		<script type="text/javascript">
            $(document).ready(function() {
                init_BookingOne();
            });
		</script>
@endsection
