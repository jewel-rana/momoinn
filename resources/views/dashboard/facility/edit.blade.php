@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('facilities.index', ['type' => $facility->type]) }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="arrow-left"></span>
                    Back
                </a>
            </div>
        </div>

        <div class="content">
            <form method="POST" action="{{ route('facilities.update', $facility->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="type" value="{{$facility->type}}">
                <div class="row">
                    <div class="col-7">
                        <div class="form-group mb-4">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title', $facility->title) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea type="text" name="description" rows="8" placeholder="Description" class="form-control">{{ old('description', $facility->description) }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="title">Thumbnail</label>
                            <input type="file" name="attachment" class="form-control form-control-file" value="{{ old('attachment') }}">
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
