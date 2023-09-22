@extends('layouts.front')

@section('title', $page->title)

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="columns">
                <div class="main-column">
                    @include('front._block.page-content')
                </div>
                <div class="side-column">
                    @include('front._block.post-toc')
                    @include('front._block.profile')
                </div>
            </div>

        </div>
    </main>
@endsection
