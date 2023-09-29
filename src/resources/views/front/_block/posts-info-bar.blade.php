<div class="posts-info-bar">

    @if(isset($filteredPostCount) && request()->query())
    <div class="filter-result">
        {{ $filteredPostCount }} 件
    </div>
    @endif

    <div class="info-for-mobile">
        <div id="mobileFilterTrigger" class="open-filter-button">
            <span class="material-symbols-outlined">
            filter_list
            </span>
            <div class="label">
                Filter
            </div>
        </div>
    </div>
</div>
