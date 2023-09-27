<?php

namespace App\Models;

use App\Traits\HandlesMarkdown;
use App\Traits\HasMetaDescription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, HasMetaDescription, HandlesMarkdown;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_published',
    ];

}
