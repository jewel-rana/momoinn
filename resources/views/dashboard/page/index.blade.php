@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('banners.create') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus"></span>
                    Add new banner
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th><i class="fa fa-image"></i></th>
                    <th>Title</th>
                    <th>Description</th>
                    <th><i class="fa fa-wrench fa-2x"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $key => $banner)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td><img src="{{ asset($banner->thumbnail) }}"></td>
                        <td>{{ $banner->title }}</td>
                        <td>{{ $banner->description }}</td>
                        <td>
                            <a href="{{ route('banners.edit', $banner->id) }}" style="float: left" class="mr-2 btn btn-secondary">Edit</a>
                            <form class="form-inline ml-2" method="POST" style="float: left;" action="{{ route('banners.destroy', $banner->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn form-inline btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if(!$banners->count())
                    <tr>
                        <td colspan="5">No banner added</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {!! $banners->links() !!}
        </div>
    </main>
@endsection

@section('head')

@endsection

@section('foot')

@endsection
