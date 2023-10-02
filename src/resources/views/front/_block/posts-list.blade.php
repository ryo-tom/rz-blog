<div class="posts-list">
    @foreach ($posts as $post)
    <div class="post-item">
        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="post-item-link">
            {{-- published_at --}}
            <div class="post-published-at">
                {{ $post->published_at?->format('Y-m-d') }}
            </div>

            {{-- title --}}
            <h2 class="post-title">
                {{ $post->title }}
            </h2>

            <div class="post-item-footer">
                {{-- category --}}
                <span class="post-category">
                    {{ $post->category->name }}
                </span>
                {{-- tags --}}
                <div class="tags-list">
                    @foreach ($post->tags as $tag)
                    <div class="tag-item">
                        <span class="tag-label ignore-pointer {{ in_array($tag->slug, request()->query('tags') ?? []) ? 'tag-checked' : '' }}">
                            {{ $tag->name }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

        </a>
    </div>
    @endforeach
</div>
