@extends('layout.backend.admin')

@section('title', __('Form Time Show'))

@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post" enctype="multipart/form-data">
            <input hidden="hidden" name="id" value="{{ isset($timeshow['id']) ? $timeshow['id'] : '' }}">
            <div class="form-group">
                <label for="name">{{ __('Status') }}:</label>
                <select class="form-control" required="required" name="status">
                    <option value="" hidden>{{ __('Select') }}</option>
                    @if (config('status'))
                        @foreach (config('status') as $key => $value)
                            <option value="{{ $key }}" {{ isset($timeshow['status']) ? $timeshow['status'] == $key ? 'selected ="selected"' : '' : '' }}>{{ $value }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Film') }}:</label>
                <select class="form-control" required="required" name="film_id" >
                    <option value="" hidden>{{ __('Select') }}</option>
                    @if ($listfilms)
                        @foreach($listfilms as $listfilm)
                           <option value="{{ $listfilm->id }}" {{ isset($timeshow['film_id']) ? ($timeshow['film_id'] == $listfilm->id) ? 'selected="selected"' : '' : '' }}>{{ $listfilm->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Room') }}:</label>
                <select class="form-control" required="required" name="room_id" >
                    <option value="" hidden>{{ __('Select') }}</option>
                    @if($rooms)
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ isset($timeshow->room_id) ? ($timeshow->room_id == $room->id) ? 'selected="selected"' : '' : '' }}>{{ $room->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Time Show') }}:</label>
                <input type="datetime-local" class="form-control" name="time_show" value="{{ isset($timeshow['time_show']) ? strftime('%Y-%m-%dT%H:%M:%S', strtotime($timeshow['time_show'] )) : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Price Ticket') }}:</label>
                <input type="number" class="form-control" name="price" value="{{ isset($timeshow['price']) ? $timeshow['price'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Sale Price') }}:</label>
                <input type="number" class="form-control" name="sale_price" value="{{ isset($timeshow['sale_price']) ? $timeshow['sale_price'] : '' }}">
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
