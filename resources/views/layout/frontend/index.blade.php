@extends('layout.frontend.frontend_master')

@section('page', __('Home Page'))

@section('class-head','header-wrapper--home')

@section('content')
        <!-- Slider -->
        <div class="bannercontainer">
                    <div class="banner">
                        <ul>
                            <li data-transition="fade" data-slotamount="7" class="slide" data-slide=''>
                                <img alt='' src=" {{ URL::asset('img/avengers-character-poster-banner.jpeg') }}">
                                <div class="caption slide__video" data-x="0" data-y="0" data-autoplay='true'>
                                    <video class="media-element"
                                           autoplay="autoplay"
                                           preload='none'
                                           loop="loop"
                                           muted=""
                                           src="{{ URL::asset('video/y2mate.com - marvel_studios_avengers_endgame_official_trailer_TcMBFSGVi1c_1080p.mp4')  }}" >
                                        <source type="video/mp4"
                                                src="{{ URL::asset('video/video/y2mate.com - marvel_studios_avengers_endgame_official_trailer_TcMBFSGVi1c_1080p.mp4')  }}">
                                    </video>
                                </div>
                                <div class="caption slide__name margin-slider" 
                                     data-x="right" 
                                     data-y="80" 

                                     data-splitin="chars"
                                     data-elementdelay="0.1"

                                     data-speed="700" 
                                     data-start="1400" 
                                     data-easing="easeOutBack"

                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"

                                    data-frames="{ typ :lines;
                                                 elementdelay :0.1;
                                                 start:1650;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 },
                                                 { typ :lines;
                                                 elementdelay :0.1;
                                                 start:2150;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:00;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 }
                                                 "
                                    data-splitout="lines"
                                    data-endelementdelay="0.1"
                                    data-customout="x:-230;y:0;z:0;rotationX:0;rotationY:0;rotationZ:90;scaleX:0.2;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%"

                                    data-endspeed="500"
                                    data-end="8400"
                                    data-endeasing="Back.easeIn">
                                    {{ __('ĐẠI ÚY MARVEL') }}
                                </div>

                                <div class="caption slide__date margin-slider lfb ltb" 
                                     data-x="right" 
                                     data-hoffset='-149' 
                                     data-y="186" 
                                     data-speed="500" 
                                     data-start="2400" 
                                     data-easing="Power4.easeOut"
                                     data-endspeed="400"
                                     data-end="8200"
                                     data-endeasing="Back.easeIn">
                                    {{ __('Đạo Diễn : Anna Boden, Ryan Fleck') }}
                                 </div>
                                <div class="caption slide__time margin-slider sfr str"
                                     data-x="right"
                                     data-hoffset='-113'
                                     data-y="220"
                                     data-speed="300"
                                     data-start="2100"
                                     data-easing="easeOutBack"
                                     data-endspeed="300"
                                     data-end="8700"
                                     data-endeasing="Back.easeIn"
                                     >
                                    08/03/2019
                                 </div>
                            </li>

                            <li data-transition="fade" data-slotamount="7" class="slide fading-slide" data-slide=''>
                                <img alt='' src="{{ URL::asset('img/haiphuong.jpeg') }}">
                                 <div class="caption slide__video" data-x="0" data-y="0" data-autoplay='true'>
                                </div>

                                 <div class="caption slide__name slide__name--smaller" 
                                     data-x="left" 
                                     data-y="160" 

                                     data-splitin="chars"
                                     data-elementdelay="0.1"

                                     data-speed="700" 
                                     data-start="1400" 
                                     data-easing="easeOutBack"

                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"

                                    data-frames="{ typ :lines;
                                                 elementdelay :0.1;
                                                 start:1650;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 },
                                                 { typ :lines;
                                                 elementdelay :0.1;
                                                 start:2150;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:00;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 }
                                                 "


                                    data-splitout="lines"
                                    data-endelementdelay="0.1"
                                    data-customout="x:-230;y:0;z:0;rotationX:0;rotationY:0;rotationZ:90;scaleX:0.2;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%"
                                    data-endspeed="500"
                                    data-endeasing="Back.easeIn">
                                     {{ __('HAI PHƯỢNG') }}
                                </div>

                                <div class="caption slide__time position-center postion-place--one sfr stl" 
                                     data-x="left" 
                                      
                                     data-y="242"
                                     data-speed="300" 
                                     data-start="2100" 
                                     data-easing="easeOutBack"
                                     data-endspeed="300"
                                     
                                     data-endeasing="Back.easeIn">
                                     {{ __('Đạo diễn: Lê Văn Kiệt') }}
                                </div>
                                <div class="caption slide__date position-center postion-place--two lfb ltb" 
                                     data-x="left"                                       
                                     data-y="262"
                                     data-speed="500" 
                                     data-start="2400" 
                                     data-easing="Power4.easeOut"
                                     data-endspeed="400"
                                     
                                     data-endeasing="Back.easeIn">
                                    22/02/2019
                                 </div>
                            </li>

                            <li data-transition="fade" data-slotamount="7" class="slide" data-slide=''>
                                <img alt='' src="{{ URL::asset('img/alita.jpg') }}">
                                <div class="caption slide__name margin-slider"
                                     data-x="right"
                                     data-y="80"

                                     data-splitin="chars"
                                     data-elementdelay="0.1"

                                     data-speed="700"
                                     data-start="1400"
                                     data-easing="easeOutBack"

                                     data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"

                                     data-frames="{ typ :lines;
                                                 elementdelay :0.1;
                                                 start:1650;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 },
                                                 { typ :lines;
                                                 elementdelay :0.1;
                                                 start:2150;
                                                 speed:500;
                                                 ease:Power3.easeOut;
                                                 animation:x:0;y:0;z:0;rotationX:00;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:1;transformPerspective:600;transformOrigin:50% 50%;
                                                 }
                                                 "
                                     data-splitout="lines"
                                     data-endelementdelay="0.1"
                                     data-customout="x:-230;y:0;z:0;rotationX:0;rotationY:0;rotationZ:90;scaleX:0.2;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%"

                                     data-endspeed="500"
                                     data-end="8400"
                                     data-endeasing="Back.easeIn">
                                    {{ __('ALITA THIÊN THẦN CHIẾN BINH') }}
                                </div>
                                 <div class="caption slide__name slide__name--smaller slide__name--specific customin customout" 
                                     data-x="left" 
                                     data-y="160" 

                                     data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"

                                     data-speed="700" 
                                     data-start="1400" 
                                     data-easing="easeOutBack"
                                     data-endspeed="500"
                                     data-end="8600"
                                     data-endeasing="Back.easeIn">
                                     {{ __('Đạo Diễn : Robert Rodriguez') }}
                                </div>

                                  <div class="caption slide__descript customin customout" 
                                     data-x="left" 
                                     data-y="240"
                                     data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                                     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
                                     data-speed="700" 
                                     data-start="2000"
                                     data-endspeed="500"
                                     data-end="8400"
                                     data-endeasing="Back.easeIn">
                                      14/02/2019
                                 </div>
                            </li>

                        </ul>
                    </div>
                </div>

        <!--end slider -->

        <!-- Main content -->
        <section class="container">
            <div class="movie-best">
                 <div class="col-sm-10 col-sm-offset-1 movie-best__rating">{{ __('Today Best choice') }}</div>
                 <div class="col-sm-12 change--col">
                     @if ($bestfilm)
                         @foreach($bestfilm as $film)
                             <div class="movie-beta__item ">
                                 <img alt='' src="{{ url::asset($film->img) }}">
                                 <span class="best-rate">5.0</span>

                                 <ul class="movie-beta__info">
                                     <li><span class="best-voted">{{ __('71 people voted today') }}</span></li>
                                     <li>
                                         <p class="movie__time">{{ $film->time }} min</p>
                                         <p>{{ $film->director }} </p>
                                         <p>{{ __('38 comments') }}</p>
                                     </li>
                                     <li class="last-block">
                                         <a href="{{ url('film/'.$film->id) }}" class="slide__link">{{ __('more') }}</a>
                                     </li>
                                 </ul>
                             </div>
                         @endforeach
                     @endif
                 </div>
                <div class="col-sm-10 col-sm-offset-1 movie-best__check">{{ __('check all movies now playing') }}</div>
            </div>

            <div class="col-sm-12">
                <div class="mega-select-present mega-select-top mega-select--full">
                    <div class="mega-select-marker">
                        <div class="marker-indecator cinema">
                            <p class="select-marker"><span>{{ __('find your ') }}</span> <br>{{ __('cinema') }}</p>
                        </div>

                        <div class="marker-indecator film-category">
                            <p class="select-marker"><span>{{ __('find movie due to ') }}</span> <br>{{ __(' your mood') }}</p>
                        </div>

                        <div class="marker-indecator actors">
                            <p class="select-marker"><span>{{ __('like particular stars') }}</span> <br>{{ __('find them') }}</p>
                        </div>

                        <div class="marker-indecator director">
                            <p class="select-marker"><span>{{ __('admire personalities - find ') }}</span> <br>{{ __('by director') }}</p>
                        </div>
                    </div>

                      <div class="mega-select pull-right">
                          <span class="mega-select__point">{{ __('Search by') }}</span>
                          <ul class="mega-select__sort">
                              <li class="filter-wrap"><a href="#" class="mega-select__filter filter--active" data-filter='cinema'>{{ __('Cinema') }}</a></li>
                              <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='film-category'>{{ __('Category') }}</a></li>
                              <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='actors'>{{ __('Actors') }}</a></li>
                              <li class="filter-wrap"><a href="#" class="mega-select__filter" data-filter='director'>{{ __('Director') }}</a></li>
                          </ul>

                          <input name="search-input" type='text' class="select__field">
                          
                          <div class="select__btn">
                            <a href="#" class="btn btn-md btn--danger location">{{ __('find ') }}<span class="hidden-exrtasm">{{ __('your city') }}</span></a>
                            <a href="#" class="btn btn-md btn--danger cinema">{{ __('find ') }}<span class="hidden-exrtasm">{{ __('suitable cimema') }}</span></a>
                            <a href="#" class="btn btn-md btn--danger film-category">{{ __('find ') }}<span class="hidden-exrtasm">{{ __('best category') }}</span></a>
                            <a href="#" class="btn btn-md btn--danger actors">{{ __('find ') }}<span class="hidden-exrtasm">{{ __('talented actors') }}</span></a>
                            <a href="#" class="btn btn-md btn--danger director">{{ __('find ') }}<span class="hidden-exrtasm">{{ __('favorite director') }}</span></a>
                          </div>

                          <div class="select__dropdowns">
                              <ul class="select__group cinema">
                                  @if ($cinema)
                                      @foreach($cinema as $value)
                                      <li class="select__variant" data-value='{{ $value->name }}'>{{ $value->name }}</li>
                                      @endforeach
                                  @endif
                              </ul>

                              <ul class="select__group film-category">
                                  @if ($category)
                                      @foreach($category as $value)
                                          <li class="select__variant" data-value="{{ $value->title }}">{{ $value->title }}</li>                                      @endforeach
                                  @endif
                              </ul>

                              <ul class="select__group actors">
                              </ul>

                              <ul class="select__group director">
                              </ul>
                          </div>
                      </div>
                  </div>
            </div>
            
            <div class="clearfix"></div>

            <h2 id='target' class="page-heading heading--outcontainer">{{ __('Now in the cinema') }}</h2>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                    @if($bestfilm)
                        @php($x = 0)
                        @foreach($bestfilm as $film)
                            @if($x <= 2)
                            <!-- Movie variant with time -->
                                <div class="movie movie--test movie--test--dark movie--test--left">
                                    <div class="movie__images">
                                        <a href="{{ url('film/'.$film->id) }}" class="movie-beta__link">
                                            <img alt='' src="{{ url::asset($film->img) }}">
                                        </a>
                                    </div>

                                    <div class="movie__info">
                                        <a href='{{ url('film/'.$film->id) }}' class="movie__title">{{ $film->title}}</a>

                                        <p class="movie__time">{{ $film->time }}</p>

                                        <p class="movie__option"><a href="#">{{ __('Sci-Fi') }}</a> | <a href="#">{{ __('Thriller') }}</a> | <a href="#">{{ __('Drama') }}</a></p>

                                        <div class="movie__rate">
                                            <div class="score"></div>
                                            <span class="movie__rating">4.1</span>
                                        </div>
                                    </div>
                                </div>
                             <!-- Movie variant with time -->
                            @else
                             <!-- Movie variant with time -->
                                <div class="movie movie--test movie--test--light movie--test--right">
                                    <div class="movie__images">
                                        <a href="{{ url('film/'.$film->id) }}" class="movie-beta__link">
                                            <img alt='' src="{{ url($film->img) }}">
                                        </a>
                                    </div>

                                    <div class="movie__info">
                                        <a href='{{ url('film/'.$film->id) }}' class="movie__title">{{ $film->title }}</a>

                                        <p class="movie__time">{{ $film->time}}</p>

                                        <p class="movie__option"><a href="#">{{ __('Action') }}</a> | <a href="#">{{ __('Adventure') }}</a> | <a href="#">{{ __('Sci-Fi') }}</a></p>

                                        <div class="movie__rate">
                                            <div class="score"></div>
                                            <span class="movie__rating">4.9</span>
                                        </div>
                                    </div>
                                </div>
                              <!-- Movie variant with time -->
                             @endif
                            @php(($x == 5) ? $x = 0 : $x++)
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <h2 class="page-heading">{{ __('Latest news') }}</h2>

                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="http://amovie.gozha.net/images/client-photo/post-thor.jpg">
                            <div class="social social--position social--hide">
                                <span class="social__name">{{ __('Share:') }}</span>
                                <a href='#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">{{ __('22 October 2013') }}</p>
                        <a href="#" class="post__title">{{ __('"Thor: The Dark World" - World Premiere') }}</a>
                        <a href="#" class="btn read-more post--btn">{{ __('read more') }}</a>
                    </div>
                </div>
                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="http://amovie.gozha.net/images/client-photo/post-annual.jpg">
                            <div class="social social--position social--hide">
                                <span class="social__name">{{ __('Share:') }}</span>
                                <a href='#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">{{ __('22 October 2013 ') }}</p>
                        <a href="#" class="post__title">{{ __('30th Annual Night Of Stars Presented By The Fashion Group International') }}</a>
                        <a href="#" class="btn read-more post--btn">{{ __('read more') }}</a>
                    </div>
                </div>
                <div class="col-sm-4 similar-wrap col--remove">
                    <div class="post post--preview post--preview--wide">
                        <div class="post__image">
                            <img alt='' src="http://amovie.gozha.net/images/client-photo/post-awards.jpg">
                            <div class="social social--position social--hide">
                                <span class="social__name">{{ __('Share') }}:</span>
                                <a href='#' class="social__variant social--first fa fa-facebook"></a>
                                <a href='#' class="social__variant social--second fa fa-twitter"></a>
                                <a href='#' class="social__variant social--third fa fa-vk"></a>
                            </div>
                        </div>
                        <p class="post__date">{{ __('22 October 2013 ') }}</p>
                        <a href="#" class="post__title">{{ __('Hollywood Film Awards 2013') }}</a>
                        <a href="#" class="btn read-more post--btn">{{ __('read more') }}</a>
                    </div>
                </div>
            </div>
                
        </section>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        init_Home();
    });
</script>
@endsection
