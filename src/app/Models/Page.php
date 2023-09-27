<?php

namespace App\Models;

use App\Traits\HasMetaDescription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, HasMetaDescription;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
    ];

    /**
     * Get post content converted from markdown to html
     *
     * @return string $html_content
     */
    public function getHtmlContentAttribute(): string
    {
        return Str::markdown($this->content);
    }

}
