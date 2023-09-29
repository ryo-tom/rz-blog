<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <link rel="canonical" href="{{ Request::url() }}" />

    {{-- Styles --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    @vite('resources/sass/styles-front.scss')

    @includeWhen(config('myconf.gtag_enable'), 'front.gtag')
</head>
<body>

    @include('front._layout.modal')

    @include('front._layout.header')
    @yield('content')
    @include('front._layout.footer')

    <script src="{{ asset('js/header.js') }}"></script>
    @stack('scripts')
</body>

</html>
