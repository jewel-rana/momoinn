@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('restaurants.create') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus"></span>
                    Add new room
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Sell price</th>
                    <th>Offer price</th>
                    <th><i data-feather="tool"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $k => $resturant)
                <tr>
                    <td>{{ $k + 1 }}</td>
                    <td>{{ $resturant->title }}</td>
                    <td>{{ $resturant->category->name }}</td>
                    <td>{{ $resturant->sell_price }}</td>
                    <td>{{ $resturant->offer_price }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('restaurants.edit', $resturant->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
                @if(!$restaurants->count())
                    <tr>
                        <td colspan="6"> Nothing found</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {!! $restaurants->links() !!}
        </div>
    </main>
@endsection

@section('head')

@endsection

@section('foot')

@endsection
