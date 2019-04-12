try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

function step3(url, cost)
{
    $('.fast-food .quality').on('change', function () {
        calculate(cost);
    });
    $('.form-coupon .coupon').on('change', function () {
        var _token = $('input[name="_token"]').val();
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
                if (data.success) {
                    $('.coupon-data').data('type', data.data.type);
                    $('.coupon-data').val(JSON.stringify(data.data));
                    calculate(cost);
                    $('.form-coupon .alert-coupon').html('<div class="alert alert-success">\n' + data.data.name +
                        '                        </div>');
                } else {
                    $('.form-coupon .alert-coupon').html('<div class="alert alert-danger">Error! </div>');
                }
            }
        });

    });
}


function calculate(cost)
{
    var fastfoods = '';
    var coupon = $('.coupon-data').val();
    var coupon_type =  $('.coupon-data').data('type');
    $.each($('.fast-food .quality'), function(key, value) {
        var quality = parseInt($(this).val()),
            price =  parseFloat($(this).data().price),
            id = $(this).data().id;
        if(quality > 0){
            fastfoods += id + '-' + quality + ',';
            cost = cost + price * quality;
        }
    });
    $('.total_price').val(cost);
    if (coupon.length > 0 && coupon_type == '1') {
        cost = cost - parseFloat(JSON.parse(coupon).price);
        $('.sale_price').val(parseFloat(JSON.parse(coupon).price))
    } else if (coupon.length > 0 && coupon_type == '2' ) {
        cost = cost - ((cost * JSON.parse(coupon).percent) / 100);
        $('.sale_price').val((cost * JSON.parse(coupon).percent) / 100)
    }
    (cost < 0) ? cost = 0 : cost;
    $('.fastfoods').val(fastfoods);
    $('.book-result .booking-cost').text(cost + ',000');
    $('.choosen-cost').val(cost);
}
