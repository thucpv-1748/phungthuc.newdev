@extends('layout.backend.admin')

@section('title','Form Room')
@section('content')
    <div class="form-room">

        <form id="frm-room" name="frm-room" class="frm-room" method="post">
            <input hidden="hidden" name="id" value="{{isset($store['id']) ? $store['id'] : ''}}">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{isset($store['name']) ? $store['name'] : ''}}" required="required">
            </div>
            <div class="form-group">
                <label for="name">Store:</label>
                <select class="form-control" required="required" name="id_store">
                    <option value="">Select</option>
                    @if($store)
                        @foreach($store as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="row-form">
                <div class="form-group">
                    <label for="name">Seats in row 1:</label>
                    <input type="text" class="form-control" name="row[]" value="" required="required">
                </div>
            </div>
            <button class="add_field_button btn" href="#">Add More Row</button>
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