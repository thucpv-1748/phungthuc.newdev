@extends('layout.backend.admin')

@section('title', __('Order'))

@section('head')
    <link href="{{ URL::asset('css/backend/order.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="form-category">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="frm-category" name="frm-category" class="frm-category" method="post">
            <div class="form-group">
                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden="hidden">
                <input hidden="hidden" name="id" id="id" value="{{ isset($order['id']) ? $order['id'] : '' }}">
            </div>
            <div class="form-group coupon">
                <label for="name">{{ __('Status') }}:</label>
                <select class="form-control" name="status">
                    <option value="0" selected ="selected">{{ __('Pending') }}</option>
                    <option value="1" {{ isset($order['status']) ? $order['status'] == 1 ? 'selected ="selected"' : '' : '' }}>{{ __('Approve') }}</option>
                </select>
            </div>
            <div class="form-group coupon">
                <label for="name">{{ __('Coupon Code') }}:</label>
                <select class="form-control select-coupon" name="coupon_id">
                    <option value="" hidden="hidden">{{ __('Select') }}</option>
                    @if ($coupon)
                        @foreach ($coupon as $value)
                            <option value="{{ $value->id }}" {{ isset($order['coupon_id']) ? $order['coupon_id'] == $value->id ? 'selected ="selected"' : '' : '' }}>{{ $value->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group ">
                <label for="name">{{ __('Time Show') }}:</label>
                <select class="form-control select-time-show" name="time_show_id">
                    <option value="" hidden>{{ __('Select') }}</option>
                    @if ($timeShow)
                        @foreach ($timeShow as $value)
                            <option value="{{ $value->id }}" {{ isset($order['time_show_id']) ? $order['time_show_id'] == $value->id ? 'selected ="selected"' : '' : '' }}>{{ $value->film->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group coupon">
                <label for="name">{{ __('Fast Food') }}:</label>
                <select class="form-control fast_food_ids" name="fast_food_ids" multiple>
                    @if ($fastFood)
                        @foreach ($fastFood as $value)
                            <option value="{{ $value->id }}" {{ isset($order['fast_food_ids']) ? in_array($value->id, explode(',', $order['fast_food_ids'])) ? 'selected ="selected"' : '' : '' }} data-price="{{ $value->price }}">{{ $value->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="seats">
                <div class="seat">
                </div>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Total Price') }}:</label>
                <input type="text" class="form-control" name="total_price" id="total_price" value="{{ isset($order['total_price']) ? $order['total_price'] : '' }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Sale Price') }}:</label>
                <input type="text" class="form-control" name="sale_price" id="sale_price" value="{{ isset($order['sale_price']) ? $order['sale_price'] : '' }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Final Price') }}:</label>
                <input type="text" class="form-control" name="final_price" id="final_price" value="{{ isset($order['final_price']) ? $order['final_price'] : '' }}" readonly>
            </div>
            {{ csrf_field() }}
            <input hidden="hidden" name="base_url" value="{{ url('/') }}">
            <input hidden="hidden" name="datajson" value="" class="datajson">
            <input hidden="hidden" name="data_seat" value="{{ isset($order['seat']) ? $order['seat'] : '' }}" class="data_seat">
            <div class="modal-body">
                <div class="modal-footer" id="modal_footer">
                    <button type="submit" class="btn btn-default-border-blk" id="submit-btn">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ URL::asset('js/backend/order.js') }}"></script>
@endsection
