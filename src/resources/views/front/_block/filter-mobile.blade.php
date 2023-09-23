<div id="mobileFilterBlock" class="filter-block on-mobile">
    <form action="{{ route('posts.filter') }}" method="GET">
        {{-- Filter Header --}}
        <div class="filter-header">
            <div id="mobileFilterBack" class="mobile-filter-back">&lt; Back</div>
            <div class="filter-header-label">Filter</div>
            <button id="mobileFilterClearTrigger" type="button" class="filter-clear-button">Clear</button>
        </div>
        {{-- Filter Body --}}
        <div class="filter-body">
            {{-- Invalid Feedback --}}
            @if ($errors->any())
            <div class="filter-invalid-feedback">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- Category Section --}}
            <div class="category-section">
                <div class="filter-label">
                    $category =
                    <select id="mobileCategorySelector" name="category" class="filter-form-select" data-device="mobile">
                        <option value="">全て</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" @selected(request()->query('category') === $category->slug)>
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
                <div class="tags-list">
                    @foreach ($tags as $tag)
                    <div class="tag-item">
                        <label class="tag-label {{ in_array($tag->slug, request()->query('tags') ?? []) ? 'tag-checked' : '' }}">
                            <input type="checkbox" name="tags[]" value="{{ $tag->slug }}" hidden data-device="mobile" @checked(in_array($tag->slug, request()->query('tags') ?? []))>
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
                </div>
                <div class="filter-label">];</div>
                <div class="filter-label">
                    $tagOption =
                    <select id="mobileTagOptionSelector" name="tag_option" class="filter-form-select" data-device="mobile">
                        <option value="or" @selected(request()->query('tag_option') === 'or')>OR</option>
                        <option value="and" @selected(request()->query('tag_option') === 'and')>AND</option>
                    </select>
                    ;
                </div>
            </div>
        </div>
        {{-- Filter Footer --}}
        <div class="filter-footer">
            <div class="mobile-filter-counts">
                <span id="filterCount" class="count-label">
                    @isset($filteredPostCount){{ $filteredPostCount }}@endisset
                </span> 件
            </div>
            <button class="mobile-filter-button">
                結果を表示する
            </button>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        const ajaxFilterRoute = '{{ route('posts.filter.count') }}';
    </script>
@endpush
