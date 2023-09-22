<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function show(string $slug)
    {
        return view('front.page', [
            'page' => Page::where('slug', $slug)->firstOrFail(),
        ]);
    }
}
