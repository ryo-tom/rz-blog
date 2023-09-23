<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(FilterRequest $request)
    {
        $categorySlug  = $request->input('category');
        $tagSlugs      = $request->input('tag_slugs');
        $tagOption     = $request->input('tag_option');

        $query = Post::with('tags')
        ->published()
        ->filterByCategory($categorySlug)
        ->filterByTags($tagSlugs, $tagOption)
        ->latestPublished();

        $filteredPostCount = $query->count();

        $posts = $query->select('id', 'title', 'slug', 'published_at')
                    ->simplePaginate(30)
                    ->withQueryString();

        return view('front.home', [
            'posts'      => $posts,
            'filteredPostCount' => $filteredPostCount,
            'categories' => Category::sorted()->get(),
            'tags'       => Tag::sorted()->get(),
        ]);
    }

    public function show(string $slug)
    {
        return view('front.post', [
            'post' => Post::published()->withSlug($slug)->firstOrFail(),
        ]);
    }

    /** Ajax for Mobile filter view */
    public function count(FilterRequest $request)
    {
        $categorySlug  = $request->input('category');
        $tagSlugs      = $request->input('tag_slugs');
        $tagOption     = $request->input('tag_option');

        $query = Post::with('tags')
                ->published()
                ->filterByCategory($categorySlug)
                ->filterByTags($tagSlugs, $tagOption);

        $filteredPostCount = $query->count();
        return response()->json(['filteredPostCount' => $filteredPostCount]);
    }

    /** Ajax Search */
    public function search(Request $request)
    {
        $query = $request->get('query');
        $scope = $request->get('scope');

        if(empty($query)) {
            return response()->json(['posts' => []]);
        }

        $postQuery = Post::query()->published();

        switch ($scope) {
            case 'title':
              $postQuery->where('title', 'LIKE', "%{$query}%");
              break;
            case 'content':
              $postQuery->where('content', 'LIKE', "%{$query}%");
              break;
            case 'all':
              $postQuery->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('content', 'LIKE', "%{$query}%");
              });
              break;
            default:
              return response()->json(['error' => 'Invalid search scope'], 400);
          }

          $postQuery->latestPublished();

          $posts = $postQuery->select('title', 'slug')
                             ->limit(30)
                             ->get();

          return response()->json(['posts' => $posts]);
    }

}
