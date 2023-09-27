@extends('layouts.admin')

@section('title', 'Edit Tag')

@section('content')
    <h1 class="admin-page-title">Tag > Edit</h1>

    <div class="operation-bar">
        <button class="btn btn-update" data-form-id="tagUpdateForm">Update</button>
        <form action="{{ route('admin.tags.destroy', ['tag' => $tag]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-delete">Delete</button>
        </form>
        @push('scripts')
            <script src={{ asset('js/admin/operation.js') }}></script>
        @endpush
    </div>

    <form id="tagUpdateForm" action="{{ route('admin.tags.update', ['tag' => $tag]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-inner">
            <div class="input-box">
                <label for="tagName">タグ名<span class="required-mark">*</span></label>
                <input type="text" id="tagName" placeholder="name" name="name"
                    value="{{ old('name', $tag->name) }}">
                @error('name')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="tagSlug">スラッグ<span class="required-mark">*</span></label>
                <input type="text" id="tagSlug" placeholder="slug" name="slug"
                    value="{{ old('slug', $tag->slug) }}">
                @error('slug')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="tagSortOrder">並び順</label>
                <input type="number" id="tagSortOrder" placeholder="sort_order" name="sort_order"
                    value="{{ old('sort_order', $tag->sort_order) }}">
                @error('sort_order')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
@endsection
