@extends('layout.backend.admin')

@section('title', __('Form Room'))

@section('head')
    <link href="{{ URL::asset('css/backend/room.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="form-room">
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
        <form id="frm-room" name="frm-room" class="frm-room" method="post">
            <input hidden="hidden" name="id" value="{{ isset($room) ? $room->id : '' }}">
            <div class="form-group">
                <label for="name">{{ __('Name') }}:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($room) ? $room->name : '' }}" required="required">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Store') }}:</label>
                <select class="form-control" required="required" name="store_id">
                    <option value="">{{ __('Select') }}</option>
                    @if ($store)
                        @foreach ($store as $value)
                            <option value="{{ $value->id }}" {{ isset($room) ? ($room->store_id == $value->id) ?  'selected="selected"' : '' : '' }}>{{ $value->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="row-form">
            @if (count($seat) < 1)
                <div class="form-group">
                    <label for="name">{{ __('Seats in row') }} 1:</label>
                    <input type="number" class="form-control" name="row[]" value="" required="required">
                </div>
            @else
                @php($x = 1)
                @foreach($seat as $key => $data)
                        <div class="form-group">
                            <label for="name">{{ __('Seats in row') . $x }}:</label>
                            <input type="number" class="form-control" name="row[]" value="{{ $data['col'] }}" required="required">
                            @if ($x > 1)
                                <a href="#" class="remove_field"><i class="fa fa-minus"></i></a>
                            @endif
                        </div>
                    @php($x++)
                @endforeach
            @endif
            </div>
            <button class="add_field_button btn" href="#">{{ __('Add More Row') }}</button>
            {{ csrf_field() }}
            <input hidden="hidden" name="base_url" value="{{ url('/') }}">
            <div class="modal-body">
                <div class="modal-footer" id="modal_footer">
                    <button type="submit" class="btn btn-default-border-blk" id="submit-btn">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
        <div class="seat">
            @if (count($seat) > 0)
                <h2>{{ __('Screen') }}</h2>
               @foreach ($seat as $value)
                   <ul>
                       <p>{{ Config('nameRow.' . $value['row']) }}</p>
                       @for ($x = 0; $x < $value['col']; $x++)
                           <li>{{ $x + 1 }}</li>
                       @endfor
                   </ul>
                @endforeach
            @endif
        </div>
    </div>
@endsection
