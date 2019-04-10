@extends('layout.frontend.frontend_master')

@section('page', __('book3'))

@section('content')
    <!-- Main content -->
    <section class="container container-step3">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt="" src="{{ asset(config('asset.tickets')) }}">
                <p class="order__title">{{ __('Book a ticket') }}<br><span class="order__descript">{{ __('and have fun movie time') }}</span></p>
            </div>
        </div>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable">1.{{ __('What') . '&amp;' . __('Where') . '&amp;' . __('When') }}</div>
            <div class="order-step second--step order-step--disable">2. {{ __('Choose a sit') }}</div>
            <div class="order-step third--step">3. {{ __('Check out') }}</div>
        </div>

        <div class="col-sm-12">
            <div class="checkout-wrapper">
                <h2 class="page-heading">{{ __('Coupon') }}</h2>
                <div class="form-coupon">
                    <input type="text" class="form-control coupon" name="coupon"/>
                    <div class="alert-coupon"></div>
                </div>
                <h2 class="page-heading">{{ __('Fast Food') }}</h2>
                <div class="fast-food">
                    <table border="1px" class="table table-striped pure-table">
                        <tr id="tbl-first-row">
                            <td>{{ __('Food') }}</td>
                            <td>{{ __('Description') }}</td>
                            <td>{{ __('Price') }}</td>
                            <td>{{ __('Quality') }}</td>
                        </tr>
                        @if ($fastfood)
                            @foreach ($fastfood as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>{{ $value->price }}</td>
                                    <td><input type="number" class="form-control quality" name="quality" value="0" data-price="{{ $value->price }}"  data-id="{{ $value->id }}" min="0" max="100"></td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
                <h2 class="page-heading">{{ __('price') }}</h2>
                <ul class="book-result">
                    <li class="book-result__item">{{ __('Tickets') }}: <span class="book-result__count booking-ticket">{{ isset($data['choosen-sits']) ? count(explode(',', $data['choosen-sits'])) : 0 }}</span></li>
                    <li class="book-result__item">{{ __('One item price') }}: <span class="book-result__count booking-price">{{ isset($data['price']) ? $data['price'] : 0 }}</span></li>
                    <li class="book-result__item">{{ __('Total') }}: <span class="book-result__count booking-cost">{{ isset($data['choosen-cost']) ? $data['choosen-cost'] . '.000' : 0 }}</span></li>
                </ul>

                <h2 class="page-heading">{{ __('Choose payment method') }}</h2>
                <div class="payment">
                    <a href="#" class="payment__item">
                        <img alt="" src="{{ asset(config('asset.payment') . 'pay1.png') }}">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt="" src="{{ asset(config('asset.payment') . 'pay2.png') }}">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt="" src="{{ asset(config('asset.payment') . 'pay3.png') }}">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt="" src="{{ asset(config('asset.payment') . 'pay4.png') }}">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt="" src="{{ asset(config('asset.payment') . 'pay5.png') }}">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt="" src="{{ asset(config('asset.payment') . 'pay6.png') }}">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt="" src="{{ asset(config('asset.payment') . 'pay7.png') }}">
                    </a>
                </div>

                <h2 class="page-heading">{{ __('Contact information') }}</h2>

                <form id="contact-info" method="post" novalidate="" class="form contact-info">
                    <div class="contact-info__field contact-info__field-mail">
                        <input type="email" name="user-mail" placeholder="{{ __('Your email') }}" class="form__mail">
                    </div>
                    <div class="contact-info__field contact-info__field-tel">
                        <input type="tel" name="user-tel" placeholder="{{ __('Phone number') }}" class="form__mail">
                    </div>
                </form>


            </div>

            <div class="order">
                <form id="film-and-time" class="booking-form" method="post" action="{{ url('step3/') }}">
                    <input type="text" name="time_show_id" class="choosen-time" value="{{ isset($data['time-id']) ? $data['time-id'] : '' }}" required>
                    <input type="text" name="seat" class="choosen-time" value="{{ isset($data['choosen-sits']) ? $data['choosen-sits'] : '' }}" required>
                    <input type="text" name="final_price" class="choosen-cost" value="{{ isset($data['choosen-cost']) ? $data['choosen-cost'] : '' }}" required>
                    <input type="text" name="sale_price" class="sale_price" value="">
                    <input type="text" name="total_price" class="total_price" value="">
                    <input type="text" name="user_id" class="user_id" value="{{ Auth::user()->id }}">
                    <input type="text" hidden="hidden" value="" name="fast_food_ids" class="fastfoods">
                    <input type="text" hidden="hidden" value="" name="coupon-data" class="coupon-data">
                    <input type="text" hidden="hidden" value="" name="status" class="status">
                    {{ csrf_field() }}
                    <div class="booking-pagination">
                        <button type="submit" class="btn btn-md btn--warning btn--wide">{{ __('purchase') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <div class="booking-pagination">
        <a href="{{ url('step2/' . isset($data['time-id']) ? $data['time-id'] : '' ) }}" class="booking-pagination__prev">
            <p class="arrow__text arrow--prev">{{ __('prev step') }}</p>
            <span class="arrow__info">{{ __('choose a sit') }}</span>
        </a>
        <a href="#" class="booking-pagination__next hide--arrow">
            <p class="arrow__text arrow--next">{{ __('next step') }}</p>
            <span class="arrow__info"></span>
        </a>
    </div>
@endsection

@section('javascript')
    <!-- jQuery UI -->
    <link href="{{ URL::asset('jquery-ui/external/jquery-1.10.2/jquery.js') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('js/frontend/step3.js') }}" rel="stylesheet"/>
    <!-- JavaScript-->
    <script type="text/javascript">
        $(document).ready(function() {
            var cost = parseFloat('{{ isset($data['choosen-cost']) ? $data['choosen-cost'] : 0 }}');
            var  url = '{!! url('/check-coupon') !!}';
            step3(url, cost);
        });
    </script>
@endsection
