<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | 2018 TIFE</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>

<header>
    @include('layouts/header', ['current' => $current])
    @section('title', $title)
</header>

<main role="main">
    @yield('content')
    @include('layouts/footer')
</main>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>

</html>
