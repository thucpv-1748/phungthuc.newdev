try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}
jQuery(function ($) {
    var id = $('#id').val();
    var coupon_id = $('.select-coupon').val();
    if (id) {
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
            url = $('input[name="base_url"]').val() + '/admin/ajax-coupon/' + coupon_id;
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

    function getSeat()
    {
        var time_show_id =  $('.select-time-show').val(),
            url = $('input[name="base_url"]').val() + '/admin/ajax-time-show/' + time_show_id;
        if(time_show_id){
            $.ajax({
                type:'GET',
                url:url,
                success:function(data) {
                    if (data.success) {
                        $('.datajson').val(data.data);
                        var seat = JSON.parse(data.data).room.seat;
                        var seat_order = JSON.parse(data.data).order;
                        var data_seat = $('.data_seat').val().split(",");
                        var seat_order_ids = [];
                        if(seat_order.length > 0){
                            for (var i = 0; i < seat_order.length; i++)
                            {
                                if (seat_order[i].seat){
                                    seat_order_ids = seat_order_ids.concat(seat_order[i].seat.split(","));
                                }
                            }
                        }
                        if(seat.length){
                            var html = '<h2>' + Lang.get('Room') + '</h2>\n';
                            for(var i = 0; i < seat.length; i++){
                                html += '<ul>\n' +
                                    '<p>'+ seat[i].row +'</p>\n';
                                for (var j = 0; j < seat[i].col; j++)
                                {
                                    var value = i + '-' + j;
                                    var checked = (data_seat.indexOf(value) > -1) ? 'checked="checked"' : '' ;
                                    var checked_all =  (seat_order_ids.indexOf(value) > -1) ? 'seat_selected':'';
                                    html += '<li><p>\n' + (j + 1) +'</p>';
                                    html += '<input type="checkbox" name="seat[]" value="' + value + '" hidden="hidden" class="seat_ids" ' + checked + '><div class="' + checked_all + '"></div> ' + '</li>\n'
                                }
                                html +=   '</ul>';
                            }
                            $('.seat').append(html);
                            selectSeat();
                        } else {
                            $('.seat').append('');
                        }
                    }
                }
            });
        } else {
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
            this.children['seat[]'].click();
            price();
        });
    }

    function price() {
        var totalCheckboxes = parseFloat($('.seats .seat li input:checked').length);
        var data = JSON.parse($('.datajson').val());
        var price = parseFloat((data.sale_price > 0) ? data.sale_price : data.price );
        var fast_food = $('.fast_food_ids option:selected');
        price = totalCheckboxes * price;
        if (fast_food.length > 0) {
            for (var i = 0 ; i < fast_food.length ; i++)
            {
                price = price + parseFloat(fast_food[i].dataset.price)
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

        if (type == 1 && total_price > 0) {
            final = total_price - sale_price;
        } else if (type == 2 && total_price > 0) {
            final = total_price - ((total_price * sale_price) / 100);
        } else {
            final = total_price;
        }
        final = (final < 0 || !final) ? 0 : final;
        $('#final_price').val(final);
    }
});
