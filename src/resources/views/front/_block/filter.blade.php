<div id="filterBlock" class="filter-block">
    <form action="{{ route('home.filter') }}" method="GET" id="filterForm">
        {{-- Filter Header --}}
        <div class="filter-header">
            <div id="mobileFilterBack" class="mobile-filter-back">&lt; Back</div>
            <div class="filter-header-label">Filter</div>
            <a href="{{ route('home') }}" class="filter-clear-button">Clear</a>
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
                    <select id="categorySelector" name="category_slug" class="filter-form-select">
                        <option value="">全て</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" @isset($queries['category_slug'])@selected($queries['category_slug'] == $category->slug)@endisset>
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
                    <div class="my-tag">
                        <div class="tag-inner">
                            <label class="tag-label @isset($queries['tag_slugs']){{ in_array($tag->slug, $queries['tag_slugs']) ? 'tag-checked' : '' }}@endisset">
                                <input type="checkbox" name="tag_slugs[]" value="{{ $tag->slug }}" @isset($queries['tag_slugs'])@checked(in_array($tag->slug, $queries['tag_slugs']))@endisset hidden>
                                {{ $tag->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="filter-label">];</div>
                <div class="filter-label">
                    $tagOption =
                    <select id="tagOptionSelector" name="tag_option" class="filter-form-select">
                        <option value="or" @isset($queries['tag_option'])@selected($queries['tag_option'] == 'or')@endisset>OR</option>
                        <option value="and" @isset($queries['tag_option'])@selected($queries['tag_option'] == 'and')@endisset>AND</option>
                    </select>
                    ;
                </div>
            </div>
        </div>
        {{-- Filter Footer --}}
        <div class="filter-footer">

        </div>
    </form>
</div>

@push('scripts')
    <script src="js/filter.js"></script>
@endpush
