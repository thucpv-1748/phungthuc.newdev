@extends('layout.backend.admin')

@section('title', __('Form Store'))

@section('content')
    <div class="form-store">
        <form id="frm-store" name="frm-store" class="frm-store" method="post">
            <div class="form-group">
                <label for="name">{{ __('Name') }}:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($store['name']) ? $store['name'] : '' }}">
                <input hidden="hidden" name="id" value="{{ isset($store['id']) ? $store['id'] : ''}} ">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Description') }}:</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ isset($store['description']) ? $store['description'] : '' }}">
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
