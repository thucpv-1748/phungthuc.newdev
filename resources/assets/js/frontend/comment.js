try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}

function comment()
{
    $('.btn-post-comment').on('click', function () {
        var film_id = $('#comment-form .film_id').val();
        var description = $('#comment-form .description').val();
        var parent = $('#comment-form .parent').val();
        var _token = $('input[name="_token"]').val();
        var url = $('#comment-form').attr('action');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : _token
            }
        });
        $.ajax({
            type : 'POST',
            url : url,
            data : {film_id:film_id, description:description, parent:parent},
            success:function(data) {
                if (data.success) {
                    $('.comment-wrapper .comment-sets').html(data.html);
                } else {
                    $('.comment-wrapper .comment-sets').html('');
                }
            }
        });
    });
}
