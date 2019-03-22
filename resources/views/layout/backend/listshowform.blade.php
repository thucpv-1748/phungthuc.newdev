@extends('layout.backend.admin')
@section('title','Form Time Show')
@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post" enctype="multipart/form-data">
            <input hidden="hidden" name="id" value="{{ @$timeshow['id'] }}">
            <div class="form-group">
                <label for="name">Status:</label>
                <select class="form-control" required="required" name="status" >
                    <option value="">Select</option>
                    <option value="1" {{ (@$timeshow->status == 1)?'selected="selected"':'' }}>Show</option>
                    <option value="2" {{ (@$timeshow->status == 3)?'selected="selected"':'' }}>Not Show</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Film:</label>
                <select class="form-control" required="required" name="film_id" >
                    <option value="">Select</option>
                    @if($listfilms)
                        @foreach($listfilms as $listfilm)
                        <option value="{{ $listfilm->id }}" {{ (@$timeshow->film_id == $listfilm->id)?'selected="selected"':'' }}>{{ $listfilm->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">Room:</label>
                <select class="form-control" required="required" name="room_id" >
                    <option value="">Select</option>
                    @if($rooms)
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}" {{ (@$timeshow->room_id == $room->id)?'selected="selected"':'' }}>{{ $room->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">Time Show:</label>
                <input type="datetime-local" class="form-control" name="time_show" value="{{ isset($timeshow['time_show']) ? strftime('%Y-%m-%dT%H:%M:%S', strtotime($timeshow['time_show'] )): ''}}">
            </div>
            <div class="form-group">
                <label for="name">Price Ticket:</label>
                <input type="number" class="form-control" name="price" value="{{ @$timeshow['price'] }}">
            </div>
            <div class="form-group">
                <label for="name">Sale Price:</label>
                <input type="number" class="form-control" name="sale_price" value="{{ @$timeshow['sale_price'] }}">
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