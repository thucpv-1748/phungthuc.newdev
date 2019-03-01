@extends('layout.backend.admin')


@section('title','List Store')
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
        <div class="header-page">
            <div class="add-store">
                <a href="{{url('admin/add-store')}}" > <span>Add Store</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>
                    List Store
                </h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @if($store)
                    @foreach($store as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td> {{$value->name}}</td>
                            <td> {{$value->description}}</td>
                            <td><a class="show-btn" href="{{url('admin/edit-store/'.$value->id)}}">Edit</a></td>
                            <td><a href="{{url('admin/delete-store/'.$value->id )}}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $store->links() }}
        </div>

    </div>
@endsection