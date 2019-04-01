@extends('layout.backend.admin')

@section('title', __('Form category'))

@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post">
            <div class="form-group">
                <label for="name">{{ __('name') }}:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ isset($category['title']) ? $category['title'] : '' }}">
                <input hidden="hidden" name="id" value="{{ isset($category['id']) ? $category['id'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Description') }}:</label>
                <textarea type="text" class="form-control" name="description" rows="10">{{ isset($category['description']) ? $category['description'] : '' }}</textarea>
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
