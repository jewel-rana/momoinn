@extends('layouts.auth')

@section('content')
<main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-4" src="{{ asset('assets/front/img/logo.png') }}" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <label for="inputEmail" class="visually-hidden">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
</main>
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/signin.css') }}">
@endsection

@section('foot')

@endsection
