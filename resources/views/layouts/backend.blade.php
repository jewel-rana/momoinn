@include('layouts.parts.header')
@include('layouts.parts.top-bar')
<div class="container-fluid">
    <div class="row">
        @include('layouts.parts.backend.sidebar')
        @include('flush-message')
        @yield('content')
    </div>
</div>
@include('layouts.parts.footer')
