@extends('layouts.front')

@section('meta')
    <x-meta-tags :title="$page->title . ' | ' . config('app.name')" :description="$page->meta_description" />
@endsection

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
