@extends('layout.backend.admin')
@section('title','User')
@section('content')
    <div class="header-page">
        <div class="add-user">
           <a href="{{url('/adduser/')}}"> <span>Add User</span></a>
            <button type="submit"  class="donate_now btn btn-default-border-blk generalDonation" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#myModalHorizontal">Add User</button>
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
            <td>Level</td>
            <td>Phone</td>
            <td>Created At</td>
            <td>Updated At</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
         @if(count($users)>0)
        @foreach($users as $key => $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>
                    {{$user->email}}
                </td>
                <td> {{$user->name}}</td>
                <td> {{$user->level == 1 ? 'Admin' : 'Customer'}}</td>
                <td> {{$user->phone}}</td>
                <td> {{$user->created_at}}</td>
                <td> {{$user->updated_at}}</td>
                <td><a class="show-btn" href="#" data-id="{{$user->id}}">Edit</a></td>
                <td><a>Delete</a></td>
            </tr>
        @endforeach
        @endif
        </table>
    </div>
    @extends('layout.backend.adduser')
@endsection


<style>
    .header-page .add-user{
        padding: 16px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        cursor: pointer;
        background-color: white;
        color: black;
        border: 2px solid #555555;
        float: right;
        margin-right: 50px;

    }
    .header-page .add-user a{
        color: black;
        text-decoration: unset;
    }
    .header-page .add-user:hover{
        background-color: #555555;
        color: white;
    }
    .header-page .add-user:hover a{
        color: white;
    }
    .users-list tbody{
        text-align: center;
    }

    .users-list{
        margin-top: 50px;
    }

</style>

