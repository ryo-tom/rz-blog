{{-- Search Header --}}
<div class="search-header">
    <form id="search-form" action="" class="search-form">
        <label for="search-input" class="label-search">
            <span class="material-symbols-outlined">
                search
            </span>
        </label>
        <input type="search" id="search-input" placeholder="search" class="search-input">
    </form>
    <div id="searchClose" class="search-close">Close</div>
</div>
{{-- Suggestion Words --}}
<div class="suggestion">
    <span>検索候補:</span>
    <ul class="suggestion-list">
        <li class="suggestion-item">laravel</li>
        <li class="suggestion-item">composer</li>
        <li class="suggestion-item">install</li>
    </ul>
</div>
{{-- Search Mode --}}
<div class="search-mode">
    <span>検索モード:</span>
</div>
<div class="search-body">
    検索結果:
    <ul class="search-results">
        @for ($i = 0; $i < 30; $i++)
            <li class="search-result"><a href="">記事タイトル{{ $i }}</a></li>
        @endfor
    </ul>
</div>
