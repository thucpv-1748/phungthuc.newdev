@extends('layout.backend.admin')

@section('title', __('List Fast Food'))

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
                <a href="{{ url('admin/add-fast-food') }}"><span>{{ __('Add Fast Food') }}</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>{{ __('List Fast Food') }}</h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>{{ __('ID') }}</td>
                    <td>{{ __('Name') }}</td>
                    <td>{{ __('Description') }}</td>
                    <td>{{ __('Price') }}</td>
                    <td>{{ __('Edit') }}</td>
                    <td>{{ __('Delete') }}</td>
                </tr>
                @if ($fast_food)
                    @foreach ($fast_food as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->price }}</td>
                            <td><a class="show-btn" href="{{ url('admin/edit-fast-food/' . $value->id) }}">{{ __('Edit') }}</a></td>
                            <td><a href="{{ url('admin/delete-fast-food/' . $value->id) }}">{{ __('Delete') }}</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $fast_food->links() }}
        </div>
    </div>
@endsection
