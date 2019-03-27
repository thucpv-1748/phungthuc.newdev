@extends('layout.backend.admin')

@section('title', __('Form Coupon'))

@section('head')
    <link href="{{ URL::asset('css/backend/coupon.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="form-category form-coupon">
        <form id="frm-category" name="frm-category" class="frm-category" method="post">
            <div class="form-group">
                <label for="name">{{ __('Name') }}:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($coupon['name']) ? $coupon['name'] : '' }}">
                <input hidden="hidden" name="id" value="{{ isset($coupon['id']) ? $coupon['id'] : '' }}">
            </div>
            <div class="form-group coupon">
                <label for="name">{{ __('Coupon Code') }}:</label>
                <input type="text" class="form-control" name="coupon_code" id="coupon_code" value="{{ isset($coupon['coupon_code']) ? $coupon['coupon_code'] : '' }}" required>
                <i class="fa">&#xf021;</i>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Status') }}:</label>
                <select class="form-control" required="required" name="status">
                    <option value="" hidden>{{ __('Select') }}</option>
                    @if (config('status'))
                        @foreach (config('status') as $key => $value)
                            <option value="{{ $key }}" {{ isset($coupon['status']) ? $coupon['status'] == $key ? 'selected ="selected"' : '' : '' }}>{{ $value }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Type') }}:</label>
                <select class="form-control" required="required" name="type">
                    <option value="" hidden>{{ __('Select') }}</option>
                    @if (config('setting.coupon'))
                        @foreach (config('setting.coupon') as $key => $value)
                            <option value="{{ $key }}" {{ isset($coupon['type']) ? $coupon['type'] == $key ? 'selected ="selected"' : '' : '' }}>{{ $value }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Price') }}:</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ isset($coupon['price']) ? $coupon['price'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Percent') }}:</label>
                <input type="number" class="form-control" name="percent" id="percent" value="{{ isset($coupon['percent']) ? $coupon['percent'] : '' }}">
            </div>
            {{ csrf_field() }}
            <input hidden="hidden" name="base_url" value="{{ url('/') }}">
            <div class="modal-body">
                <div class="modal-footer" id="modal_footer">
                    <button type="submit" class="btn btn-default-border-blk" id="submit-btn">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function makecoupon()
        {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

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
    </script>
@endsection
