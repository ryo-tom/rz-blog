<div class="post-content">
    <div class="post-header">
        <h1 class="post-title">{{ $post->title }}</h1>
        <div class="post-datetime">
            <div class="published-date">公開: {{ $post->published_at?->format('Y-m-d') }}</div>
            @if ($post->updated_at)
            <div class="updated-date">更新: {{ $post->updated_at?->format('Y-m-d') }}</div>
            @endif
        </div>
    </div>
    <div id="postBody" class="post-body">
        {!! $post->html_content !!}
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/externalLinkHandler.js') }}"></script>
@endpush
