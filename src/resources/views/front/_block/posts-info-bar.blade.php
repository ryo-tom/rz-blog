<div class="posts-info-bar">

    @if(isset($filteredPostCount) && Route::is('posts.filter'))
    <div class="filter-result">
        {{ $filteredPostCount }} 件
    </div>
    @endif

    <div class="info-for-mobile">
        <button id="mobileFilterTrigger" class="open-filter-button">
            <div class="label">
                Filter
            </div>
            <span class="material-symbols-outlined">
            add_circle
            </span>
        </button>
    </div>
</div>
