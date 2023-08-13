@extends('layouts.admin')

@section('content')

<h1>ダッシュボード</h1>
{{ Auth::user()->name }}でログイン中。
<hr>

<form method="POST" action="{{ route('logout')}}">
    @csrf
    <button>Logout</button>
</form>

@endsection
