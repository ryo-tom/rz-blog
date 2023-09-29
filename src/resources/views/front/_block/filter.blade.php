<div id="filterBlock" class="filter-block">
    <form id="filterForm" action="{{ route('home') }}" method="GET">
        {{-- Filter Header --}}
        <div class="filter-header">

            <div class="filter-header-label">Filter</div>
            <a href="{{ route('home') }}" class="filter-clear-button">Clear</a>
        </div>
        {{-- Filter Body --}}
        <div class="filter-body">
            {{-- Category Section --}}
            <div class="category-section">
                <div class="filter-label">
                    $category =
                    <select id="categorySelector" name="category" class="filter-form-select" data-device="pc">
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
                <div class="tags-list is-scrollable">
                    @foreach ($tags as $tag)
                    <div class="tag-item">
                        <label class="tag-label {{ in_array($tag->slug, request()->query('tags') ?? []) ? 'tag-checked' : '' }}">
                            <input type="checkbox" name="tags[]" value="{{ $tag->slug }}" hidden data-device="pc" @checked(in_array($tag->slug, request()->query('tags') ?? []))>
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
                </div>
                <div class="filter-label">];</div>
                <div class="filter-label">
                    $tagOption =
                    <select id="tagOptionSelector" name="tag_option" class="filter-form-select" data-device="pc">
                        <option value="or" @selected(request()->query('tag_option') === 'or')>OR</option>
                        <option value="and" @selected(request()->query('tag_option') === 'and')>AND</option>
                    </select>
                    ;
                </div>
            </div>
        </div>
    </form>
</div>

