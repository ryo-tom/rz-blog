<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasMetaDescription
{
    public function getMetaDescriptionAttribute(): string
    {
        $text = strip_tags($this->html_content);
        $text = preg_replace('/\s+/', ' ', $text);
        return Str::limit($text, 160);
    }
}
