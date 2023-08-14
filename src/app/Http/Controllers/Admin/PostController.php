<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::where('is_published', true)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.post.create', [
            'categories' => Category::all(),
        ]);
    }
}
