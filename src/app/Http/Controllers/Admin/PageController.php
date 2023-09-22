<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.page.index', [
            'pages' => Page::all(),
        ]);
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(StorePageRequest $request)
    {
        $page = Page::create([
            'title'         => $request->input('title'),
            'content'       => $request->input('content'),
            'slug'          => $request->input('slug'),
            'is_published'  => $request->input('is_published'),
        ]);

        return redirect()->route('admin.pages.index')
            ->with([
                'action'    => 'success',
                'message'   => "固定ページID:{$page->id}を登録しました。",
            ]);
    }

    public function edit(Page $page)
    {
        return view('admin.page.edit', [
            'page'       => $page,
        ]);
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update([
            'title'         => $request->input('title'),
            'content'       => $request->input('content'),
            'slug'          => $request->input('slug'),
            'is_published'  => $request->input('is_published'),
        ]);

        return redirect()
            ->route('admin.pages.index')
            ->with([
                'action'    => 'updated',
                'message'   => "固定ページID:{$page->id}を更新しました。",
            ]);
    }


    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with([
                'action'    => 'deleted',
                'message'   => "固定ページID:{$page->id}を削除しました。",
            ]);
    }
}
