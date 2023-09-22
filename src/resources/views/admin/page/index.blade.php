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
                    <th class="th-cell">操作</th>
                    <th class="th-cell">操作</th>
                    <th class="th-cell">id</th>
                    <th class="th-cell">title</th>
                    <th class="th-cell">slug</th>
                    <th class="th-cell">content</th>
                    <th class="th-cell">is_published</th>
                    <th class="th-cell">created_at</th>
                    <th class="th-cell">updated_at</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($pages as $page)
                <tr class="tbody-row">
                    <td class="td-cell">
                        <a href="{{ route('admin.pages.edit', ['page' => $page]) }}" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="td-cell">
                        <form action="{{ route('admin.pages.destroy', ['page' => $page]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                    <td class="td-cell">{{ $page->id }}</td>
                    <td class="td-cell">{{ $page->title }}</td>
                    <td class="td-cell">{{ $page->slug }}</td>
                    <td class="td-cell">{{ $page->content }}</td>
                    <td class="td-cell">{{ $page->is_published ? '公開' : '非公開' }}</td>
                    <td class="td-cell">{{ $page->created_at ?? 'NULL' }}</td>
                    <td class="td-cell">{{ $page->updated_at ?? 'NULL' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
