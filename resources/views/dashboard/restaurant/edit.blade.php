@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('restaurants.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="arrow-left"></span>
                    Back
                </a>
            </div>
        </div>

        <div class="content">
            <form method="POST" action="{{ route('restaurants.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-7">
                        <div class="form-group mb-4">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Room Type</label>
                            <select name="room_type_id" class="form-control">
                                <option value="">Choose</option>
                                @foreach($room_type_dropdowns as $key => $type)
                                <option value="{{$key}}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea type="text" name="description" rows="8" placeholder="Description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label>Floor No.</label>
                            <input type="number" name="floor_no" class="form-control" value="{{old('floor_no', 1)}}">
                        </div>
                        <div class="form-group">
                            <label>Room No.</label>
                            <input type="number" name="room_no" class="form-control" value="{{old('room_no', 1)}}">
                        </div>
                        <div class="form-group">
                            <label>Sell Price</label>
                            <input type="number" name="sell_price" class="form-control" value="{{old('sell_price')}}">
                        </div>
                        <div class="form-group">
                            <label>Offer Price</label>
                            <input type="number" name="offer_price" class="form-control" value="{{old('offer_price')}}">
                        </div>
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
