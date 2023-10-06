<?php

namespace App\Models;

use App\Traits\HandlesMarkdown;
use App\Traits\HasMetaDescription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, HasMetaDescription, HandlesMarkdown;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'is_published',
        'published_at',
    ];

    /** 新規レコード作成時はupdated_atをnullにする */
    protected static function booted()
    {
        static::saving(function ($model) {
            if ($model->isDirty() && !$model->exists) {
                $model->updated_at = null;
            }
        });
    }

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

    public function scopeOrderByPublishedAtDesc(Builder $query): Builder
    {
        return $query->orderBy('published_at', 'DESC');
    }

    public function scopeWithSlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }

    public function scopeFilterByCategory(Builder $query, ?string $categorySlug): Builder
    {
        if (!$categorySlug) {
            return $query;
        }

        return $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    public function scopeFilterByTags(Builder $query, ?array $tagSlugs, ?string $tagOption): Builder
    {
        if (!$tagSlugs) {
            return $query;
        }

        if ($tagOption === 'or') {
            return $query->whereHas('tags', function ($q) use ($tagSlugs) {
                $q->whereIn('slug', $tagSlugs);
            });
        }

        if ($tagOption === 'and') {
            foreach ($tagSlugs as $tagSlug) {
                $query->whereHas('tags', function ($q) use ($tagSlug) {
                    $q->where('slug', $tagSlug);
                });
            }
        }

        return $query;
    }


}
