<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::orderByRaw('ISNULL(`sort_order`), `sort_order` ASC')->get(),
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
            ->route('admin.category.index')
            ->with([
                'category_id' => "カテゴリーID:{$category->id}",
                'stored'      => 'を登録しました。',
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
            ->route('admin.category.index')
            ->with([
                'category_id' => "カテゴリーID:{$category->id}",
                'updated'     => 'を更新しました。',
            ]);
    }
}
