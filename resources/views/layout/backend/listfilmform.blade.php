@extends('layout.backend.admin')


@section('title','Form List Film')
@section('content')
    <div class="form-category">
        <form id="frm-category" name="frm-category" class="frm-category" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" name="title" value="{{isset($listfilm['title']) ? $listfilm['title'] : ''}}">
                <input hidden="hidden" name="id" value="{{isset($listfilm['id']) ? $listfilm['id'] : ''}}">
            </div>
            <div class="form-group">
                <label for="name">Language:</label>
                <input type="text" class="form-control" name="language" value="{{isset($listfilm['language']) ? $listfilm['language'] : ''}}">
            </div>
            <div class="form-group">
                <label for="name">SubTitle:</label>
                <input type="text" class="form-control" name="subtitle" value="{{isset($listfilm['subtitle']) ? $listfilm['subtitle'] : ''}}">
            </div>
            <div class="form-group">
                <label for="name">Status:</label>
                <select class="form-control" required="required" name="status" >
                    <option value="">Select</option>
                    <option value="1" {{(@$listfilm->status == 1)?'selected="selected"':''}}>Showing</option>
                    <option value="2" {{(@$listfilm->status == 2)?'selected="selected"':''}}>Coming Soon</option>
                    <option value="3" {{(@$listfilm->status == 3)?'selected="selected"':''}}>Not Show</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Image:</label>
                <input type="file" class="form-control" name="img" value="{{@$listfilm->img}}">
                @if(@$listfilm->img)
                <div class="img-thumbnail">
                    <img src="{{url($listfilm->img)}}">
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Time(minutes):</label>
                <input type="text" class="form-control" name="time" value="{{isset($listfilm['time']) ? $listfilm['time'] : ''}}">
            </div>
            <div class="form-group">
                <label for="name">Fist Show:</label>
                <input type="date" class="form-control" name="fist_show" value="{{isset($listfilm['fist_show']) ? $listfilm['fist_show'] : ''}}">
            </div>
            <div class="form-group">
                <label for="name">Film Director:</label>
                <input type="text" class="form-control" name="director" value="{{isset($listfilm['film_director']) ? $listfilm['film_director'] : ''}}">
            </div>
            <div class="form-group">
                <label for="name">Actor:</label>
                <input type="text" class="form-control" name="actor" value="{{isset($listfilm['actor']) ? $listfilm['actor'] : ''}}">
            </div>
            <div class="form-group">
                <label for="name">Category:</label>
                <select class="form-control" required="required" name="category_id" >
                    <option value="">Select</option>
                    @if($category)
                        @foreach($category as $value)
                            <option value="{{$value->id}}" {{(@$listfilm->category_id)?'selected="selected"':''}}>{{$value->title}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="name">Description:</label>
                <textarea type="text" class="form-control" name="description" rows="10">
                    {{isset($listfilm['description']) ? $listfilm['description'] : ''}}
                </textarea>
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