@extends('layout.backend.admin')

@section('title','User')

@section('head')
    <link href="{{ URL::asset('css/backend/user.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
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
        <div class="add-user" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#myModalHorizontal">
           <a href="#" > <span>Add User</span></a>
        </div>
    </div>

    <div class="users-list">
        <div>
           <h2>
               List Users
           </h2>
        </div>
        <table border="1px" class="table table-striped">
             <tr id="tbl-first-row">
                <td>STT</td>
                <td>Email</td>
                <td>Name</td>
                <td>Roles</td>
                <td>Phone</td>
                <td>Created At</td>
                <td>Updated At</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
             @if(count($users)>0)
                @foreach($users as $key => $user)
                     <tr>
                        <td> {{ @$user->id }}</td>
                        <td> {{ @$user->email }}</td>
                        <td> {{ @$user->name }}</td>
                        <td> {{ @$user->role->name }}</td>
                        <td> {{ @$user->phone }}</td>
                        <td> {{ @$user->created_at }}</td>
                        <td> {{ @$user->updated_at }}</td>
                        <td><a class="show-btn" href="#" data-id="{{ $user->id }}">Edit</a></td>
                        <td><a href="{{ url('admin/delete-user/'.$user->id) }}">Delete</a></td>
                    </tr>
                @endforeach
             @endif
        </table>
    </div>
@endsection
