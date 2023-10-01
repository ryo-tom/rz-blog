@extends('layouts.admin')

@section('title', 'Post')

@section('content')

<h1 class="admin-page-title">Posts</h1>

<div class="operation-bar">
    <a href="{{ route('admin.posts.create') }}" class="btn btn-create">Create</a>
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
                    <th class="th-cell">category</th>
                    <th class="th-cell">tags</th>
                    <th class="th-cell">title</th>
                    <th class="th-cell">slug</th>
                    <th class="th-cell">content</th>
                    <th class="th-cell">published_at</th>
                    <th class="th-cell">created_at</th>
                    <th class="th-cell">updated_at</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($posts as $post)
                <tr class="tbody-row">
                    <td class="td-cell is-narrow">
                        <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-edit">Edit</a>
                    </td>
                    <td class="td-cell t-center">{{ $post->id }}</td>
                    <td class="td-cell t-center">
                        <span class="status-label {{ $post->is_published ? 'is-public' : 'is-private'}}">
                            {{ $post->is_published ? '公開' : '非公開' }}
                        </span>
                    </td>
                    <td class="td-cell">{{ $post->category->name }}</td>
                    <td class="td-cell wrap">
                        @foreach ($post->tags as $tag)
                        {{ $tag->name }},
                        @endforeach
                    </td>
                    <td class="td-cell is-wide">{{ $post->title }}</td>
                    <td class="td-cell is-wide">{{ $post->slug }}</td>
                    <td class="td-cell is-ellipsis is-midium">{{ $post->content }}</td>
                    <td class="td-cell">{{ $post->published_at }}</td>
                    <td class="td-cell">{{ $post->created_at }}</td>
                    <td class="td-cell">{{ $post->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
