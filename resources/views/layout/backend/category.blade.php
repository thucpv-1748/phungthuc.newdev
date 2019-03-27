@extends('layout.backend.admin')

@section('title', __('List Category'))
@section('content')
<div class="form-category ">
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
    <div class="header-page">
        <div class="add-category">
            <a href="{{ url('admin/form-category') }}"><span>{{ __('Add Category') }}</span></a>
        </div>
    </div>
    <div class="category-list">
        <div>
            <h2>{{ __('List Category') }}</h2>
        </div>
        <table border="1px" class="table table-striped">
            <tr id="tbl-first-row">
                <td>{{ __('ID') }}</td>
                <td>{{ __('Name') }}</td>
                <td>{{ __('Description') }}</td>
                <td>{{ __('Created At') }}</td>
                <td>{{ __('Updated At') }}</td>
                <td>{{ __('Edit') }}</td>
                <td>{{ __('Delete') }}</td>
            </tr>
            @if ($category)
                @foreach ($category as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>{{ $value->updated_at }}</td>
                        <td><a class="show-btn" href="{{ url('admin/edit-category/' . $value->id) }}">{{ __('Edit') }}</a></td>
                        <td><a href="{{ url('admin/delete-category/' . $value->id ) }}">{{ __('Delete') }}</a></td>
                    </tr>
                @endforeach
            @endif
        </table>
        {{ $category->links() }}
    </div>

</div>
@endsection
