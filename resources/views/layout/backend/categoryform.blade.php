@extends('layout.backend.admin')


@section('title','Form category')
@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name_category" value="{{isset($category['name_category']) ? $category['name_category'] : ''}}">
                <input hidden="hidden" name="id_category" value="{{isset($category['id']) ? $category['id'] : ''}}">
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