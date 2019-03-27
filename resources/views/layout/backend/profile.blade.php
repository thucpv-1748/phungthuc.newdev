@extends('layout.backend.admin')

@section('title', __('Profile'))

@section('content')
    <div class="profile-admin">
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
        <h3>{{ __('Profile') }}</h3>
        <form id="frm-profile" name="frm-profile" method="post">
            <div class="form-group">
                <label for="name">{{ __('Name') }}:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}" required>
                <input hidden="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">
            </div>
            <div class="form-group">
                <label for="email">{{ __('Email') }}:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}" required="required">
            </div>
            <div class="form-group">
                <label for="pwd">{{ __('Password') }}:</label>
                <input type="password" class="form-control" id="pwd" name="password" value="{{ isset($user) ? $user->password : '' }}" required="required">
            </div>
            <div class="form-group">
                <label for="level">{{ __('Role') }}:</label>
                <select class="form-control" name="role" required>
                    <option value="" selected="selected">{{ __('Select') }}</option>
                    @if($role)
                        @foreach($role as $value)
                            <option value="{{ $value->id }}" {{ ( (isset($user)) ? ($user->roles->first()->id == $value->id) ? 'selected="selected"' : '' : '' ) }}>{{ $value->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="birth_of_date">{{ __('Date of Birth') }}:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ isset($user) ? date('Y-m-d', strtotime($user->date_of_birth)) : '' }}">
            </div>
            <div class="form-group">
                <label for="phone">{{ __('Phone') }}:</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ isset($user) ? $user->phone : '' }}">
            </div>
            {{ csrf_field() }}
            <input hidden="hidden" name="base_url" value="{{url('/')}}">
            <div class="modal-body">
                <div class="modal-footer" id="modal_footer">
                    <button type="submit" class="btn btn-default-border-blk" id="submit-btn">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
