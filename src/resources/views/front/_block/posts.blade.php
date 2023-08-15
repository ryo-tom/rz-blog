@foreach ($posts as $post)
<div class="post-block">
    <a href="" class="post-link">
        {{-- published_at --}}
        <div class="post-published-at">
            {{ $post->published_at }}
        </div>

        {{-- title --}}
        <h2 class="post-title">
            {{ $post->title }}
        </h2>

        {{-- tags --}}
        <div class="tags-list">
            @foreach ($post->tags as $tag)
            <div class="my-tag">
                <div class="tag-inner">
                    <label class="tag-label">
                        {{ $tag->name }}
                    </label>
                </div>
            </div>
            @endforeach
        </div>

        {{-- row number --}}
        <div class="post-row-num">{{ $loop->remaining + 1 }}</div>
    </a>
</div>
@endforeach
