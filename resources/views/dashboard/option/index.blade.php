@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>

        <div class="table-responsive">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="header-tab" data-bs-toggle="tab" href="#header" role="tab" aria-controls="header" aria-selected="false">Header</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="homepage-tab" data-bs-toggle="tab" href="#homepage" role="tab" aria-controls="homepage" aria-selected="false">Homepage</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="footer-tab" data-bs-toggle="tab" href="#footer" role="tab" aria-controls="footer" aria-selected="false">Footer</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="payment-tab" data-bs-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Footer</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">...</div>
                <div class="tab-pane fade" id="header" role="tabpanel" aria-labelledby="header-tab">...</div>
                <div class="tab-pane fade" id="homepage" role="tabpanel" aria-labelledby="homepage-tab">...</div>
                <div class="tab-pane fade" id="footer" role="tabpanel" aria-labelledby="footer-tab">...</div>
                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">...</div>
            </div>

        </div>
    </main>
@endsection

@section('head')

@endsection

@section('foot')

@endsection
