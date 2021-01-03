@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('users.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="arrow-left"></span>
                    Back
                </a>
            </div>
        </div>

        <div class="content">
            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-7">
                        <div class="form-group mb-4">
                            <label for="title">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{ old('mobile', $user->mobile) }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Confirm Password</label>
                            <input type="password" name="password_confirm" class="form-control" placeholder="Password" value="{{ old('password_confirm') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Role</label>
                            <select class="form-control" name="role_id" required>
                                <option value="">Select role</option>
                                @foreach($roles as $id => $name)
                                    <option value="{{$id}}" @if(old('role_id', $user->role_id) == $id) selected @endif>{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="title">Profile picture</label>
                            <input type="file" name="banner" class="form-control form-control-file" value="{{ old('attachment') }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('head')

@endsection

@section('foot')

@endsection
