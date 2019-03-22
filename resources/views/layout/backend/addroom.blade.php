@extends('layout.backend.admin')

@section('title','Form Room')
@section('content')
    <div class="form-room">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form id="frm-room" name="frm-room" class="frm-room" method="post">
            <input hidden="hidden" name="id" value="{{@$room->id}}">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{@$room->name}}" required="required">
            </div>
            <div class="form-group">
                <label for="name">Store:</label>
                <select class="form-control" required="required" name="id_store" >
                    <option value="">Select</option>
                    @if($store)
                        @foreach($store as $value)
                            <option value="{{$value->id}}" {{(@$room->store_id)?'selected="selected"':''}}>{{$value->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="row-form">
            @if(count($seat) < 1)
                <div class="form-group">
                    <label for="name">Seats in row 1:</label>
                    <input type="number" class="form-control" name="row[]" value="" required="required">
                </div>
            @else
                @php($x = 1)
                @foreach($seat as $key => $data)
                        <div class="form-group">
                            <label for="name">Seats in row {{$x}}:</label>
                            <input type="number" class="form-control" name="row[]" value="{{@$data['col']}}" required="required">
                            @if($x > 1)
                            <a href="#" class="remove_field"><i class="fa fa-minus"></i></a>
                            @endif
                        </div>
                    @php($x++)
                @endforeach
            @endif
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

        <div class="seat">
            @if(count($seat) > 0)
                <h2>Demo</h2>
               @foreach($seat as $value)
                   <ul>
                       <p>{{ $namerow[$value['row']] }}</p>
                       @for($x = 0;$x < $value['col'];$x++)
                           <li>
                                {{$x+1}}
                           </li>
                       @endfor
                   </ul>
                @endforeach
            @endif
        </div>
    </div>
@endsection
<style>
    .seat li {
        margin: 5px;
        background: gray;
        width: 20px;
        height: 20px;
        color: white;
    }
    .seat ul{
        display: inline-flex;
        list-style: none;
        margin: 0 auto;
        text-align: center;
        width: 100%;
    }
    .seat{
        position: absolute;
        left: 50%;
        transform: translatex(-50%);
        padding-bottom: 100px;
    }
    .seat ul p{
        margin-right: 50px;
        padding-top: 5px;
    }
    .seat h2{
        text-align: center;
    }
</style>