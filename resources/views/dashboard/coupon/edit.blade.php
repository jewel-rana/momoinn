@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('coupons.index') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="arrow-left"></span>
                    Back
                </a>
            </div>
        </div>


        <div class="content">
            <form method="POST" action="{{ route('coupons.update', $coupon->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-7">
                        <div class="form-group mb-4">
                            <label for="title">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $coupon->name) }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Code</label>
                            <input type="text" name="code" class="form-control" placeholder="Coupon code" value="{{ old('code', $coupon->code) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea type="text" name="description" rows="5" placeholder="Description" class="form-control">{{ old('description', $coupon->description) }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group mb-4">
                            <label for="title">Amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="Discount amount" value="{{ old('amount', $coupon->amount) }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Start date</label>
                            <input type="text" name="start_date" class="form-control" placeholder="Start date" value="{{ old('start_date', date('d/m/Y', strtotime($coupon->offer_start))) }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">End date</label>
                            <input type="text" name="end_date" class="form-control" placeholder="End date" value="{{ old('end_date', date('d/m/Y', strtotime($coupon->offer_end))) }}">
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
