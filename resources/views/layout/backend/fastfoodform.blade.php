@extends('layout.backend.admin')

@section('title', __('Form Fast Food'))

@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post">
            <div class="form-group">
                <label for="name">{{ __('Name') }}:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ isset($fastfood['name']) ? $fastfood['name'] : '' }}">
                <input hidden="hidden" name="id" value="{{ isset($fastfood['id']) ? $fastfood['id'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Description') }}:</label>
                <textarea type="text" class="form-control" name="description" rows="10">{{ isset($fastfood['description']) ? $fastfood['description'] : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Price') }}:</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ isset($fastfood['price']) ? $fastfood['price'] : '' }}" required>
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
