@extends('layout.frontend.frontend_master')

@section('page','Category Page')

@section('head')
    <!-- jQuery UI -->
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />
@endsection


@section('content')
        <!-- Main content -->
        <section class="container container-category">
            <div class="col-sm-12">
                <h2 class="page-heading">Movies</h2>
                <div class="select-area">
                    <div class="datepicker">
                      <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                      <input type="text" id="datepicker" value='{{ now()->format('d-m-Y') }}' class="datepicker__input time-show">
                    </div>

                </div>

                 <div class="tags-area">
                    <div class="tags tags--unmarked">
                        <span class="tags__label">Sorted by:</span>
                            <ul>
                                <li class="item-wrap"><a href="#" class="tags__item item-active" data-filter='id'>new</a></li>
                                <li class="item-wrap"><a href="#" class="tags__item" data-filter='fist_show'>release date</a></li>
                                <li class="item-wrap"><a href="#" class="tags__item" data-filter='title'>Title</a></li>
                            </ul>
                    </div>
                </div>
                <div class="list-film">
                @if( $film = $category->getFilm->sortByDesc('id') )
                    <!-- Movie preview item -->
                        @foreach($film as $value )
                            <div class="movie movie--preview movie--full">
                                <div class="col-sm-3 col-md-2 col-lg-2">
                                    <div class="movie__images">
                                        <img alt='' src="{{ url($value->img) }}">
                                    </div>
                                    <div class="movie__feature">
                                        <a href="#" class="movie__feature-item movie__feature--comment">123</a>
                                        <a href="#" class="movie__feature-item movie__feature--video">7</a>
                                        <a href="#" class="movie__feature-item movie__feature--photo">352</a>
                                    </div>
                                </div>

                                <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                                    <a href='{{ url('film/'.$value->id) }}' class="movie__title link--huge">{{ $value->title }}</a>

                                    <p class="movie__time">{{ $value->time }} min</p>

                                    <p class="movie__option"><strong>{{ __('language') }}: </strong><a href="#">{{ @$value->language }}</a></p>
                                    <p class="movie__option"><strong>{{ __('Year') }}: </strong><a href="#">{{ date('Y', strtotime($value->fist_show)) }}</a></p>
                                    <p class="movie__option"><strong>{{ __('Category') }}: </strong><a href="#">{{ @$value->category->title }}</a></p>
                                    <p class="movie__option"><strong>{{ __('Release date') }}: </strong>{{ date('d-M-Y', strtotime($value->fist_show)) }}</p>
                                    <p class="movie__option"><strong>{{ __('Director') }}: </strong><a href="#">{{ @$value->director }}</a></p>
                                    <p class="movie__option"><strong>{{ __('Actors') }}: </strong><a href="#"> {{ @$value->actor }}</a></p>

                                    <div class="movie__btns">
                                        <a href="{{ url('step1/'.$value->id) }}" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this movie</span></a>
                                        <a href="#" class="watchlist">Add to watchlist</a>
                                    </div>

                                    <div class="preview-footer">
                                        <div class="movie__rate"><div class="score"></div><span class="movie__rate-number">170 votes</span> <span class="movie__rating">5.0</span></div>


                                        <a href="#" class="movie__show-btn">Showtime</a>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <!-- Time table (choose film start time)-->
                                <div class="time-select">
                                    @if($data = $value->timeShow->where('time_show', '>=', date('Y-m-d', strtotime(now())))->where('time_show', '<',  date('Y-m-d', strtotime(now()->modify('+1 day'))))->groupBy('room_id'))
                                        @foreach($data as $key => $times)
                                            <div class="time-select__group">
                                                <div class="col-sm-3">
                                                    <p class="time-select__place">{{ $room->find($key)->store->name }}</p>
                                                </div>
                                                <ul class="col-sm-6 items-wrap">
                                                    @foreach($times as $time )
                                                        <li class="time-select__item" data-time='{{ @$time->id }}'>{{ date('H:i', strtotime($time->time_show)) }}</li>
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
                            <a href='#' class="pagination__prev">prev</a>
                            <a href='#' class="pagination__next">next</a>
                    </div>
                </div>

            </div>
        </section>
        <input value="{{ $category->id }}" class="category-id" name="category-id"  type="hidden" >
        <input value="id" class="sort-by" name="sort-by"  type="hidden" >
        {{csrf_field()}}
@endsection

@section('javascript')
    <!-- jQuery UI -->
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Magnific-popup -->
    <script src="{{ URL::asset('js/frontend/external/jquery.magnific-popup.min.js') }}"></script>

    <!--*** Google map  ***-->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <!--*** Google map infobox  ***-->
    <script src="{{ URL::asset('js/frontend/external/infobox.js') }}"></script>

    <!-- Swiper slider -->
    <script src="{{ URL::asset('js/frontend/external/idangerous.swiper.min.js') }}"></script>

    <!-- Share buttons -->
    <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-525fd5e9061e7ef0"></script>
    <!-- JavaScript-->
    <script type="text/javascript">
        $(document).ready(function() {
            init_MovieList();

            $('.time-show').on('change',function () {
                getdata();
            });

            $('.tags-area .item-wrap').on('click',function () {
                $('.sort-by').val($(this).find('.item-active').data().filter);
                getdata();
            });

            function getdata() {
                var id = $('.category-id').val();
                var _token = $('input[name="_token"]').val();
                var  url = '{!! url('/get-data') !!}';
                var date =  $('.time-show').val();
                var sortby = $('.sort-by').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    type:'POST',
                    url:url,
                    data:{id:id, date:date, sortby:sortby},
                    success:function(data) {
                        if(data.success) {
                            $('.list-film').html(data.html);
                            init_MovieList();
                        }
                    }
                });
            }
        });
    </script>
@endsection



