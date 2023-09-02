@extends('layouts.front')

@section('title', __('Not Found'))

@section('content')

<main class="layout-main">
    <div class="main-container is-error-page">

    <h2 class="error-content-title">
        404 | {{ __('Not Found') }}
    </h2>

    <p class="error-content-message">
        ページが見つかりません。
        一時的にアクセスができない状況にあるか、移動もしくは削除された可能性があります。
    </p>

    <p class="error-content-action">
        <a href="{{ route('home')}}">
            トップページへ戻る
        </a>
    </p>

    </div>
</main>

@endsection

