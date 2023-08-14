<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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

    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            'title'         => $request->input('title'),
            'content'       => $request->input('content'),
            'user_id'       => Auth::user()->id,
            'category_id'   => $request->input('category_id'),
            'slug'          => $request->input('slug'),
            'published_at'  => $request->input('published_at'),
        ]);

        // TODO: tag作成後に紐付け処理を追加する

        return redirect()->route('admin.post.index')
            ->with([
                'post_id' => "投稿ID:{$post->id}",
                'stored'  => 'を登録しました。',
            ]);
    }
}
