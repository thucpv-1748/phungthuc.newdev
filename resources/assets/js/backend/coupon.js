try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}
function makecoupon()
{
    var text = '';
    var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    for (var i = 0; i < 10; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    return text;
}

var val = jQuery('#coupon_code').val();

if (val.length < 1) {
    jQuery('#coupon_code').val(makecoupon())
}
jQuery('.form-group.coupon i').click(function () {
    jQuery('#coupon_code').val(makecoupon());
});
