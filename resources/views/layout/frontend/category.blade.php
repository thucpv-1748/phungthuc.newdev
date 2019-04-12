@extends('layout.frontend.frontend_master')

@section('page', __('Category Page'))

@section('head')
    <!-- jQuery UI -->
    <link href="{{ URL::asset('jquery-ui-themes/themes/smoothness/jquery-ui.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Main content -->
    <section class="container container-category">
        <div class="col-sm-12">
            <h2 class="page-heading">{{ __('Movies') }}</h2>
            <div class="select-area">
                <div class="datepicker">
                    <span class="datepicker__marker"><i class="fa fa-calendar"></i>{{ __('Date') }}</span>
                    <input type="text" id="datepicker" value="{{ now()->format('d-m-Y') }}" class="datepicker__input time-show">
                </div>

            </div>

            <div class="tags-area">
                <div class="tags tags--unmarked">
                    <span class="tags__label">{{ __('Sorted by') }}:</span>
                    <ul>
                        <li class="item-wrap"><a href="#" class="tags__item item-active" data-filter="id">{{ __('new') }}</a></li>
                        <li class="item-wrap"><a href="#" class="tags__item" data-filter="fist_show">{{ __('release date') }}</a></li>
                        <li class="item-wrap"><a href="#" class="tags__item" data-filter="title">{{ __('Title') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="list-film">
            @if ($film = $category->getFilm->sortByDesc('id'))
                <!-- Movie preview item -->
                @foreach ($film as $value)
                    <div class="movie movie--preview movie--full">
                        <div class="col-sm-3 col-md-2 col-lg-2">
                            <div class="movie__images">
                                <img alt="" src="{{ url($value->img) }}">
                            </div>
                            <div class="movie__feature">
                                <a href="#" class="movie__feature-item movie__feature--comment">{{ count($value->comment) }}</a>
                                <a href="#" class="movie__feature-item movie__feature--video">7</a>
                                <a href="#" class="movie__feature-item movie__feature--photo">352</a>
                            </div>
                        </div>

                        <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                            <a href="{{ url('film/' . $value->id) }}" class="movie__title link--huge">{{ $value->title }}</a>

                            <p class="movie__time">{{ $value->time }} min</p>

                            <p class="movie__option"><strong>{{ __('language') }}: </strong><a href="#">{{ isset($value) ? $value->language : '' }}</a></p>
                            <p class="movie__option"><strong>{{ __('Year') }}: </strong><a href="#">{{ isset($value) ? date('Y', strtotime($value->fist_show)) : '' }}</a></p>
                            <p class="movie__option"><strong>{{ __('Category') }}: </strong><a href="#">{{ isset($value->category) ? $value->category->title : '' }}</a></p>
                            <p class="movie__option"><strong>{{ __('Release date') }}: </strong>{{ isset($value) ? date('d-M-Y', strtotime($value->fist_show)) : '' }}</p>
                            <p class="movie__option"><strong>{{ __('Director') }}: </strong><a href="#">{{ isset($value) ? $value->director : '' }}</a></p>
                            <p class="movie__option"><strong>{{ __('Actors') }}: </strong><a href="#"> {{ isset($value) ? $value->actor : '' }}</a></p>

                            <div class="movie__btns">
                                <a href="{{ url('step1/' . $value->id) }}" class="btn btn-md btn--warning">{{ __('book a ticket') }}<span class="hidden-sm">{{ __('for this movie') }}</span></a>
                                <a href="#" class="watchlist">{{ __('Add to watchlist') }}</a>
                            </div>

                            <div class="preview-footer">
                                <div class="movie__rate"><div class="score"></div><span class="movie__rate-number">170 {{ __('votes') }}</span> <span class="movie__rating">5.0</span></div>
                                <a href="#" class="movie__show-btn">{{ __('Showtime') }}</a>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <!-- Time table (choose film start time)-->
                        <div class="time-select">
                            @if ($data = $value->timeShow->where('time_show', '>=', date('Y-m-d', strtotime(now())))->where('time_show', '<',  date('Y-m-d', strtotime(now()->modify('+1 day'))))->groupBy('room_id'))
                                @foreach ($data as $key => $times)
                                    <div class="time-select__group">
                                        <div class="col-sm-3">
                                            <p class="time-select__place">{{ $room->findOrFail($key)->store->name }}</p>
                                        </div>
                                        <ul class="col-sm-6 items-wrap">
                                            @foreach ($times as $time)
                                                <li class="time-select__item" data-time="{{ isset($time) ? $time->id : '' }}">{{ isset($time) ? date('H:i', strtotime($time->time_show)) : '' }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- end time table-->
                    </div>
                @endforeach
                <!-- end movie preview item -->
                @endif
            </div>

            <div class="coloum-wrapper">
                <div class="pagination paginatioon--full">
                    <a href="#" class="pagination__prev">{{ __('prev') }}</a>
                    <a href="#" class="pagination__next">{{ __('next') }}</a>
                </div>
            </div>

        </div>
    </section>
    <input value="{{ $category->id }}" class="category-id" name="category-id" type="hidden">
    <input value="id" class="sort-by" name="sort-by"  type="hidden" >
    {{ csrf_field() }}
@endsection

@section('javascript')
    <!-- jQuery UI -->
    <link href="{{ URL::asset('jquery-ui/external/jquery-1.10.2/jquery.js') }}" rel="stylesheet"/>
    <!-- Magnific-popup -->
    <script src="{{ URL::asset('js/frontend/external/jquery.magnific-popup.min.js') }}"></script>

    <!--*** Google map  ***-->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <!--*** Google map infobox  ***-->
    <script src="{{ URL::asset('js/frontend/external/infobox.js') }}"></script>

    <!-- Swiper slider -->
    <script src="{{ URL::asset('js/frontend/external/idangerous.swiper.min.js') }}"></script>

    <!-- JavaScript-->
    <script src="{{ URL::asset('js/frontend/category.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            init_MovieList();
            var  url = '{!! url('/get-data') !!}';
            category(url);
        });
    </script>
@endsection
