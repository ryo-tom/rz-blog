<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
