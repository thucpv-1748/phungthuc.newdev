@extends('layout.backend.admin')

@section('title', __('List Store'))

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
        <div class="header-page">
            <div class="add-store">
                <a href="{{ url('admin/add-store') }}"><span>{{ __('Add Store') }}</span></a>
            </div>
        </div>
        <div class="store-list">
            <div>
                <h2>{{ __('List Store') }}</h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>{{ __('ID') }}</td>
                    <td>{{ __('Name') }}</td>
                    <td>{{ __('Description') }}</td>
                    <td>{{ __('Edit') }}</td>
                    <td>{{ __('Delete') }}</td>
                </tr>
                @if ($store)
                    @foreach ($store as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->description }}</td>
                            <td><a class="show-btn" href="{{ url('admin/edit-store/' . $value->id) }}">{{ __('Edit') }}</a></td>
                            <td><a href="{{ url('admin/delete-store/' . $value->id ) }}">{{ __('Delete') }}</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $store->links() }}
        </div>
    </div>
@endsection
