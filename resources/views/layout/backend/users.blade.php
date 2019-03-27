@extends('layout.backend.admin')

@section('title', __('User'))

@section('head')
    <link href="{{ URL::asset('css/backend/user.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
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
        <div class="add-user">
           <a href="{{ url('admin/add-user') }}"><span>{{ __('Add User') }}</span></a>
        </div>
    </div>

    <div class="users-list">
        <div>
           <h2>{{ __('List Users') }}</h2>
        </div>
        <table border="1px" class="table table-striped">
             <tr id="tbl-first-row">
                <td>{{ __('ID') }}</td>
                <td>{{ __('Email') }}</td>
                <td>{{ __('Name') }}</td>
                <td>{{ __('Roles') }}</td>
                <td>{{ __('Phone') }}</td>
                <td>{{ __('Created At') }}</td>
                <td>{{ __('Updated At') }}</td>
                <td>{{ __('Edit') }}</td>
                <td>{{ __('Delete') }}</td>
            </tr>
             @if (count($users) > 0 )
                @foreach ($users as $key => $user)
                     <tr>
                        <td> {{ $user->id }}</td>
                        <td> {{ $user->email }}</td>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->roles->first()->name }}</td>
                        <td> {{ $user->phone }}</td>
                        <td> {{ $user->created_at }}</td>
                        <td> {{ $user->updated_at }}</td>
                        <td><a href="{{ url('admin/edit-user/' . $user->id) }}">{{ __('Edit') }}</a></td>
                        <td><a href="{{ url('admin/delete-user/' . $user->id) }}">{{ __('Delete') }}</a></td>
                    </tr>
                @endforeach
             @endif
        </table>
    </div>
@endsection
