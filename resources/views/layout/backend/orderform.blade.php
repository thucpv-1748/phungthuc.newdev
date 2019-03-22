@extends('layout.backend.admin')

@section('title','Order')

@section('content')

    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post">
            <div class="form-group">
                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden="hidden">
                <input hidden="hidden" name="id" id="id" value="{{isset($order['id']) ? $order['id'] : ''}}">
            </div>
            <div class="form-group coupon">
                <label for="name">Status:</label>
                <select class="form-control" name="status"  >
                    <option value="0" selected ="selected">Pending</option>
                    <option value="1" {{@$order['status'] == 1 ? 'selected ="selected"' : ''}}>Approve</option>
                </select>
            </div>
            <div class="form-group coupon">
                <label for="name">Coupon Code:</label>
                <select class="form-control select-coupon" name="coupon_id"  >
                    <option value="" >Select</option>
                    @if($coupon)
                        @foreach($coupon as $value)
                            <option value="{{$value->id}}" {{ @$order['coupon_id'] == $value->id ? 'selected ="selected"' : ''}}>{{ $value->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group ">
                <label for="name">Time Show:</label>
                <select class="form-control select-time-show" name="time_show_id" >
                    <option value="" >Select</option>
                    @if($timeShow)
                        @foreach($timeShow as $value)
                            <option value="{{$value->id}}" {{( @$order['time_show_id'] == $value->id) ? 'selected ="selected"' : ''}}>{{ $value->film->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group coupon">
                <label for="name">Fast Food:</label>
                <select class="form-control fast_food_ids" name="fast_food_ids" multiple >
                    @if($fastFood)
                        @foreach($fastFood as $value)
                            <option value="{{$value->id}}" {{in_array($value->id,explode(',',@$order['fast_food_ids'])) ? 'selected ="selected"' : ''}} data-price="{{$value->price}}">{{$value->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="seats">
                <div class="seat">
                </div>
            </div>
            <div class="form-group">
                <label for="name">Total Price:</label>
                <input type="text" class="form-control" name="total_price" id="total_price" value="{{isset($order['total_price']) ? $order['total_price'] : ''}}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Sale Price:</label>
                <input type="text" class="form-control" name="sale_price" id="sale_price" value="{{isset($order['sale_price']) ? $order['sale_price'] : ''}}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Final Price:</label>
                <input type="text" class="form-control" name="final_price" id="final_price" value="{{isset($order['final_price']) ? $order['final_price'] : ''}}" readonly>
            </div>

            {{csrf_field()}}
            <input hidden="hidden" name="base_url" value="{{url('/')}}">
            <input hidden="hidden" name="datajson" value="" class="datajson">
            <input hidden="hidden" name="data_seat" value="{{ @$order['seat'] }}" class="data_seat">
            <div class="modal-body">
                <div class="modal-footer" id="modal_footer">
                    <button type="submit" class="btn btn-default-border-blk" id="submit-btn">Save</button>
                </div>
            </div>
        </form>
    </div>
    <script>
            jQuery(function ($) {
                var id = $('#id').val();
                var coupon_id = $('.select-coupon').val();
                if(id){
                    getSeat();
                }
                if (coupon_id) {
                    getCoupon();
                }

                $('.select-coupon').change(function () {
                        getCoupon();
                });

                function getCoupon() {
                    var coupon_id =  $('.select-coupon').val(),
                        url = $('input[name="base_url"]').val() +'/admin/ajax-coupon/'+coupon_id;
                    if(coupon_id) {
                        $.ajax({
                            type: 'GET',
                            url: url,
                            success: function (data) {
                                if (data.success) {
                                    var coupon = JSON.parse(data.data);
                                    if (coupon.type == 1) {
                                        $('#sale_price').val(coupon.price);
                                        $('#sale_price').data('type', 1)
                                    } else if (coupon.type == 2) {
                                        $('#sale_price').val(coupon.percent);
                                        $('#sale_price').data('type', 2)
                                    }
                                    calculate();
                                }
                            }
                        });
                    }
                }

                function getSeat(){
                    var time_show_id =  $('.select-time-show').val(),
                        url = $('input[name="base_url"]').val() +'/admin/ajax-time-show/'+ time_show_id;
                    if(time_show_id){
                        $.ajax({
                            type:'GET',
                            url:url,
                            success:function(data) {
                                if(data.success) {
                                    $('.datajson').val(data.data);
                                    var seat = JSON.parse(data.data).room.seat;
                                    var seat_order = JSON.parse(data.data).order;
                                    var data_seat = $('.data_seat').val().split(",");
                                    var seat_order_ids = [];
                                    if(seat_order.length > 0){
                                        for (var i = 0;i < seat_order.length;i++)
                                        {
                                            if (seat_order[i].seat){
                                                seat_order_ids = seat_order_ids.concat(seat_order[i].seat.split(","));
                                            }
                                        }
                                    }
                                    if(seat.length){
                                        var html = '<h2>Room</h2>\n';
                                        for(var i = 0;i < seat.length ; i++){
                                            html +='<ul>\n' +
                                                '<p>'+ seat[i].row +'</p>\n';
                                            for (var j = 0 ; j < seat[i].col ; j++)
                                            {
                                                var value = i+'-'+j;
                                                var checked =  (data_seat.indexOf(value) > -1) ?'checked="checked"':'';
                                                var checked_all =  (seat_order_ids.indexOf(value) > -1) ?'seat_selected':'';
                                                    html += '<li><p>\n' + (j+1) +'</p>';
                                                html += '<input type="checkbox" name="seat_ids[]" value="'+value+'" hidden="hidden" class="seat_ids" '+ checked +'><div class="'+checked_all+'"></div> ' +'</li>\n'
                                            }
                                            html +=   '</ul>';
                                        }
                                        $('.seat').append(html);
                                        selectSeat();
                                    }else{
                                        $('.seat').append('');
                                    }
                                }
                            }
                        });
                    }else{
                        $('.seat').html('');
                    }

                }
                $('.select-time-show').change(function () {
                    getSeat();
                });
                $('.fast_food_ids').change(function () {
                    price();
                });


                function selectSeat(){
                    $('.seat ul li').click(function () {
                        this.children['seat_ids[]'].click();
                        price();
                    });
                }

                function price() {
                    var totalCheckboxes = parseFloat($('.seats .seat li input:checked').length);
                    var data = JSON.parse($('.datajson').val());
                    var price = parseFloat((data.sale_price > 0)? data.sale_price : data.price );
                    var fast_food = $('.fast_food_ids option:selected');
                    price = totalCheckboxes*price;
                    if(fast_food.length > 0)
                    {
                        for (var i = 0 ; i < fast_food.length ; i++)
                        {
                            price =price+ parseFloat(fast_food[i].dataset.price)
                        }
                    }
                    $('#total_price').val(price);
                    calculate();
                }

                function calculate() {
                    var sale_price = parseFloat($('#sale_price').val());
                    var type = $('#sale_price').data('type');
                    var total_price = parseFloat($('#total_price').val());
                    var final = 0;

                    if(type == 1 && total_price > 0){
                        final = total_price - sale_price;
                    }else if(type == 2 && total_price > 0) {
                        final = (total_price*sale_price) / 100;
                    }else {
                        final = total_price;
                    }
                    final = (final < 0)? 0 : final;
                    $('#final_price').val(final);
                }

            });
    </script>
    <style>
        .seat li {
            margin: 5px;
            /* background: none; */
            width: 25px;
            height: 25px;
            color: white;
            padding: 0 5px;
            /* display: inline-table; */
            cursor: pointer;
            position: relative;
        }
        .seat li div {
            background: #636b6f;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .seat li p{
            z-index: 2;
        }
        .seat ul{
            display: inline-flex;
            list-style: none;
            margin: 0 auto;
            text-align: center;
            width: 100%;
        }
        .seat{
            left: 50%;
            transform: translatex(-50%);
            padding-bottom: 50px;
        }
        .seat ul p{
            margin-right: 50px;
            padding-top: 5px;
        }
        .seat h2{
            text-align: center;
        }
        .seats .seat li p {
            z-index: 3;
            position: relative;
            color: white;
            font-size: 14px;
            line-height: 15px;
        }
        .seats .seat li .seat_ids:checked + div
        {
            background: #67b168 !important;
        }
        .seat_selected {
            background: red !important;
        }
    </style>
@endsection