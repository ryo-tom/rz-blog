@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <h1 class="admin-page-title">Category > Edit</h1>

    <div class="operation-bar">
        <button class="btn btn-update" data-form-id="categoryUpdateForm">Update</button>
        <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-delete">Delete</button>
        </form>
        @push('scripts')
            <script src={{ asset('js/admin/operation.js') }}></script>
        @endpush
    </div>

    <form id="categoryUpdateForm" action="{{ route('admin.categories.update', ['category' => $category]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-inner">
            <div class="input-box">
                <label for="categoryName">カテゴリ名</label>
                <input type="text" id="categoryName" placeholder="name" name="name"
                    value="{{ old('name', $category->name) }}">
                @error('name')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="categorySlug">スラッグ</label>
                <input type="text" id="categorySlug" placeholder="slug" name="slug"
                    value="{{ old('slug', $category->slug) }}">
                @error('slug')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="categorySortOrder">並び順</label>
                <input type="number" id="categorySortOrder" placeholder="sort_order" name="sort_order"
                    value="{{ old('sort_order', $category->sort_order) }}">
                @error('sort_order')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
@endsection
