<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::sorted()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $inputs = $request->only(['name', 'slug', 'sort_order']);

        $category = Category::create($inputs);

        return redirect()
            ->route('admin.categories.index')
            ->with([
                'action'    => 'success',
                'message'   => "カテゴリーID:{$category->id}を登録しました。",
            ]);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $inputs = $request->only(['name', 'slug', 'sort_order']);

        $category->update($inputs);

        return redirect()
            ->route('admin.categories.index')
            ->with([
                'action'    => 'updated',
                'message'   => "カテゴリーID:{$category->id}を更新しました。",
            ]);
    }

    public function destroy(Category $category)
    {
        if ($category->posts->count() > 0) {
            return redirect()
                ->route('admin.categories.edit', $category)
                ->with([
                    'action'  => 'error',
                    'message' => 'カテゴリに関連する投稿が存在するため、削除できません。'
                ]);
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with([
                'action'    => 'deleted',
                'message'   => "カテゴリーID:{$category->id}を削除しました。",
            ]);
    }
}
