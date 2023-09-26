@extends('layouts.admin')

@section('title', 'Edit Page')

@section('content')
    <h1 class="admin-page-title">Page > Edit</h1>

    <div class="operation-bar">
        <button class="btn btn-update" data-form-id="pageUpdateForm">Update</button>
        @push('scripts')<script src={{ asset('js/admin/operation.js') }}></script>@endpush
    </div>

    <form id="pageUpdateForm" action="{{ route('admin.pages.update', ['page' => $page]) }}" method="POST">
        @method('PATCH')
        @csrf
            <div class="form-inner">
                <div class="input-box">
                    <label for="title">タイトル<span class="required-mark">*</span></label>
                    <input type="text" id="title" placeholder="title" name="title" value="{{ old('title', $page->title) }}">
                    @error('title')
                    <div class="validation-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <label for="slug">スラッグ<span class="required-mark">*</span></label>
                    <input type="text" id="slug" placeholder="slug" name="slug" value="{{ old('slug', $page->slug) }}">
                    @error('slug')
                    <div class="validation-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <label for="pageIsPublished">公開設定<span class="required-mark">*</span></label>
                    <select id="pageIsPublished" name="is_published">
                        <option value="1" @selected(old('is_published', $page->is_published) == "1")>公開</option>
                        <option value="0" @selected(old('is_published', $page->is_published) == "0")>非公開</option>
                    </select>
                    @error('is_published')
                    <div class="validation-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <label for="content">ページ内容<span class="required-mark">*</span></label>
                    <textarea name="content" id="content" cols="30" rows="30" placeholder="content">{{ old('content', $page->content) }}</textarea>
                    @error('content')
                    <div class="validation-message">{{ $message }}</div>
                    @enderror
                </div>

            </div>
    </form>
@endsection
