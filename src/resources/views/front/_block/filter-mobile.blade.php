<div id="mobileFilterBlock" class="filter-block on-mobile">
    <form>
        {{-- Filter Header --}}
        <div class="filter-header">
            <div id="mobileFilterBack" class="mobile-filter-back">&lt; Back</div>
            <div class="filter-header-label">Filter</div>
            <button type="button" class="filter-clear-button">Clear</button>
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
                    <select id="mobileCategorySelector" name="category_slug" class="filter-form-select">
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
                <div class="tags-list">
                    @foreach ($tags as $tag)
                    <div class="tag-item">
                        <label class="tag-label">
                            <input type="checkbox" name="tag_slugs[]" value="{{ $tag->slug }}" hidden data-device="mobile">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
                </div>
                <div class="filter-label">];</div>
                <div class="filter-label">
                    $tagOption =
                    <select id="mobileTagOptionSelector" name="tag_option" class="filter-form-select">
                        <option value="or">OR</option>
                        <option value="and">AND</option>
                    </select>
                    ;
                </div>
            </div>
        </div>
        {{-- Filter Footer --}}
        <div class="filter-footer">
            <div class="mobile-filter-counts">
                <span class="count-label">9,999</span>件
            </div>
            <button class="mobile-filter-button">
                絞り込み結果を表示する
            </button>
        </div>
    </form>
</div>
