@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('roles.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="arrow-left"></span>
                    Back
                </a>
            </div>
        </div>

        <div class="content">
            <form method="POST" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-7">
                        <div class="form-group mb-4">
                            <label for="title">Name</label>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $role->name) }}">
                                <button type="submit" class="btn btn-success btn-lg">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach( $permissions as $key => $lists )
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 box-item"
                             id="permissionParent">

                            <div class="box-part">
                                <div class="title">
                                    <h4><input type="checkbox" class="checkedAll"
                                               id="{{ $key }}"> {{ ucfirst( $key ) }}</h4>
                                </div>
                                <div class="text">
                                    @foreach( $lists as $list )
                                        <div class="form-check">
                                            <label>
                                                <input type="checkbox" class="checkedItem {{ $key }}"
                                                       name="permissions[]" value="{{ $list->id }}"
                                                       @if( in_array($list->name, $rolePermissions) ) checked @endif>
                                                <span
                                                    class="label-text">{{ ucwords( str_replace('-', ' ', $list->name ) ) }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </main>
@endsection

@section('head')

@endsection

@section('foot')

@endsection
