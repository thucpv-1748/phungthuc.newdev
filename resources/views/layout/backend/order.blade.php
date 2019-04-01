@extends('layout.backend.admin')

@section('title', __('List Coupon'))

@section('content')
    <div class="form-store">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
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
        <div class="header-page">
            <div class="add-store">
                <a href="{{ url('admin/add-order') }}"><span>{{ __('Add Order') }}</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>{{ __('List Order') }}</h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>{{ __('ID') }}</td>
                    <td>{{ __('User Name') }}</td>
                    <td>{{ __('Coupon Code') }}</td>
                    <td>{{ __('Time Show') }}</td>
                    <td>{{ __('Film') }}</td>
                    <td>{{ __('Fast Food') }}</td>
                    <td>{{ __('Status') }}</td>
                    <td>{{ __('Seat') }}</td>
                    <td>{{ __('Total Price') }}</td>
                    <td>{{ __('Sale Price') }}</td>
                    <td>{{ __('Final Price') }}</td>
                    <td>{{ __('Created_at') }}</td>
                    <td>{{ __('Updated_at') }}</td>
                    <td>{{ __('Edit') }}</td>
                    <td>{{ __('Delete') }}</td>
                </tr>
                @if ($order)
                    @foreach ($order as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->user->name }}</td>
                            <td>{{ isset($value->coupon) ? $value->coupon->name : '' }}</td>
                            <td>{{ $value->timeShow->time_show }}</td>
                            <td>{{ $value->timeShow->film->title }}</td>
                            <td>{{ $value->fast_food_ids }}</td>
                            <td>{{ config('status.'.$value->status) }}</td>
                            <td>{{ $value->seat }}</td>
                            <td>{{ $value->total_price }}</td>
                            <td>{{ $value->sale_price }}</td>
                            <td>{{ $value->final_price }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>{{ $value->updated_at }}</td>
                            <td><a class="show-btn" href="{{ url('admin/edit-order/' . $value->id) }}">{{ __('Edit') }}</a></td>
                            <td><a href="{{ url('admin/delete-order/' . $value->id) }}">{{ __('Delete') }}</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $order->links() }}
        </div>
    </div>
@endsection
