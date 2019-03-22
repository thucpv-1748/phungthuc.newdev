@extends('layout.frontend.frontend_master')

@section('page','Film page')

@section('head')
    <!-- jQuery UI -->
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <!-- Swiper slider -->
    <link href="{{ URL::asset('css/frontend/external/idangerous.swiper.css') }}" rel="stylesheet" />

    <!-- Magnific-popup -->
    <link href="{{ URL::asset('css/frontend/external/magnific-popup.css') }}" rel="stylesheet" />

@endsection


@section('content')
    <!-- Main content -->
    <section class="container container-film">
        <div class="col-sm-12">
            <div class="movie">
                <h2 class="page-heading">{{ @$film->title }}</h2>

                <div class="movie__info">
                    <div class="col-sm-4 col-md-3 movie-mobile">
                        <div class="movie__images">
                            <span class="movie__rating">5.0</span>
                            <img alt='' src="{{ url($film->img) }}">
                        </div>
                        <div class="movie__rate">{{ __('Your vote:') }} <div id='score' class="score"></div></div>
                    </div>

                    <div class="col-sm-8 col-md-9">
                        <p class="movie__time"> {{  @$film->time }}</p>

                        <p class="movie__option"><strong>{{ __('language') }}: </strong><a href="#">{{ @$film->language }}</a></p>
                        <p class="movie__option"><strong>{{ __('Year') }}: </strong><a href="#">{{ date('Y', strtotime($film->fist_show)) }}</a></p>
                        <p class="movie__option"><strong>{{ __('Category') }}: </strong><a href="{{ url('category/'.@$film->category->id) }}">{{ @$film->category->title }}</a></p>
                        <p class="movie__option"><strong>{{ __('Release date') }}: </strong>{{ date('d-M-Y', strtotime($film->fist_show)) }}</p>
                        <p class="movie__option"><strong>{{ __('Director') }}: </strong><a href="#">{{ @$film->director }}</a></p>
                        <p class="movie__option"><strong>{{ __('Actors') }}: </strong><a href="#"> {{ @$film->actor }}</a></p>

                        <a href="#" class="comment-link">{{ __('Comments:') }}:  15</a>

                        <div class="movie__btns movie__btns--full">
                            <a href="{{ url('step1/'.@$film->id) }}" class="btn btn-md btn--warning">{{ __('book a ticket for this movie') }}</a>
                            <a href="#" class="watchlist">{{ __('Add to watchlist') }}</a>
                        </div>

                        <div class="share">
                            <span class="share__marker">Share: </span>
                            <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                <a class="addthis_button_tweet"></a>
                                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <h2 class="page-heading">{{ __('Description') }}</h2>

                <p class="movie__describe">{{ @$film->description }}</p>

                <h2 class="page-heading">photos &amp; videos</h2>

                <div class="movie__media">
                    <div class="movie__media-switch">
                        <a href="#" class="watchlist list--photo" data-filter='media-photo'>234 photos</a>
                        <a href="#" class="watchlist list--video" data-filter='media-video'>10 videos</a>
                    </div>

                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!--First Slide-->
                            <div class="swiper-slide media-video">
                                <a href='{{ URL::asset('video/y2mate.com - marvel_studios_avengers_endgame_official_trailer_TcMBFSGVi1c_1080p.mp4')  }}' class="movie__media-item ">
                                    <img alt='' src="{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                </a>
                            </div>

                            <!--Second Slide-->
                            <div class="swiper-slide media-video">
                                <a href='{{ URL::asset('video/y2mate.com - marvel_studios_avengers_endgame_official_trailer_TcMBFSGVi1c_1080p.mp4')  }}' class="movie__media-item">
                                    <img alt='' src="{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                </a>
                            </div>

                            <!--Third Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}' class="movie__media-item">
                                    <img alt='' src="{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                </a>
                            </div>

                            <!--Four Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}' class="movie__media-item">
                                    <img alt='' src="{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                </a>
                            </div>

                            <!--Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}' class="movie__media-item">
                                    <img alt='' src="{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                </a>
                            </div>

                            <!--Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}' class="movie__media-item">
                                    <img alt='' src="{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                </a>
                            </div>

                            <!--First Slide-->
                            <div class="swiper-slide media-video">
                                <a href='{{ URL::asset('video/y2mate.com - marvel_studios_avengers_endgame_official_trailer_TcMBFSGVi1c_1080p.mp4')  }}' class="movie__media-item ">
                                    <img alt='' src="{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                </a>
                            </div>

                            <!--Second Slide-->
                            <div class="swiper-slide media-video">
                                <a href='{{ URL::asset('video/y2mate.com - marvel_studios_avengers_endgame_official_trailer_TcMBFSGVi1c_1080p.mp4')  }}' class="movie__media-item">
                                    <img alt='' src="{{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                </a>
                            </div>

                            <!--Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='https://www.google.com/imgres?imgurl=https%3A%2F%2Ftrainghiemso.vn%2Fwp-content%2Fuploads%2F2017%2F12%2Fthu-thach-than-chet-poster-560x800.jpg&imgrefurl=https%3A%2F%2Ftrainghiemso.vn%2Ftrailer-phim-thu-thach-chet-giua-hai-gioi%2F&docid=hbIKG3przoQ6RM&tbnid=YEc1IqrhjkxwyM%3A&vet=10ahUKEwjv5vDxhJDhAhUMU7wKHWcuDz4QMwhhKBowGg..i&w=560&h=800&bih=640&biw=1301&q=anh%20trailer%20film%20400x240&ved=0ahUKEwjv5vDxhJDhAhUMU7wKHWcuDz4QMwhhKBowGg&iact=mrc&uact=8' class="movie__media-item">
                                    <img alt='' src="https://www.google.com/imgres?imgurl=https%3A%2F%2Ftrainghiemso.vn%2Fwp-content%2Fuploads%2F2017%2F12%2Fthu-thach-than-chet-poster-560x800.jpg&imgrefurl=https%3A%2F%2Ftrainghiemso.vn%2Ftrailer-phim-thu-thach-chet-giua-hai-gioi%2F&docid=hbIKG3przoQ6RM&tbnid=YEc1IqrhjkxwyM%3A&vet=10ahUKEwjv5vDxhJDhAhUMU7wKHWcuDz4QMwhhKBowGg..i&w=560&h=800&bih=640&biw=1301&q=anh%20trailer%20film%20400x240&ved=0ahUKEwjv5vDxhJDhAhUMU7wKHWcuDz4QMwhhKBowGg&iact=mrc&uact=8">
                                </a>
                            </div>

                            <!--Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='https://www.google.com/imgres?imgurl=https%3A%2F%2Ftrainghiemso.vn%2Fwp-content%2Fuploads%2F2017%2F12%2Fthu-thach-than-chet-poster-560x800.jpg&imgrefurl=https%3A%2F%2Ftrainghiemso.vn%2Ftrailer-phim-thu-thach-chet-giua-hai-gioi%2F&docid=hbIKG3przoQ6RM&tbnid=YEc1IqrhjkxwyM%3A&vet=10ahUKEwjv5vDxhJDhAhUMU7wKHWcuDz4QMwhhKBowGg..i&w=560&h=800&bih=640&biw=1301&q=anh%20trailer%20film%20400x240&ved=0ahUKEwjv5vDxhJDhAhUMU7wKHWcuDz4QMwhhKBowGg&iact=mrc&uact=8' class="movie__media-item">
                                    <img alt='' src="https://www.google.com/imgres?imgurl=https%3A%2F%2Ftrainghiemso.vn%2Fwp-content%2Fuploads%2F2017%2F12%2Fthu-thach-than-chet-poster-560x800.jpg&imgrefurl=https%3A%2F%2Ftrainghiemso.vn%2Ftrailer-phim-thu-thach-chet-giua-hai-gioi%2F&docid=hbIKG3przoQ6RM&tbnid=YEc1IqrhjkxwyM%3A&vet=10ahUKEwjv5vDxhJDhAhUMU7wKHWcuDz4QMwhhKBowGg..i&w=560&h=800&bih=640&biw=1301&q=anh%20trailer%20film%20400x240&ved=0ahUKEwjv5vDxhJDhAhUMU7wKHWcuDz4QMwhhKBowGg&iact=mrc&uact=8">
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <h2 class="page-heading">showtime &amp; tickets</h2>
            <div class="choose-container">

                <div class="datepicker">
                    <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                    <input type="text" id="datepicker" value='{{ now()->format('d-m-Y') }}' class="datepicker__input time-show">
                </div>

                <a href="#" id="map-switch" class="watchlist watchlist--map watchlist--map-full"><span class="show-map">Show cinemas on map</span><span  class="show-time">Show cinema time table</span></a>

                <div class="clearfix"></div>

                <div class="time-select">
                    @if($data = $film->timeShow->where('time_show', '>=', now()->format('d-m-Y'))->where('time_show', '<', now()->modify('+1 day'))->groupBy('room_id'))
                        @foreach($data as $key => $value)
                            <div class="time-select__group">
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

                <!-- hiden maps with multiple locator-->
                <div  class="map">
                    <div id='cimenas-map'></div>
                </div>

                <h2 class="page-heading">comments (15)</h2>

                <div class="comment-wrapper">
                    <form id="comment-form" class="comment-form" method='post'>
                        <textarea class="comment-form__text" placeholder='Add you comment here'></textarea>
                        <label class="comment-form__info">250 characters left</label>
                        <button type='submit' class="btn btn-md btn--danger comment-form__btn">add comment</button>
                    </form>

                    <div class="comment-sets">

                        <div class="comment">
                            <div class="comment__images">
                                <img alt='' src="http://placehold.it/50x50">
                            </div>

                            <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                            <p class="comment__date">today | 03:04</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div class="comment">
                            <div class="comment__images">
                                <img alt='' src="http://placehold.it/50x50">
                            </div>

                            <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Olia Gozha</a>
                            <p class="comment__date">22.10.2013 | 14:40</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div class="comment comment--answer">
                            <div class="comment__images">
                                <img alt='' src="http://placehold.it/50x50">
                            </div>

                            <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Dmitriy Pustovalov</a>
                            <p class="comment__date">today | 10:19</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div class="comment comment--last">
                            <div class="comment__images">
                                <img alt='' src="http://placehold.it/50x50">
                            </div>

                            <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Sia Andrews</a>
                            <p class="comment__date"> 22.10.2013 | 12:31 </p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div id='hide-comments' class="hide-comments">
                            <div class="comment">
                                <div class="comment__images">
                                    <img alt='' src="http://placehold.it/50x50">
                                </div>

                                <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                                <p class="comment__date">today | 03:04</p>
                                <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                                <a href='#' class="comment__reply">Reply</a>
                            </div>

                            <div class="comment">
                                <div class="comment__images">
                                    <img alt='' src="http://placehold.it/50x50">
                                </div>

                                <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Olia Gozha</a>
                                <p class="comment__date">22.10.2013 | 14:40</p>
                                <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor tristique et.</p>
                                <a href='#' class="comment__reply">Reply</a>
                            </div>
                        </div>

                        <div class="comment-more">
                            <a href="#" class="watchlist">Show more comments</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="clearfix"></div>
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
            window.APP_URL = '{!! json_encode(url('/')) !!}';
            init_MoviePage();
            init_MoviePageFull();
        });
    </script>
@endsection

