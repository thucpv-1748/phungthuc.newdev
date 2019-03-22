@extends('layout.backend.admin')

@section('title','List Roles')
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
                <a href="{{url('admin/add-role')}}" > <span>Add Role</span></a>
            </div>
        </div>

        <div class="store-list">
            <div>
                <h2>
                    List Roles
                </h2>
            </div>
            <table border="1px" class="table table-striped">
                <tr id="tbl-first-row">
                    <td>ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @if($role)
                    @foreach($role as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td> {{ $value->name }}</td>
                            <td> {{ $value->description }}</td>
                            <td><a class="show-btn" href="{{ url('admin/edit-role/'.$value->id) }}">Edit</a></td>
                            <td><a href="{{ url('admin/delete-role/'.$value->id ) }}">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {{ $role->links() }}
        </div>

    </div>
@endsection