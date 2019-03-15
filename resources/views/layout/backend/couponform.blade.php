@extends('layout.backend.admin')


@section('title','Form Coupon')
@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{isset($coupon['name']) ? $coupon['name'] : ''}}">
                <input hidden="hidden" name="id" value="{{isset($coupon['id']) ? $coupon['id'] : ''}}">
            </div>
            <div class="form-group coupon">
                <label for="name">Coupon Code:</label>
                <input type="text" class="form-control" name="coupon_code" id="coupon_code" value="{{isset($coupon['coupon_code']) ? $coupon['coupon_code'] : ''}}">
                <i style="font-size:24px" class="fa">&#xf021;</i>
            </div>
            <div class="form-group">
                <label for="name">Status:</label>
                <select class="form-control" required="required" name="status" >
                    <option value="" >Select</option>
                    <option value="1" {{@$coupon['status'] == 1 ? 'selected ="selected"' : ''}}>Enable</option>
                    <option value="0" {{@$coupon['status'] == 0 ? 'selected ="selected"' : ''}}>Disable</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Type:</label>
                <select class="form-control" required="required" name="type" >
                    <option value="">Select</option>
                    <option value="1" {{@$coupon['type'] == 1 ? 'selected ="selected"' : ''}}>Price</option>
                    <option value="2" {{@$coupon['type'] == 2 ? 'selected ="selected"' : ''}}>Percent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Price:</label>
                <input type="number" class="form-control" name="price" id="price" value="{{isset($coupon['price']) ? $coupon['price'] : ''}}">
            </div>
            <div class="form-group">
                <label for="name">Percent:</label>
                <input type="number" class="form-control" name="percent" id="percent" value="{{isset($coupon['percent']) ? $coupon['percent'] : ''}}">
            </div>

            {{csrf_field()}}
            <input hidden="hidden" name="base_url" value="{{url('/')}}">
            <div class="modal-body">
                <div class="modal-footer" id="modal_footer">
                    <button type="submit" class="btn btn-default-border-blk" id="submit-btn">Save</button>
                </div>
            </div>
        </form>

    </div>
    <script>
        function makecoupon() {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (var i = 0; i < 10; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }
        var val = jQuery('#coupon_code').val();

        if(val.length < 1){
            jQuery('#coupon_code').val(makecoupon())
        }
        jQuery('.form-group.coupon i').click(function () {
            jQuery('#coupon_code').val(makecoupon());
        });
    </script>
    <style>
        .form-group label{
            width: 100%;
        }
        .form-group.coupon #coupon_code{
            width: 80%;
            float: left;
        }
        .form-group.coupon i{
            font-size: 24px;
            float: left;
            margin-left: 10px;
            line-height: 30px;
            cursor: pointer;
        }
    </style>
@endsection