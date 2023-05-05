<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/backend/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}" />
    <link href="{{ asset('assets/backend/images/favicon.png') }}" rel="shortcut icon" />
    <script src="{{ asset('assets/backend/plugins/nprogress/nprogress.js') }}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @yield('content')
</body>

</html>
