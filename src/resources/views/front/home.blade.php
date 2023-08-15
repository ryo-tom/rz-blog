@extends('layouts.front')

@section('content')
    <main class="layout-main">
        <div class="main-container">

            @for ($i = 0; $i < 100; $i++)
            <p>sample row {{$i}}</p>
            @endfor

        </div>
    </main>
@endsection
