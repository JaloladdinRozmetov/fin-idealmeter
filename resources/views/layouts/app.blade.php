<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FIN IDEALMETER') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    @auth
        @include('layouts.sidebar')
    @endauth
    <main class="flex-grow-1 p-4">
        @yield('content')
    </main>
</div>

<!-- Bootstrap 5 JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script></body>
</html>
