<div class="post-content">
    <div class="post-header">
        <h1>{{ $post->title }}</h1>
        <div class="post-dates">
            <div class="post-date">公開: {{ $post->published_at?->format('Y-m-d') }}</div>
            <div class="post-date">更新: {{ $post->updated_at?->format('Y-m-d') }}</div>
        </div>
    </div>
    <div id="postBody">
        {!! $post->html_content !!}
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/externalLinkHandler.js') }}"></script>
@endpush
