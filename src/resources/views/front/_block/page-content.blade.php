<div class="post-content">
    <div class="post-header">
        <h1 class="post-title">{{ $page->title }}</h1>
    </div>
    <div id="postBody" class="post-body">
        {!! $page->html_content !!}
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/externalLinkHandler.js') }}"></script>
@endpush
