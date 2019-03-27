@extends('layout.backend.admin')

@section('title', __('Form List Film'))

@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">{{ __('Title') }}:</label>
                <input type="text" class="form-control" name="title" value="{{ isset($listfilm['title']) ? $listfilm['title'] : '' }}">
                <input hidden="hidden" name="id" value="{{ isset($listfilm['id']) ? $listfilm['id'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Language') }}:</label>
                <input type="text" class="form-control" name="language" value="{{ isset($listfilm['language']) ? $listfilm['language'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('SubTitle') }}:</label>
                <input type="text" class="form-control" name="subtitle" value="{{ isset($listfilm['subtitle']) ? $listfilm['subtitle'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Status') }}:</label>
                <select class="form-control" required="required" name="status">
                    <option value="" hidden>{{ __('Select') }}</option>
                    @if (Config('Film'))
                        @foreach (Config('Film') as $key => $value)
                        <option value="{{ $key }}" {{ isset($listfilm) ? ($listfilm->status == $key) ? 'selected="selected"' : '' : '' }}>{{ $value }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Image') }}:</label>
                <input type="file" class="form-control" name="img" value="{{ isset($listfilm->img) ? $listfilm->img : '' }}">
                @if (isset($listfilm->img))
                    <div class="img-thumbnail">
                        <img src="{{ url($listfilm->img) }}">
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">{{ __('Time(minutes)') }}:</label>
                <input type="text" class="form-control" name="time" value="{{ isset($listfilm['time']) ? $listfilm['time'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Fist Show') }}:</label>
                <input type="date" class="form-control" name="fist_show" value="{{ isset($listfilm['fist_show']) ? $listfilm['fist_show'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Film Director') }}:</label>
                <input type="text" class="form-control" name="director" value="{{ isset($listfilm['director']) ? $listfilm['director'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Actor') }}:</label>
                <input type="text" class="form-control" name="actor" value="{{ isset($listfilm['actor']) ? $listfilm['actor'] : '' }}">
            </div>
            <div class="form-group">
                <label for="name">{{ __('Category') }}:</label>
                <select class="form-control" required="required" name="category_id">
                    <option value="" hidden>{{ __('Select') }}</option>
                    @if ($category)
                        @foreach ($category as $value)
                            <option value="{{ $value->id }}" {{ isset($listfilm) ? ($listfilm->category_id == $value->id) ? 'selected="selected"' : '' : '' }}>{{ $value->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Description') }}:</label>
                <textarea type="text" class="form-control" name="description" rows="10">{{ isset($listfilm['description']) ? $listfilm['description'] : '' }}</textarea>
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
