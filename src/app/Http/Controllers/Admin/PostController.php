<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::latestPublished()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.post.create', [
            'categories' => Category::sorted()->get(),
            'tags'       => Tag::sorted()->get(),
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
            'is_published'  => $request->input('is_published'),
        ]);

        $tagIds = $request->input('tag_id');
        $post->tags()->attach($tagIds);

        return redirect()->route('admin.posts.index')
            ->with([
                'action'    => 'success',
                'message'   => "記事ID:{$post->id}を登録しました。",
            ]);
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', [
            'post'       => $post,
            'categories' => Category::sorted()->get(),
            'tags'       => Tag::sorted()->get(),
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title'         => $request->input('title'),
            'content'       => $request->input('content'),
            'category_id'   => $request->input('category_id'),
            'slug'          => $request->input('slug'),
            'published_at'  => $request->input('published_at'),
            'is_published'  => $request->input('is_published'),
        ]);

        $tagIds = $request->input('tag_id');
        $post->tags()->sync($tagIds);

        return redirect()
            ->route('admin.posts.index')
            ->with([
                'action'    => 'updated',
                'message'   => "記事ID:{$post->id}を更新しました。",
            ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with([
                'action'    => 'deleted',
                'message'   => "記事ID:{$post->id}を削除しました。",
            ]);
    }
}
