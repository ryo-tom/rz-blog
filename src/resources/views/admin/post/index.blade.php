@extends('layouts.admin')

@section('title', 'Post')

@section('content')

<h1 class="admin-page-title">Post List</h1>

<div class="operation-bar">
    <a href="{{ route('admin.post.create') }}" class="btn btn-create">Create</a>
</div>

@if (session('stored'))
    <div class="alert alert-success">
        {{ session('post_id') }} {{ session('stored') }}
    </div>
@endif

@if (session('updated'))
    <div class="alert alert-updated">
        {{ session('post_id') }} {{ session('updated') }}
    </div>
@endif

@if (session('deleted'))
    <div class="alert alert-deleted">
        {{ session('post_id') }} {{ session('deleted') }}
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
                    <th class="th-cell">user</th>
                    <th class="th-cell">category</th>
                    <th class="th-cell">tags</th>
                    <th class="th-cell">title</th>
                    <th class="th-cell">slug</th>
                    <th class="th-cell">content</th>
                    <th class="th-cell">is_published</th>
                    <th class="th-cell">created_at</th>
                    <th class="th-cell">updated_at</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($posts as $post)
                <tr class="tbody-row">
                    <td class="td-cell">
                        <a href="{{ route('admin.post.edit', ['post' => $post]) }}" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="td-cell">
                        <form action="{{ route('admin.post.destroy', ['post' => $post]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                    <td class="td-cell">{{ $post->id }}</td>
                    <td class="td-cell">{{ $post->user->name }}</td>
                    <td class="td-cell">{{ $post->category->name }}</td>
                    <td class="td-cell wrap">
                        {{-- @foreach ($post->tags as $tag)
                        {{ $tag->name }},
                        @endforeach --}}
                    </td>
                    <td class="td-cell">{{ $post->title }}</td>
                    <td class="td-cell">{{ $post->slug }}</td>
                    <td class="td-cell">{{ $post->content }}</td>
                    <td class="td-cell">{{ $post->is_published }}</td>
                    <td class="td-cell">{{ $post->created_at ?? 'NULL' }}</td>
                    <td class="td-cell">{{ $post->updated_at ?? 'NULL' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
