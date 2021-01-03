@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('menus.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="arrow-left"></span>
                    Back
                </a>
            </div>
        </div>

        <div class="content">
            <form method="POST" action="{{ route('menus.update', $menu->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-7">
                        <div class="form-group mb-4">
                            <label for="title">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $menu->name) }}" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Menu links</label>
                            <input type="text" name="slug" placeholder="Menu link" class="form-control" value="{{ old('slug', $menu->slug) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea type="text" name="description" rows="4" placeholder="Description" class="form-control">{{ old('description', $menu->description) }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group mb-4">
                            <label for="title">Parent menu</label>
                            <select type="text" name="parent_id" class="form-control">
                                <option value="">No parent</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Menu Class</label>
                            <input type="text" name="menu_class" class="form-control" value="{{ old('menu_class', $menu->menu_class) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Menu order</label>
                            <input type="number" name="menu_position" class="form-control form-control-file" value="{{ old('menu_position', $menu->menu_position) }}" required>
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
