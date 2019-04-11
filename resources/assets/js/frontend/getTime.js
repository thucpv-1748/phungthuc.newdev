try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

function getTimeBydate(id, url, _token)
{
    $('.time-show').on('change',function () {
        getdata(id, url, _token);
    });
    checkDate();
}

function checkDate() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day) ;
    $("#datepicker").datepicker("option", "minDate", now);
    $("#datepicker").val(today);
}

function selectFilm(action, url, _token) {
    $('.film-images').click(function (e) {
        //data element init
        var chooseFilm = $(this).parent().attr('data-id');
        getdata(chooseFilm, url, _token);
        $('.choosen-movie').val(chooseFilm);
        $('.booking-form').attr('action', action + '/' + chooseFilm);
    });

    $('.time-show').on('change',function () {
        var id = $('.swiper-slide-active').attr('data-id');
        getdata(id, url, _token);
    });

    checkDate();
}

function getdata(id, url, _token) {
    var date = $('.time-show').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : _token
        }
    });
    $.ajax({
        type : 'POST',
        url : url,
        data : {id:id, date:date},
        success:function(data) {
            if (data.success) {
                $('.time-select.data-time').html(data.html);
                chooseTime();
            } else {
                $('.time-select.data-time').html('');
            }
        }
    });
}

function chooseTime()
{
    // var for booking;
    var cinema = $('.choosen-cinema'),
        time = $('.choosen-time');

    //choose time
    $('.time-select__item').click(function () {
        //visual iteractive for choose
        $('.time-select__item').removeClass('active');
        $(this).addClass('active');

        //data element init
        var chooseTime = $(this).attr('data-time');
        $('.choose-indector--time').find('.choosen-area').text($(this).text());

        //data element init
        var chooseCinema = $(this).parent().parent().find('.time-select__place').text();

        //data element set
        time.val(chooseTime);
        cinema.val(chooseCinema);
    });
}
