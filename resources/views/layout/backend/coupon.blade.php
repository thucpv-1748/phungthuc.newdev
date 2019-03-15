@extends('layout.backend.admin')

@section('title','List Coupon')
@section('content')
    <div class="form-store">
        @if(session()->has('success'))
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
                <a href="{{url('admin/add-coupon')}}" > <span>Add Coupon</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>
                    List Coupon
                </h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Coupon Code</td>
                    <td>Status</td>
                    <td>Type</td>
                    <td>Price</td>
                    <td>Percent (%)</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @if($coupon)
                    @php($status = [1 =>'Enable', 0 =>'Disable'])
                    @php($type = [1 =>'Price', 2 =>'Percent'])
                    @foreach($coupon as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td> {{$value->name}}</td>
                            <td> {{$value->coupon_code}}</td>
                            <td> {{@$status[$value->status]}}</td>
                            <td> {{@$type[$value->type]}}</td>
                            <td> {{$value->price}}</td>
                            <td> {{$value->percent}}</td>
                            <td><a class="show-btn" href="{{url('admin/edit-coupon/'.$value->id)}}">Edit</a></td>
                            <td><a href="{{url('admin/delete-coupon/'.$value->id )}}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $coupon->links() }}
        </div>

    </div>
@endsection