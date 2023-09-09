<div id="filterBlock" class="filter-block">
    <form id="filterForm">
        {{-- Filter Header --}}
        <div class="filter-header">

            <div class="filter-header-label">Filter</div>
            <a href="{{ route('home') }}" class="filter-clear-button">Clear</a>
        </div>
        {{-- Filter Body --}}
        <div class="filter-body">
            {{-- Insert filter-invalid-feedback element by JS --}}

            {{-- Category Section --}}
            <div class="category-section">
                <div class="filter-label">
                    $category =
                    <select id="categorySelector" name="category_slug" class="filter-form-select">
                        <option value="">全て</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    ;
                </div>
            </div>
            <hr>
            {{-- Tag Section --}}
            <div class="tag-section">
                <div class="filter-label">$tags = [</div>
                <div class="tags-list is-scrollable">
                    @foreach ($tags as $tag)
                    <div class="tag-item">
                        <label class="tag-label">
                            <input type="checkbox" name="tag_slugs[]" value="{{ $tag->slug }}" hidden>
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
                </div>
                <div class="filter-label">];</div>
                <div class="filter-label">
                    $tagOption =
                    <select id="tagOptionSelector" name="tag_option" class="filter-form-select">
                        <option value="or">OR</option>
                        <option value="and">AND</option>
                    </select>
                    ;
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        const ajaxFilterRoute = '{{ route('posts.filter') }}';
    </script>
@endpush
