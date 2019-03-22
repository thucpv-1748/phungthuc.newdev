@extends('layout.frontend.frontend_master')

@section('page','book1')

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
        <div class="place-form-area">
            <section class="container">
                <div class="order-container">
                    <div class="order">
                        <img class="order__images" alt='' src=" {{ url('images/tickets.png')  }}">
                        <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                        <div class="order__control">
                            <a href="#" class="order__control-btn active">Purchase</a>
                            <a href="#" class="order__control-btn">Reserve</a>
                        </div>
                    </div>
                </div>
                    <div class="order-step-area">
                        <div class="order-step first--step order-step--disable ">1. What &amp; Where &amp; When</div>
                        <div class="order-step second--step">2. Choose a sit</div>
                    </div>

                <div class="choose-sits">
                    <div class="choose-sits__info choose-sits__info--first">
                        <ul>
                            <li class="sits-price marker--none"><strong>Price</strong></li>
                            <li class="sits-price sits-price--cheap">{{ ($time_show->sale_price)?$price = $time_show->sale_price :  $price = $time_show->price }}</li>
                            <input name="price-ticket" class="price-ticket" hidden="hidden" type="text" value="{{ $price }}">
                        </ul>
                    </div>

                    <div class="choose-sits__info">
                        <ul>
                            <li class="sits-state sits-state--not">Not available</li>
                            <li class="sits-state sits-state--your">Your choice</li>
                        </ul>
                    </div>

                    <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                    <div class="sits-area hidden-xs">
                        <div class="sits-anchor">screen</div>

                        <div class="sits">
                            @php($seat = $time_show->room->seat)
                            <aside class="sits__line">
                                @if($rows = count($seat->toArray()))
                                    @for($i = 0 ;$i < $rows ; $i++ )
                                         <span class="sits__indecator">{{ Config('nameRow.'.$i) }}</span>
                                    @endfor
                                @endif
                                {{--<span class="sits__indecator additional-margin">J</span>--}}

                            </aside>
                                @if($seat)
                                    @foreach($seat as $key => $row)
                                         <div class="sits__row">
                                             @for($i = 1 ; $i <= $row->col ;$i++ )
                                                 <span class="sits__place sits-price--cheap {{(in_array($key.'-'.$i,$seat_ids))? 'sits-state--not' : ''}}" data-place='{{ $key.'-'.$i }}' data-price='{{ $price  }}' >{{ Config('nameRow.'.$key).$i }}</span>
                                             @endfor
                                        </div>
                                    @endforeach
                                @endif
                            <aside class="sits__checked">
                                <div class="checked-place">

                                </div>
                                <div class="checked-result">
                                    $0
                                </div>
                            </aside>
                            <footer class="sits__number">
                                @if($max_col = $time_show->room->seat->max('col'))
                                    @for($i = 1; $i <= $max_col ; $i++)
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

                                <a href="#" class="btn btn-md btn--warning toogle-sits">Choose sit</a>
                            </div>
                        </div>

                        <a href="#" class="watchlist add-sits-line">Add new sit</a>

                        <aside class="sits__checked">
                                <div class="checked-place">
                                    <span class="choosen-place"></span>
                                </div>
                                <div class="checked-result">
                                    $0
                                </div>
                        </aside>

                        <img alt="" src=" {{ url('images/components/sits_mobile.png') }}">
                    </div>
                </div>

                </div>
            </section>
         </div>

        <div class="clearfix"></div>
        <form id='film-and-time' class="booking2-form" method='post' action="{{ url('/step2/'.$time_show->id) }}">
            <input type='hidden' name='price' class="price"  value="{{ ($time_show->sale_price)? $time_show->sale_price : $time_show->price }}" >
            <input type='hidden' name='choosen-cost' class="choosen-cost" >
            <input type='hidden' name='choosen-sits' class="choosen-sits" required>
            <input type='hidden' name='time-id' class="time-id" value="{{ $time_show->id }}">
            {{csrf_field()}}
            <div class="booking-pagination booking-pagination--margin">
                <button onclick="location.href='{{ url('step1/'.$time_show->film->id) }}'" class="booking-pagination__prev">
                    <span class="arrow__text arrow--prev">prev step</span>
                    <span class="arrow__info">what&amp;where&amp;when</span>
                </button>
                <button type="submit" class="booking-pagination__next">
                    <span class="arrow__text arrow--next">next step</span>
                    <span class="arrow__info">checkout</span>
                </button>
            </div>
        </form>
@endsection


@section('javascript')
    <!-- jQuery UI -->
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- JavaScript-->
    <script type="text/javascript">
        $(document).ready(function() {
            init_BookingTwo();
        });
    </script>
@endsection

