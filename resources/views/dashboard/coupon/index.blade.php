@extends('layouts.backend')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('coupons.create') }}" type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="plus"></span>
                    Add new coupon
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Coupon name</th>
                    <th>Code</th>
                    <th>Expiry date</th>
                    <th>Discount amount</th>
                    <th><i data-feather="tool"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($coupons as $k => $coupon)
                <tr>
                    <td>{{ $k + 1 }}</td>
                    <td>{{ $coupon->name }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->offer_end }}</td>
                    <td>{{ $coupon->amount }} {{ ($coupon->type == 'percent') ? '%' : 'Tk.' }}</td>
                    <td>
                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-secondary" style="float: left;">Edit</a>
                        <form class="form-inline ml-2" method="POST" style="float: left;" action="{{ route('coupons.destroy', $coupon->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn form-inline btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if(!$coupons->count())
                    <tr>
                        <td colspan="6">No coupon added</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {!! $coupons->links() !!}
        </div>
    </main>
@endsection

@section('head')

@endsection

@section('foot')

@endsection
