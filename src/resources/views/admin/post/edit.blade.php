@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
    <h1 class="admin-page-title">Post > Edit</h1>

    <div class="operation-bar">
        <button class="btn btn-update" data-form-id="postUpdateForm">Update</button>
        @push('scripts')
            <script src={{ asset('js/admin/operation.js') }}></script>
        @endpush
    </div>

    <form id="postUpdateForm" action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-inner">
            <div class="input-box">
                <label for="title">タイトル<span class="required-mark">*</span></label>
                <input type="text" id="title" placeholder="title" name="title"
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="slug">スラッグ<span class="required-mark">*</span></label>
                <input type="text" id="slug" placeholder="slug" name="slug"
                    value="{{ old('slug', $post->slug) }}">
                @error('slug')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="category">カテゴリ<span class="required-mark">*</span></label>
                <select name="category_id" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="tagIds">タグ</label>
                <select name="tag_id[]" id="tagIds" size="3" multiple>
                    <option hidden value=""></option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tag_id', $post->tag_ids)))>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @error('tag_id.*')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="published_at">公開日<span class="required-mark">*</span></label>
                <input type="datetime-local" id="published_at" placeholder="published_at" name="published_at"
                    value="{{ old('published_at', $post->published_at ?? now()) }}">
                @error('published_at')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="postIsPublished">公開設定<span class="required-mark">*</span></label>
                <select id="postIsPublished" name="is_published">
                    <option value="1" @selected(old('is_published', $post->is_published) == '1')>公開</option>
                    <option value="0" @selected(old('is_published', $post->is_published) == '0')>非公開</option>
                </select>
                @error('is_published')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="content">記事内容<span class="required-mark">*</span></label>
                <textarea name="content" id="content" cols="30" rows="30" placeholder="content">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
@endsection
