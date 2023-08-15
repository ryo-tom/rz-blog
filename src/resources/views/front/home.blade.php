@extends('layouts.front')

@section('content')
    <main class="layout-main">
        <div class="main-container">

            <div class="columns">
                <div class="main-column">
                    @include('front._block.posts')
                </div>
                <div class="side-column">
                    @include('front._block.filter')
                </div>
            </div>

        </div>
    </main>
@endsection
