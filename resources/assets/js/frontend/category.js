try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

function category(url)
{
    $('.time-show').on('change',function () {
        getdata(url);
    });

    $('.tags-area .item-wrap').on('click',function () {
        $('.sort-by').val($(this).find('.item-active').data().filter);
        getdata(url);
    });
}

function getdata(url) {
    var id = $('.category-id').val();
    var _token = $('input[name="_token"]').val();
    var date =  $('.time-show').val();
    var sortby = $('.sort-by').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });
    $.ajax({
        type:'POST',
        url:url,
        data:{id:id, date:date, sortby:sortby},
        success:function(data) {
            if(data.success) {
                $('.list-film').html(data.html);
                init_MovieList();
            }
        }
    });
}
