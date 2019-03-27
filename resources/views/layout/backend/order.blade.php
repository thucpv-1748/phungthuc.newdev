@extends('layout.backend.admin')

@section('title', __('List Coupon'))

@section('content')
    <div class="form-store">
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
        <div class="header-page">
            <div class="add-store">
                <a href="{{url('admin/add-order')}}"><span>{{ __('Add Order') }}</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>
                    List Order
                </h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>ID</td>
                    <td>User Name</td>
                    <td>Coupon Code</td>
                    <td>Time Show</td>
                    <td>Film</td>
                    <td>Fast Food</td>
                    <td>Status</td>
                    <td>Seat</td>
                    <td>Total Price</td>
                    <td>Sale Price</td>
                    <td>Final price</td>
                    <td>Created_at</td>
                    <td>Updated_at</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @if($order)
                    @php($type = [1 =>'Price', 2 =>'Percent'])
                    @foreach($order as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ @$value->user->name }}</td>
                            <td>{{ @$value->coupon->name }}</td>
                            <td>{{ @$value->timeShow->time_show }}</td>
                            <td>{{ @$value->timeShow->film->title }}</td>
                            <td>{{ @$value->fast_food_ids }}</td>
                            <td>{{ config('status.'.$value->status) }}</td>
                            <td>{{ @$value->seat }}</td>
                            <td>{{ @$value->total_price }}</td>
                            <td>{{ @$value->sale_price }}</td>
                            <td>{{ @$value->final_price }}</td>
                            <td>{{ @$value->created_at }}</td>
                            <td>{{ @$value->updated_at }}</td>
                            <td><a class="show-btn" href="{{url('admin/edit-order/'.$value->id)}}">Edit</a></td>
                            <td><a href="{{url('admin/delete-order/'.$value->id )}}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $order->links() }}
        </div>

    </div>
@endsection