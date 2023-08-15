<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        return view('front.home', [
            'posts'      => Post::where('is_published', true)->orderBy('created_at', 'DESC')->get(),
            'categories' => Category::orderByRaw('ISNULL(`sort_order`), `sort_order` ASC')->get(),
            'tags'       => Tag::orderByRaw('ISNULL(`sort_order`), `sort_order` ASC')->get(),
        ]);
    }
}
