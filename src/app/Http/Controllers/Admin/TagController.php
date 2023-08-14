<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTagRequest;
use App\Http\Requests\Admin\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index', ['tags' => Tag::all()]);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(StoreTagRequest $request)
    {
        $inputs = $request->only(['name', 'slug', 'sort_order']);

        $tag = Tag::create($inputs);

        return redirect()
            ->route('admin.tag.index')
            ->with([
                'tag_id' => "タグID:{$tag->id}",
                'stored' => 'を登録しました。',
            ]);
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', ['tag' => $tag]);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $inputs = $request->only(['name', 'slug', 'sort_order']);

        $tag->update($inputs);

        return redirect()
            ->route('admin.tag.index')
            ->with([
                'tag_id'  => "タグID:{$tag->id}",
                'updated' => 'を更新しました。',
            ]);
    }
}
