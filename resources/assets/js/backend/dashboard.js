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

    $('.add-user').click(function () {
        $('#frm-donation .form-group').find("input").val("");
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
                if(data.success) {
                    var user = data.user;
                    $('input[name="id_user"]').val(user.id);
                    $('input[name="name"]').val(user.name);
                    $('input[name="email"]').val(user.email);
                    $('input[name="level"]').val(user.level);
                    $('input[name="phone"]').val(user.phone);
                    $('input[name="birth_of_date"]').val(user.birth_of_date);
                    $('input[name="password"]').val(user.password);
                    $('#myModalHorizontal').modal('show');
                }else {
                    $('#user_error').modal('show');
                }
            }
        });

    });



    var max_fields      = 10; //maximum input boxes allowed
    var wrapper   		= $(".form-room .frm-room .row-form"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var x = $('.row-form .form-group').length; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('' +
                '<div class="form-group">'+
                 '<label for="name">Seats in row '+ x +':</label>'+
                 '<input type="number" class="form-control" name="row[]" value="" required="required">' +
                '<a href="#" class="remove_field"><i class="fa fa-minus"></i></a>' +
                '</div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
