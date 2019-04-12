try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

function fillter()
{
    $('.select__field').keyup(function () {
        var base_url = $('.base-url').val();
        var _token = $('input[name="_token"]').val();
        var value = $(this).val();
        var data_fill = $('.mega-select__sort .filter-wrap .filter--active').attr('data-filter');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : _token
            }
        });
        $.ajax({
            type : 'POST',
            url : base_url + '/ajax-filter',
            data : {value:value, data_fill:data_fill},
            success:function(data) {
                if (data.success) {
                    $('.select__group.' + data_fill).html(data.html);
                }
            }
        });
    });
}
