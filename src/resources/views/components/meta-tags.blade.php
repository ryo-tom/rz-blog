<title>{{ $title ?? config('app.name') }}</title>
<meta name="description" content="{{ $description ?? (config('app.name') . 'は、LaravelやWeb開発に関する技術ブログ兼ポートフォリオサイトです') }}">

{{-- Open Graph tags --}}
<meta property="og:title" content="{{ $title ?? config('app.name') }}">
<meta property="og:description" content="{{ $description ?? (config('app.name') . 'は、LaravelやWeb開発に関する技術ブログ兼ポートフォリオサイトです') }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:image" content="{{ asset('images/default-share-wide.png') }}">
{{-- Twitter Card tags --}}
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $title ?? config('app.name') }}">
<meta name="twitter:description" content="{{ $description ?? (config('app.name') . 'は、LaravelやWeb開発に関する技術ブログ兼ポートフォリオサイトです') }}">
<meta name="twitter:image" content="{{ asset('images/default-share.png') }}">
<meta name="twitter:site" content="@rk_techs">
