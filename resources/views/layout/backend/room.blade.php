@extends('layout.backend.admin')

@section('title','List Room')
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
                <a href="{{url('admin/add-room')}}" > <span>Add Room</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>
                    List Room
                </h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Store</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @if($room)
                    @foreach($room as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td> {{$value->name}}</td>
                            <td> {{$value->store->name}}</td>
                            <td><a class="show-btn" href="{{url('admin/edit-room/'.$value->id)}}">Edit</a></td>
                            <td><a href="{{url('admin/delete-room/'.$value->id )}}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $room->links() }}
        </div>

    </div>
@endsection