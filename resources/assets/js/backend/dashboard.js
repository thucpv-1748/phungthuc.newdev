try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}


$( document ).ready(function() {



    $('#menu-action').click(function() {
        $('.sidebar').toggleClass('active');
        $('.main').toggleClass('active');
        $(this).toggleClass('active');

        if ($('.sidebar').hasClass('active')) {
            $(this).find('i').addClass('fa-close');
            $(this).find('i').removeClass('fa-bars');
        } else {
            $(this).find('i').addClass('fa-bars');
            $(this).find('i').removeClass('fa-close');
        }
    });

// Add hover feedback on menu
    $('#menu-action').hover(function() {
        $('.sidebar').toggleClass('hovered');
    });


    $('.show-btn').on('click', function() {
       var id = this.dataset.id;
       var _token = $('input[name="_token"]').val();
       var  url = $('input[name="base_url"]').val() +'/admin/ajaxgetuser';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': _token
            }
        });
        $.ajax({
            type:'POST',
            url:url,
            data:{id:id},
            success:function(data) {
                var user = data.user;
                $('input[name="name"]').val(user.name);
                $('input[name="email"]').val(user.email);
                $('input[name="level"]').val(user.level);
                $('input[name="phone"]').val(user.phone);
                $('input[name="birth_of_date"]').val(user.birth_of_date);
                $('input[name="password"]').val(user.password);
                $('#myModalHorizontal').modal('show');
            }
        });

    });
});
