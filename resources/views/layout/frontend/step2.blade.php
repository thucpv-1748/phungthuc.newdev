@extends('layout.frontend.frontend_master')

@section('page', __('book 2'))

@section('content')
        <!-- Search bar -->
        <div class="search-wrapper">
            <div class="container container--add">
                <form id='search-form' method='get' class="search">
                    <input type="text" class="search__field" placeholder="Search">
                    <select name="sorting_item" id="search-sort" class="search__sort" tabindex="0">
                        <option value="1" selected='selected'>{{ __('By title') }}</option>
                        <option value="2">{{ __('By year') }}</option>
                        <option value="3">{{ __('By producer') }}</option>
                        <option value="4">{{ __('By title') }}</option>
                        <option value="5">{{ __('By year') }}</option>
                    </select>
                    <button type='submit' class="btn btn-md btn--danger search__button">{{ __('search a movie') }}</button>
                </form>
            </div>
        </div>
        
        <!-- Main content -->
        <div class="place-form-area">
            <section class="container">
                <div class="order-container">
                    <div class="order">
                        <img class="order__images" alt='' src=" {{ asset(config('asset.tickets')) }}">
                        <p class="order__title">{{ __('Book a ticket') }}<br><span class="order__descript">{{ __('and have fun movie time') }}</span></p>
                        <div class="order__control">
                            <a href="#" class="order__control-btn active">{{ __('Purchase') }}</a>
                            <a href="#" class="order__control-btn">{{ __('Reserve') }}</a>
                        </div>
                    </div>
                </div>
                    <div class="order-step-area">
                        <div class="order-step first--step order-step--disable ">{{ __('1. What' . '&amp;' . 'Where' . '&amp;' . 'When') }}</div>
                        <div class="order-step second--step">{{ __('2. Choose a sit') }}</div>
                    </div>

                <div class="choose-sits">
                    <div class="choose-sits__info choose-sits__info--first">
                        <ul>
                            <li class="sits-price marker--none"><strong>{{ __('Price') }}</strong></li>
                            <li class="sits-price sits-price--cheap">{{ ($timeshow->sale_price) ? $price = $timeshow->sale_price :  $price = $timeshow->price }}</li>
                            <input name="price-ticket" class="price-ticket" hidden="hidden" type="text" value="{{ $price }}">
                        </ul>
                    </div>

                    <div class="choose-sits__info">
                        <ul>
                            <li class="sits-state sits-state--not">{{ __('Not available') }}</li>
                            <li class="sits-state sits-state--your">{{ __('Your choice') }}</li>
                        </ul>
                    </div>

                    <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                    <div class="sits-area hidden-xs">
                        <div class="sits-anchor">{{ __('screen') }}</div>

                        <div class="sits">
                            @php ($seat = $timeshow->room->seat)
                            <aside class="sits__line">
                                @if ($rows = count($seat->toArray()))
                                    @for ($i = 0 ; $i < $rows ; $i++ )
                                         <span class="sits__indecator">{{ Config('nameRow.'.$i) }}</span>
                                    @endfor
                                @endif
                                {{--<span class="sits__indecator additional-margin">J</span>--}}
                            </aside>
                                @if ($seat)
                                    @foreach ($seat as $key => $row)
                                         <div class="sits__row">
                                             @for ($i = 1 ; $i <= $row->col ;$i++ )
                                                 <span class="sits__place sits-price--cheap {{ (in_array($key . '-' . $i, $seatids)) ? 'sits-state--not' : '' }}" data-place='{{ $key . '-' . $i }}' data-price='{{ $price  }}' >{{ Config('nameRow.' . $key) . $i }}</span>
                                             @endfor
                                        </div>
                                    @endforeach
                                @endif
                            <aside class="sits__checked">
                                <div class="checked-place"></div>
                                <div class="checked-result">$0</div>
                            </aside>
                            <footer class="sits__number">
                                @if ($max_col = $timeshow->room->seat->max('col'))
                                    @for ($i = 1 ; $i <= $max_col ; $i++)
                                      <span class="sits__indecator">{{ $i }}</span>
                                    @endfor
                                @endif
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 visible-xs">
                    <div class="sits-area--mobile">
                        <div class="sits-area--mobile-wrap">
                            <div class="sits-select">
                                <select name="sorting_item" class="sits__sort sit-row" tabindex="0">
                                        <option value="1" selected='selected'>A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                        <option value="4">D</option>
                                        <option value="5">E</option>
                                        <option value="6">F</option>
                                        <option value="7">G</option>
                                        <option value="8">I</option>
                                        <option value="9">J</option>
                                        <option value="10">K</option>
                                        <option value="11">L</option>
                                </select>

                                <select name="sorting_item" class="sits__sort sit-number" tabindex="1">
                                        <option value="1" selected='selected'>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                </select>
                                <a href="#" class="btn btn-md btn--warning toogle-sits">{{ __('Choose sit') }}</a>
                            </div>
                        </div>

                        <a href="#" class="watchlist add-sits-line">{{ __('Add new sit') }}</a>

                        <aside class="sits__checked">
                                <div class="checked-place">
                                    <span class="choosen-place"></span>
                                </div>
                                <div class="checked-result">$0</div>
                        </aside>

                        <img alt="" src="{{ asset(config('asset.sits_mobile')) }}">
                    </div>
                </div>

                </div>
            </section>
         </div>

        <div class="clearfix"></div>
        <form id="film-and-time" class="booking2-form" method="post" action="{{ url('/step2/' . $timeshow->id) }}">
            <input type="hidden" name="price" class="price"  value="{{ ($timeshow->sale_price) ? $timeshow->sale_price : $timeshow->price }}">
            <input type="hidden" name="choosen-cost" class="choosen-cost">
            <input type="hidden" name="choosen-sits" class="choosen-sits" required>
            <input type="hidden" name="time-id" class="time-id" value="{{ $timeshow->id }}">
            {{ csrf_field() }}
            <div class="booking-pagination booking-pagination--margin">
                <button onclick="location.href='{{ url('step1/' . $timeshow->film->id) }}'" class="booking-pagination__prev">
                    <span class="arrow__text arrow--prev">{{ __('prev step') }}</span>
                    <span class="arrow__info">{{ __('what' . '&amp;' . 'where' . '&amp;' . 'when') }}</span>
                </button>
                <button type="submit" class="booking-pagination__next">
                    <span class="arrow__text arrow--next">{{ __('next step') }}</span>
                    <span class="arrow__info">{{ __('checkout') }}</span>
                </button>
            </div>
        </form>
@endsection

@section('javascript')
    <!-- jQuery UI -->
    <link href="{{ URL::asset('jquery-ui/external/jquery-1.10.2/jquery.js') }}" rel="stylesheet" />
    <!-- JavaScript-->
    <script type="text/javascript">
        $(document).ready(function() {
            init_BookingTwo();
        });
    </script>
@endsection
