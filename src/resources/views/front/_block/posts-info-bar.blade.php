<div class="posts-info-bar">

    @if(isset($filteredPostCount) && Route::is('posts.filter'))
    <div class="filter-result">
        {{ $filteredPostCount }} 件
    </div>
    @endif

    <div class="info-for-mobile">
        <button id="mobileFilterTrigger" class="open-filter-button">
            <span class="material-symbols-outlined">
            filter_list
            </span>
            <div class="label">
                Filter
            </div>
        </button>
    </div>
</div>
