
@if ($film = $category->getFilm->sortByDesc($sortby))
    @php(($sortby == 'title') ? $film = $category->getFilm->sortBy($sortby) : '')
    <!-- Movie preview item -->
    @foreach ($film as $value)
        <div class="movie movie--preview movie--full">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt="" src="{{ url($value->img) }}">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">123</a>
                    <a href="#" class="movie__feature-item movie__feature--video">7</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">352</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='{{ url('film/' . $value->id) }}' class="movie__title link--huge">{{ $value->title }}</a>

                <p class="movie__time">{{ $value->time . __('min')}}</p>

                <p class="movie__option"><strong>{{ __('language') }}: </strong><a href="#">{{ $value->language }}</a></p>
                <p class="movie__option"><strong>{{ __('Year') }}: </strong><a href="#">{{ date('Y', strtotime($value->fist_show)) }}</a></p>
                <p class="movie__option"><strong>{{ __('Category') }}: </strong><a href="#">{{ isset($value->catrgory) ? $value->catrgory->name : '' }}</a></p>
                <p class="movie__option"><strong>{{ __('Release date') }}: </strong>{{ date('d-M-Y', strtotime($value->fist_show)) }}</p>
                <p class="movie__option"><strong>{{ __('Director') }}: </strong><a href="#">{{ $value->director }}</a></p>
                <p class="movie__option"><strong>{{ __('Actors') }}: </strong><a href="#">{{ $value->actor }}</a></p>

                <div class="movie__btns">
                    <a href="{{ url('step1/' . $value->id) }}" class="btn btn-md btn--warning">{{ __('book a ticket') }}<span class="hidden-sm">{{ __('for this movie') }}</span></a>
                    <a href="#" class="watchlist">{{ __('Add to watchlist') }}</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate"><div class="score"></div><span class="movie__rate-number">{{ __('170 votes') }}</span> <span class="movie__rating">5.0</span></div>
                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>
            <!-- Time table (choose film start time)-->
            <div class="time-select">
                @if($data = $value->timeShow->where('time_show', '>=', date('Y-m-d', strtotime($date)))->where('time_show', '<',  date('Y-m-d', strtotime($date . '+1 day')))->groupBy('room_id'))
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