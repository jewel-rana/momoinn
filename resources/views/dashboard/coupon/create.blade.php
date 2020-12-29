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
            <form method="POST" action="{{ route('coupons.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-7">
                        <div class="form-group mb-4">
                            <label for="title">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Code</label>
                            <input type="text" name="code" class="form-control" placeholder="Coupon code" value="{{ old('code') }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea type="text" name="description" rows="5" placeholder="Description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group mb-4">
                            <label for="title">Amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="Discount amount" value="{{ old('amount') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Start date</label>
                            <input type="text" name="start_date" class="form-control datepicker" placeholder="Start date" value="{{ old('start_date') }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">End date</label>
                            <input type="text" name="end_date" class="form-control datepicker" placeholder="End date" value="{{ old('end_date') }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('foot')
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        jQuery(function($) {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                todayHighlight:'TRUE',
                autoclose: true,
                startDate: "-0d",
                endDate: "+360d"
            }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });
        });
    </script>
@endsection
