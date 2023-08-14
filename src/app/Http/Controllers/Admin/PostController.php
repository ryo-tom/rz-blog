<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::where('is_published', true)->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
