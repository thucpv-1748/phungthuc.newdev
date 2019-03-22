@extends('layout.backend.admin')


@section('title','Form role')

@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ @$role['name'] }}" required>
                <input hidden="hidden" name="id" value="{{ @$role['id'] }}">
            </div>
            <div class="form-group">
                <label for="name">Description:</label>
                <textarea type="text" class="form-control" name="description" rows="10">{{ @$role['description'] }}</textarea>
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