@extends('layouts.admin')

@section('title', 'Category')

@section('content')

<h1 class="admin-page-title">Categories</h1>

<div class="operation-bar">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-create">Create</a>
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
                    <th class="th-cell">Edit</th>
                    <th class="th-cell">Delete</th>
                    <th class="th-cell">id</th>
                    <th class="th-cell">name</th>
                    <th class="th-cell">slug</th>
                    <th class="th-cell">sort_order</th>
                    <th class="th-cell">created_at</th>
                    <th class="th-cell">updated_at</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($categories as $category)
                <tr class="tbody-row">
                    <td class="td-cell">
                        <a href="{{ route('admin.categories.edit', ['category' => $category]) }}" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="td-cell">
                        <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                    <td class="td-cell">{{ $category->id }}</td>
                    <td class="td-cell">{{ $category->name }}</td>
                    <td class="td-cell">{{ $category->slug }}</td>
                    <td class="td-cell">{{ $category->sort_order ?? 'NULL' }}</td>
                    <td class="td-cell">{{ $category->created_at ?? 'NULL' }}</td>
                    <td class="td-cell">{{ $category->updated_at ?? 'NULL' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

