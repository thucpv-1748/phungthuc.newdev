@extends('layout.backend.admin')

@section('title', __('List Film'))

@section('content')
    <div class="form-store">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
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
                <a href="{{ url('admin/add-list-film') }}"><span>{{ __('Add Film') }}</span></a>
            </div>
        </div>
        <div class="store-list">
            <div>
                <h2>{{ __('List Film') }}</h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>{{ __('ID') }}</td>
                    <td>{{ __('Img') }}</td>
                    <td>{{ __('Title') }}</td>
                    <td>{{ __('Description') }}</td>
                    <td>{{ __('Subtitle') }}</td>
                    <td>{{ __('Language') }}</td>
                    <td>{{ __('Time (M)') }}</td>
                    <td>{{ __('Status') }}</td>
                    <td>{{ __('Category') }}</td>
                    <td>{{ __('Fist Show') }}</td>
                    <td>{{ __('Director') }}</td>
                    <td>{{ __('Actor') }}</td>
                    <td>{{ __('Edit') }}</td>
                    <td>{{ __('Delete') }}</td>
                </tr>
                @if ($listfilm)
                    @foreach ($listfilm as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td><img src="{{ isset($value->img) ? url($value->img) : '' }}" width="50px"></td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->subtitle }}</td>
                            <td>{{ $value->language }}</td>
                            <td>{{ $value->time}}</td>
                            <td>{{ Config('Film.' . $value->status) }}</td>
                            <td>{{ $value->category->title }}</td>
                            <td>{{ $value->fist_show }}</td>
                            <td>{{ $value->director }}</td>
                            <td>{{ $value->actor }}</td>
                            <td><a class="show-btn" href="{{ url('admin/edit-list-film/' . $value->id) }}">{{ __('Edit') }}</a></td>
                            <td><a href="{{ url('admin/delete-list-film/' . $value->id) }}">{{ __('Delete') }}</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $listfilm->links() }}
        </div>
    </div>
@endsection
