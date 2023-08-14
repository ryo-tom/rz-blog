@extends('layouts.admin')

@section('title', 'Tag')

@section('content')

<h1 class="admin-page-title">Tag List</h1>

<div class="operation-bar">
    {{-- <a href="{{ route('admin.tag.create') }}" class="btn create-btn">Create</a> --}}
</div>

{{-- @if (session('stored'))
    <div class="alert alert-success">
        {{ session('tag_id') }} {{ session('stored') }}
    </div>
@endif --}}

{{-- @if (session('deleted'))
    <div class="alert alert-deleted">
        {{ session('tag_id') }} {{ session('deleted') }}
    </div>
@endif --}}

{{-- @if (session('updated'))
    <div class="alert alert-updated">
        {{ session('tag_id') }} {{ session('updated') }}
    </div>
@endif --}}

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
                        {{-- <a href="{{ route('admin.tag.edit', ['tag' => $tag->id]) }}" class="btn edit-btn">Edit</a> --}}
                    </td>
                    <td class="td-cell">
                        {{-- <form action="{{ route('admin.tag.destroy', ['tag' => $tag->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn delete-btn">Delete</button>
                        </form> --}}
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

