@extends('layouts.admin')

@section('title', 'Tag')

@section('content')

<h1 class="admin-page-title">Tags</h1>

<div class="operation-bar">
    <a href="{{ route('admin.tags.create') }}" class="btn btn-create">Create</a>
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
                    <th class="th-cell">name</th>
                    <th class="th-cell">slug</th>
                    <th class="th-cell">sort_order</th>
                    <th class="th-cell">created_at</th>
                    <th class="th-cell">updated_at</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($tags as $tag)
                <tr class="tbody-row">
                    <td class="td-cell">
                        <a href="{{ route('admin.tags.edit', ['tag' => $tag]) }}" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="td-cell">
                        <form action="{{ route('admin.tags.destroy', ['tag' => $tag]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                    <td class="td-cell">{{ $tag->id }}</td>
                    <td class="td-cell">{{ $tag->name }}</td>
                    <td class="td-cell">{{ $tag->slug }}</td>
                    <td class="td-cell">{{ $tag->sort_order ?? 'NULL' }}</td>
                    <td class="td-cell">{{ $tag->created_at ?? 'NULL' }}</td>
                    <td class="td-cell">{{ $tag->updated_at ?? 'NULL' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

