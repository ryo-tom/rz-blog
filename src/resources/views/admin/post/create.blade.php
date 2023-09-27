@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <h1 class="admin-page-title">Post > Create</h1>

    <div class="operation-bar">
        <button class="btn btn-store" data-form-id="postStoreForm">Store</button>
        @push('scripts')
            <script src={{ asset('js/admin/operation.js') }}></script>
        @endpush
    </div>

    <form id="postStoreForm" action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="form-inner">
            <div class="input-box">
                <label for="postTitle">タイトル<span class="required-mark">*</span></label>
                <input type="text" id="postTitle" placeholder="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="postSlug">スラッグ<span class="required-mark">*</span></label>
                <input type="text" id="postSlug" placeholder="slug" name="slug" value="{{ old('slug') }}">
                @error('slug')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="postCategory">カテゴリ<span class="required-mark">*</span></label>
                <select id="postCategory" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
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
                        <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tag_id', []) ?? []))>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-box">
                <label for="postPublishedAt">公開日<span class="required-mark">*</span></label>
                <input type="datetime-local" id="postPublishedAt" placeholder="published_at" name="published_at"
                    value="{{ old('published_at', now()) }}">
                @error('published_at')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="postIsPublished">公開設定<span class="required-mark">*</span></label>
                <select id="postIsPublished" name="is_published">
                    <option value="1" @selected(old('is_published') == '1')>公開</option>
                    <option value="0" @selected(old('is_published') == '0')>非公開</option>
                </select>
                @error('is_published')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="postContent">記事内容<span class="required-mark">*</span></label>
                <textarea id="postContent" name="content" cols="30" rows="30" placeholder="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
@endsection
