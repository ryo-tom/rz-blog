@extends('layouts.admin')

@section('title', 'Create Tag')

@section('content')
    <h1 class="admin-page-title">Tag > Create</h1>

    <div class="operation-bar">
        <button class="btn btn-store" data-form-id="tagStoreForm">Store</button>
        @push('scripts')
            <script src={{ asset('js/admin/operation.js') }}></script>
        @endpush
    </div>

    <form id="tagStoreForm" action="{{ route('admin.tags.store') }}" method="POST">
        @csrf
        <div class="form-inner">
            <div class="input-box">
                <label for="tagName">タグ名<span class="required-mark">*</span></label>
                <input type="text" id="tagName" placeholder="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="tagSlug">スラッグ<span class="required-mark">*</span></label>
                <input type="text" id="tagSlug" placeholder="slug" name="slug" value="{{ old('slug') }}">
                @error('slug')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-box">
                <label for="tagSortOrder">並び順</label>
                <input type="number" id="tagSortOrder" placeholder="sort_order" name="sort_order"
                    value="{{ old('sort_order') }}">
                @error('sort_order')
                    <div class="validation-message">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
@endsection
