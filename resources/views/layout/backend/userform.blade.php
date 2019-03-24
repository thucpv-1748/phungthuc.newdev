@extends('layout.backend.admin')

@section('title','Form user')

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
    <div class="form-store">
        <form id="frm-user" name="frm-user" method="post" class="frm-user">
            <div class="form-group">
                <label for="name">{{ __('Name') }}:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}" required>
                <input hidden="hidden" name="id" value="{{ isset($user) ? $user->id : ''}}">
            </div>
            <div class="form-group">
                <label for="email">{{ __('Email') }}:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : ''}}" required>
            </div>
            <div class="form-group">
                <label for="pwd">{{ __('Password') }}:</label>
                <input type="password" class="form-control" id="pwd" name="password" value="" required>
            </div>
            <div class="form-group">
                <label for="level">{{ __('Role') }}:</label>
                <select class="form-control" name="role" required>
                    <option value="" selected="selected" >{{ __('Select') }}</option>
                    @if($role)
                        @foreach($role as $value)
                            <option value="{{ $value->id }}" {{ ( isset($user) ? $user->roles->first()->id : '' == $value->id) ? 'selected="selected"' :'' }}>{{ $value->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="birth_of_date">{{ __('Birth of date') }}:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ isset($user) ? $user->date_of_birth : '' }}">
            </div>
            <div class="form-group">
                <label for="phone">{{ __('Phone') }}:</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ isset($user) ? $user->phone : '' }}">
            </div>
            {{ csrf_field() }}
            <input hidden="hidden" name="base_url" value="{{ url('/') }}">
            <div class="modal-body">
                <div class="modal-footer" id="modal_footer">
                    <button type="submit" class="btn btn-default-border-blk" id="submit-btn">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
