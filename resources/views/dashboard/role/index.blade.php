@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('roles.create') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus"></span>
                    Add new role
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard</th>
                    <th>Permissions</th>
                    <th><i class="fa fa-wrench fa-2x"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key => $role)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td style="font-size: 18px;">
                            @foreach($role->permissions as $permission)
                                <span class="badge bg-primary">{{$permission->name}}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" style="float: left" class="mr-2 btn btn-secondary">Edit</a>
                        </td>
                    </tr>
                @endforeach
                @if(!$roles->count())
                    <tr>
                        <td colspan="5">No roles found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </main>
@endsection

@section('head')

@endsection

@section('foot')

@endsection
