try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

function rate(login)
{
    $('.score').click(function () {
        if (login == 1) {
            var rate = $(this).find('input').val();
            var film_id = $(this).attr('data-id');
            var url = $('.base-url').val() + '/rate';
            var _token = $('input[name="_token"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': _token
                }
            });

            $.ajax({
                type:'POST',
                url:url,
                data:{film_id:film_id, rate:rate},
                success:function(data) {
                    if (data.success) {
                        console.log('ok')
                    }
                }
            });
        } else {
            window.location.href = $('.base-url').val() + '/login';
        }
    });
}
