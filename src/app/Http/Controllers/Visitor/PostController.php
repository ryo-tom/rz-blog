<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
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

    public function show(string $slug)
    {
        return view('front.post', [
            'post' => Post::where('slug', $slug)->first(),
        ]);
    }

    public function filter(FilterRequest $request)
    {
        $categorySlug  = $request->input('category_slug');
        $tagSlugs      = $request->input('tag_slugs');
        $tagOption     = $request->input('tag_option');

        $posts = Post::query();

        if (!is_null($categorySlug)) {
            $posts = $posts->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if (!is_null($tagSlugs) && $tagOption == 'or') {
            $posts = $posts->whereHas('tags', function ($q) use ($tagSlugs) {
                $q->whereIn('slug', $tagSlugs);
            });
        } elseif (!is_null($tagSlugs) && $tagOption == 'and') {
            foreach ($tagSlugs as $tagSlug) {
                $posts = $posts->whereHas('tags', function ($q) use ($tagSlug) {
                    $q->where('slug', $tagSlug);
                });
            }
        }

        return view('front.home', [
            'categories'    => Category::orderByRaw('ISNULL(`sort_order`), `sort_order` ASC')->get(),
            'tags'          => Tag::orderByRaw('ISNULL(`sort_order`), `sort_order` ASC')->get(),
            'posts'         => $posts->where('is_published', true)->orderBy('created_at', 'DESC')->get(),
            'queries'       => $request->query(),
            'result'        => $posts->count(),
        ]);
    }
}
