@extends('layouts.front')

@section('title', config('app.name'))

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="columns">
                <div class="main-column">
                    @include('front._block.posts-info-bar')
                    @include('front._block.posts-list')
                    {{ $posts->links('vendor.pagination.my-simple-default') }}
                </div>
                <div class="side-column">
                    @include('front._block.filter')
                    @include('front._block.filter-mobile')
                    @include('front._block.profile')
                </div>
            </div>

        </div>
    </main>
@endsection

@push('scripts')
    <script src={{ asset('js/filter.js') }}></script>
@endpush
