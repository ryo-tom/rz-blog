@extends('layouts.admin')

@section('title', 'Create Page')

@section('content')
    <h1 class="admin-page-title">Page > Create</h1>

    <div class="operation-bar">
        <button class="btn btn-store" data-form-id="pageStoreForm">Store</button>
        @push('scripts')<script src={{ asset('js/admin/operation.js') }}></script>@endpush
    </div>

    <form id="pageStoreForm" action="{{ route('admin.pages.store') }}" method="POST">
        @csrf
        <div class="form-block">
            <div class="form-inner">
                <div class="input-box">
                    <label for="pageTitle">タイトル<span class="required-mark">*</span></label>
                    <input type="text" id="pageTitle" placeholder="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="validation-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <label for="pageSlug">スラッグ<span class="required-mark">*</span></label>
                    <input type="text" id="pageSlug" placeholder="slug" name="slug" value="{{ old('slug') }}">
                    @error('slug')
                    <div class="validation-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <label for="pageIsPublished">公開設定<span class="required-mark">*</span></label>
                    <select id="pageIsPublished" name="is_published">
                        <option value="1" @selected(old('is_published') == "1")>公開</option>
                        <option value="0" @selected(old('is_published') == "0")>非公開</option>
                    </select>
                    @error('is_published')
                    <div class="validation-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-box">
                    <label for="pageContent">ページ内容<span class="required-mark">*</span></label>
                    <textarea id="pageContent" name="content" cols="30" rows="30" placeholder="content">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="validation-message">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>
    </form>
@endsection

