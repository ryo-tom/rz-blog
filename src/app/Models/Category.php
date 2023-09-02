<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
    ];

    /*
    |--------------------------------------------------------------------------
    | Defining Relationships
    |--------------------------------------------------------------------------
    */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeSorted(Builder $query): Builder
    {
        return $query->orderByRaw('ISNULL(`sort_order`), `sort_order` ASC');
    }
}
