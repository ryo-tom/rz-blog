<div class="posts-list">
    @foreach ($posts as $post)
    <div class="post-item">
        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="post-item-link">
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
                <div class="tag-item">
                    <label class="tag-label ignore-pointer  @isset($queries['tag_slugs']){{ in_array($tag->slug, $queries['tag_slugs']) ? 'tag-checked' : '' }}@endisset">
                        {{ $tag->name }}
                    </label>
                </div>
                @endforeach
            </div>

            {{-- row number --}}
            <div class="post-row-num">{{ $loop->remaining + 1 }}</div>
        </a>
    </div>
    @endforeach
</div>
