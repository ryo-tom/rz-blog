<div class="post-content">
    <h1>{{ $post->title }}</h1>
    <div id="postBody">
        {!! $post->html_content !!}
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/externalLinkHandler.js') }}"></script>
@endpush
