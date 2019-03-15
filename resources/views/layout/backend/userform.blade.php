@extends('layout.backend.admin')

@section('title','Form user')

@section('content')
    <div class="form-store">
        <form id="frm-user" name="frm-user" method="post" class="frm-user">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ @$user->name }}" required>
                <input hidden="hidden" name="id" value="{{ @$user->id }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ @$user->email }}" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password" value="{{ @$user->password }}" required>
            </div>
            <div class="form-group">
                <label for="level">Role:</label>
                <select class="form-control" name="role" required>
                    <option value="" selected="selected" >Select</option>
                    @if($role)
                        @foreach($role as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="birth_of_date">Birth of date:</label>
                <input type="date" class="form-control" id="birth_of_date" name="birth_of_date">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" id="phone" name="phone">
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
