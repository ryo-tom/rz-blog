<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HandlesMarkdown
{
    public function getHtmlContentAttribute(): string
    {
        return Str::markdown($this->content);
    }
}
