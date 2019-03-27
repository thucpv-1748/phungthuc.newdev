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


    var max_fields      = 10; //maximum input boxes allowed
    var wrapper   		= $('.form-room .frm-room .row-form'); //Fields wrapper
    var add_button      = $('.add_field_button'); //Add button ID
    var x = $('.row-form .form-group').length; //initlal text box count
    $(add_button).click(function(e) {
        //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append('' +
                '<div class="form-group">'+
                '<label for="name">' + Lang.get('Seats in row') + x + ':</label>'+
                '<input type="number" class="form-control" name="row[]" value="" required="required">' +
                '<a href="#" class="remove_field"><i class="fa fa-minus"></i></a>' +
                '</div>');
            //add input box
        }
    });

    $(wrapper).on('click', '.remove_field', function(e) {
        //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
