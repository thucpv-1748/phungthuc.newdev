@extends('layout.backend.admin')

@section('title','Profile')

@section('content')
    <div class="profile-admin">
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
        <h3>Profile</h3>
        <form id="frm-profile" name="frm-profile" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                <input hidden="hidden" name="id_user" value="{{$user->id}}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required="required">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password" value="{{$user->password}}" required="required">
            </div>
            <div class="form-group">
                <label for="level">Level:</label>
                <select class="form-control" name="level">
                    <option value="1" {{$user->level != 2 ? 'selected="selected"':'' }} >Admin</option>
                    <option value="2" {{$user->level == 2 ? 'selected="selected"':'' }}>Customer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birth_of_date">Birth of date:</label>
                <input type="date" class="form-control" id="birth_of_date" name="birth_of_date" value="{{date('Y-m-d',strtotime($user->birth_of_date))}}">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
            </div>
            {{csrf_field()}}
            <input hidden="hidden" name="base_url" value="{{url('/')}}">
            <div class="modal-body">
                <div class="modal-footer" id="modal_footer">
                    <button type="submit" class="btn btn-default-border-blk" id="submit-btn">Save</button>
                </div>
            </div>
        </form>


    </div>
@endsection