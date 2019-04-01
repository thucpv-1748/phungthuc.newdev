@extends('layout.frontend.frontend_master')

@section('page', __('book1'))

@section('content')
        
        <!-- Main content -->
        <section class="container container-step3">
            <div class="order-container">
                <div class="order">
                    <img class="order__images" alt='' src="images/tickets.png">
                    <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                </div>
            </div>
                <div class="order-step-area">
                    <div class="order-step first--step order-step--disable ">1. What &amp; Where &amp; When</div>
                    <div class="order-step second--step order-step--disable">2. Choose a sit</div>
                    <div class="order-step third--step">3. Check out</div>
                </div>

            <div class="col-sm-12">
                <div class="checkout-wrapper">
                    <h2 class="page-heading">Coupon</h2>
                    <div class="form-coupon">
                        <input type="text" class="form-control coupon" name="coupon" />
                        <div class="alert-coupon"></div>
                    </div>
                    <h2 class="page-heading">Fast Food</h2>
                        <div class="fast-food">
                            <table border="1px" class="table table-striped pure-table">
                                <tr id="tbl-first-row">
                                   <td>Food</td>
                                   <td>Description</td>
                                   <td>Price</td>
                                   <td>Quality</td>
                                </tr>
                                    @if($fast_food)
                                        @foreach($fast_food as $value)
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
                    <h2 class="page-heading">price</h2>
                    <ul class="book-result">
                        <li class="book-result__item">Tickets: <span class="book-result__count booking-ticket">{{ count(explode(',',@$data['choosen-sits']))  }}</span></li>
                        <li class="book-result__item">One item price: <span class="book-result__count booking-price">{{ @$data['price'] }}</span></li>
                        <li class="book-result__item">Total: <span class="book-result__count booking-cost">{{ @$data['choosen-cost'].'.000' }}</span></li>
                    </ul>

                    <h2 class="page-heading">Choose payment method</h2>
                    <div class="payment">
                        <a href="#" class="payment__item">
                            <img alt='' src="images/payment/pay1.png">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="images/payment/pay2.png">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="images/payment/pay3.png">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="images/payment/pay4.png">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="images/payment/pay5.png">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="images/payment/pay6.png">
                        </a>
                        <a href="#" class="payment__item">
                            <img alt='' src="images/payment/pay7.png">
                        </a>
                    </div>

                    <h2 class="page-heading">Contact information</h2>
            
                    <form id='contact-info' method='post' novalidate="" class="form contact-info">
                        <div class="contact-info__field contact-info__field-mail">
                            <input type='email' name='user-mail' placeholder='Your email' class="form__mail">
                        </div>
                        <div class="contact-info__field contact-info__field-tel">
                            <input type='tel' name='user-tel' placeholder='Phone number' class="form__mail">
                        </div>
                    </form>

                
                </div>
                
                <div class="order">
                    <form id='film-and-time' class="booking-form" method='post' action="{{ url('step3/') }}">
                        <input type='text' name='time_show_id' class="choosen-time" value="{{ isset($data['time-id']) ? $data['time-id'] : '' }}" required>
                        <input type='text' name='seat' class="choosen-time" value="{{ isset($data['choosen-sits']) ? $data['choosen-sits'] : '' }}" required>
                        <input type='text' name='final_price' class="choosen-cost" value="{{ isset($data['choosen-cost']) ? $data['choosen-cost'] : '' }}" required>
                        <input type='text' name='sale_price' class="sale_price" value="">
                        <input type='text' name='total_price' class="total_price" value="">
                        <input type='text' name='user_id' class="user_id" value="{{ Auth::user()->id }}">
                        <input type='text' hidden="hidden" value="" name="fast_food_ids" class="fastfoods">
                        <input type='text' hidden="hidden" value="" name="coupon-data" class="coupon-data">
                        <input type='text' hidden="hidden" value="" name="status" class="status">
                        {{ csrf_field() }}
                        <div class="booking-pagination">
                            <button type="submit" class="btn btn-md btn--warning btn--wide">purchase</button>
                        </div>
                    </form>

                </div>

            </div>

        </section>
        

        <div class="clearfix"></div>

        <div class="booking-pagination">
                <a href="{{ url('step2/'.@$data['time-id']) }}" class="booking-pagination__prev">
                    <p class="arrow__text arrow--prev">prev step</p>
                    <span class="arrow__info">choose a sit</span>
                </a>
                <a href="#" class="booking-pagination__next hide--arrow">
                    <p class="arrow__text arrow--next">next step</p>
                    <span class="arrow__info"></span>
                </a>
        </div>
@endsection

@section('javascript')
    <!-- jQuery UI -->
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- JavaScript-->
    <script type="text/javascript">
        $(document).ready(function() {
           $('.fast-food .quality').on('change',function () {
               calculate();
           });
            $('.form-coupon .coupon').on('change',function () {
                var _token = $('input[name="_token"]').val();
                var  url = '{!! url('/check-coupon') !!}';
                var code = $('.form-coupon .coupon').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': _token
                    }
                });
                $.ajax({
                    type:'POST',
                    url:url,
                    data:{code:code},
                    success:function(data) {
                        if(data.success) {
                            $('.coupon-data').data('type',data.data.type);
                            $('.coupon-data').val(JSON.stringify(data.data));
                            calculate();
                            $('.form-coupon .alert-coupon').html('<div class="alert alert-success">\n' + data.data.name +
                                '                        </div>');
                        }else {
                            $('.form-coupon .alert-coupon').html('<div class="alert alert-danger">Error! </div>');
                        }
                    }
                });

            });
           
           function calculate() {
               var fastfoods = '';
               var cost = parseFloat('{{ @$data['choosen-cost'] }}');
               var coupon = $('.coupon-data').val();
               var coupon_type =  $('.coupon-data').data('type');
               $.each( $('.fast-food .quality'), function( key, value ) {
                   var quality = parseInt($(this).val()),
                       price =  parseFloat($(this).data().price),
                       id = $(this).data().id;
                   if(quality > 0){
                       fastfoods += id + '-' + quality + ',';
                       cost = cost + price * quality;
                   }
               });
               $('.total_price').val(cost);
               if(coupon.length > 0 && coupon_type == '1'){
                   cost = cost - parseFloat(JSON.parse(coupon).price);
                   $('.sale_price').val(parseFloat(JSON.parse(coupon).price))
               }else if(coupon.length > 0 && coupon_type == '2' ){
                   cost = cost - ((cost * JSON.parse(coupon).percent) / 100);
                   $('.sale_price').val((cost * JSON.parse(coupon).percent) / 100)
               }
               (cost < 0)?cost = 0 : cost;
               $('.fastfoods').val(fastfoods);
               $('.book-result .booking-cost').text(cost + ',000');
               $('.choosen-cost').val(cost);
           }
        });
    </script>
@endsection