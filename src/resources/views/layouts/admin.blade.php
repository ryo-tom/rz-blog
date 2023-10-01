<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理画面 | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    @vite('resources/sass/styles-admin.scss')
</head>
<body>

    <main class="layout-admin">
        <div class="left-column">
            @include('admin.left-sidebar')
        </div>
        <div class="right-column">
            <div class="right-body">
                @yield('content')
            </div>
        </div>
    </main>

    @stack('scripts')
</body>
</html>
