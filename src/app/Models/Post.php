<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'is_published',
        'published_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Get the published_at attribute as a Carbon instance.
     */
    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? NULL : Carbon::parse($value),
        );
    }

    /**
     * Get the array of tag IDs associated with the Post.
     *
     * @return array $tagIds
     */
    public function getTagIdsAttribute(): array
    {
        $tagIds = [];
        foreach ($this->tags as $tag) {
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    /**
     * Get post content converted from markdown to html
     *
     * @return string $html_content
     */
    public function getHtmlContentAttribute(): string
    {
        return Str::markdown($this->content);
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    public function scopeLatestPublished(Builder $query): Builder
    {
        return $query->orderBy('published_at', 'DESC');
    }

    public function scopeWithSlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }
}
