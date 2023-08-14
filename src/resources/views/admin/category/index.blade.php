@extends('layouts.admin')

@section('title', 'Category')

@section('content')

<h1 class="admin-page-title">Category List</h1>

<div class="operation-bar">
    <a href="{{ route('admin.category.create') }}" class="btn btn-create">Create</a>
</div>

@if (session('stored'))
    <div class="alert alert-success">
        {{ session('category_id') }} {{ session('stored') }}
    </div>
@endif

@if (session('updated'))
    <div class="alert alert-updated">
        {{ session('category_id') }} {{ session('updated') }}
    </div>
@endif

@if (session('deleted'))
    <div class="alert alert-deleted">
        {{ session('category_id') }} {{ session('deleted') }}
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
                        <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="td-cell">
                        <form action="{{ route('admin.category.destroy', ['category' => $category->id]) }}" method="POST">
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

