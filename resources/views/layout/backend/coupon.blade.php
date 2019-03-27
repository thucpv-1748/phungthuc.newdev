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
                <a href="{{ url('admin/add-coupon') }}"><span>{{ __('Add Coupon') }}</span></a>
            </div>
        </div>
        <div class="store-list">
            <div>
                <h2>{{ __('List Coupon') }}</h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>{{ __('ID') }}</td>
                    <td>{{ __('Name') }}</td>
                    <td>{{ __('Coupon Code') }}</td>
                    <td>{{ __('Status') }}</td>
                    <td>{{ __('Type') }}</td>
                    <td>{{ __('Price') }}</td>
                    <td>{{ __('Percent (%)') }}</td>
                    <td>{{ __('Edit') }}</td>
                    <td>{{ __('Delete') }}</td>
                </tr>
                @if ($coupon)
                    @foreach ($coupon as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->coupon_code }}</td>
                            <td>{{ Config('status.' . $value->status) }}</td>
                            <td>{{ Config('setting.coupon.' . $value->type) }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->percent }}</td>
                            <td><a class="show-btn" href="{{ url('admin/edit-coupon/' . $value->id) }}">{{ __('Edit') }}</a></td>
                            <td><a href="{{ url('admin/delete-coupon/' . $value->id) }}">{{ __('Delete') }}</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $coupon->links() }}
        </div>
    </div>
@endsection
