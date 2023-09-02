<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
    | Defining Relationships
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
    | Defining Accessors
    |--------------------------------------------------------------------------
    */

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
        return $query->where('is_published', true);
    }

    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'DESC');
    }
}
