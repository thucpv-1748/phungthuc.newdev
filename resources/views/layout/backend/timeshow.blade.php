@extends('layout.backend.admin')

@section('title','Time Show')
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
                <a href="{{url('admin/add-time-show')}}" > <span>Add Time Show</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>
                    Time Show
                </h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>ID</td>
                    <td>Img</td>
                    <td>Film</td>
                    <td>Room</td>
                    <td>Status</td>
                    <td>Time show</td>
                    <td>Sale price</td>
                    <td>Price</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @if($time_show)
                    @php($status = [1=>'Show',2 =>'Not Show'])
                    @foreach($time_show as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td> <img src="{{url($value->film->img)}}" width="50px"></td>
                            <td> {{$value->film->title}}</td>
                            <td> {{$value->room->name}}</td>
                            <td> {{@$status[$value->status]}}</td>
                            <td> {{strftime('%Y-%m-%dT%H:%M:%S', strtotime($value->time_show))}}</td>
                            <td> {{$value->sale_price}}</td>
                            <td> {{$value->price}}</td>
                            <td><a class="show-btn" href="{{url('admin/edit-time-show/'.$value->id)}}">Edit</a></td>
                            <td><a href="{{url('admin/delete-time-show/'.$value->id )}}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $time_show->links() }}
        </div>

    </div>
@endsection