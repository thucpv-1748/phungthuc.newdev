@extends('layout.backend.admin')

@section('title','List Film')
@section('content')
    <div class="form-store">
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
        <div class="header-page">
            <div class="add-store">
                <a href="{{url('admin/add-list-film')}}" > <span>Add Film</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>
                    List Film
                </h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>ID</td>
                    <td>Img</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Subtitle</td>
                    <td>Language</td>
                    <td>Time (M)</td>
                    <td>Status</td>
                    <td>Category</td>
                    <td>Fist Show</td>
                    <td>Director</td>
                    <td>Actor</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @if($listfilm)
                    @php($status = [1=>'Showing',2=>'Coming Soon',3=>'Not Show'])
                    @foreach($listfilm as $key => $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td> <img src="{{url($value->img)}}" width="50px"></td>
                            <td> {{$value->title}}</td>
                            <td> {{$value->description}}</td>
                            <td> {{$value->subtitle}}</td>
                            <td> {{$value->language}}</td>
                            <td> {{$value->time}}</td>
                            <td> {{@$status[$value->status]}}</td>
                            <td> {{$value->category->title}}</td>
                            <td> {{$value->fist_show}}</td>
                            <td> {{$value->director}}</td>
                            <td> {{$value->actor}}</td>
                            <td><a class="show-btn" href="{{url('admin/edit-list-film/'.$value->id)}}">Edit</a></td>
                            <td><a href="{{url('admin/delete-list-film/'.$value->id )}}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $listfilm->links() }}
        </div>

    </div>
@endsection