@extends('layouts.admin')

@section('title', 'Page')

@section('content')

<h1 class="admin-page-title">Pages</h1>

<div class="operation-bar">
    <a href="{{ route('admin.pages.create') }}" class="btn btn-create">Create</a>
</div>

@if (session('action'))
    <div class="alert alert-{{ session('action') }}">
        {{ session('message') }}
    </div>
@endif

<div class="content-block">
    <div class="content-inner">
        <table class="table">
            <thead class="table-header">
                <tr class="thead-row">
                    <th class="th-cell"></th>
                    <th class="th-cell">id</th>
                    <th class="th-cell">is_published</th>
                    <th class="th-cell">title</th>
                    <th class="th-cell">slug</th>
                    <th class="th-cell">content</th>
                    <th class="th-cell">created_at</th>
                    <th class="th-cell">updated_at</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($pages as $page)
                <tr class="tbody-row">
                    <td class="td-cell t-center is-narrow">
                        <a href="{{ route('admin.pages.edit', ['page' => $page]) }}" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="td-cell t-center">{{ $page->id }}</td>
                    <td class="td-cell t-center">{{ $page->is_published ? '公開' : '非公開' }}</td>
                    <td class="td-cell is-wide">{{ $page->title }}</td>
                    <td class="td-cell is-wide">{{ $page->slug }}</td>
                    <td class="td-cell is-ellipsis is-midium">{{ $page->content }}</td>
                    <td class="td-cell">{{ $page->created_at }}</td>
                    <td class="td-cell">{{ $page->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
