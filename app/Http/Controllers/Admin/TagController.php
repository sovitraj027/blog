<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index', [

            'tags' => Tag::latest()->get()

        ]);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(CategoryRequest $request)
    {
        Tag::create($request->validated());

        return redirect()->route('tags.index')->with('success', 'Tag Created Successfully!');
    }



    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(CategoryRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return redirect()->route('tags.index')->with('info', 'Tag Updated Successfully!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('error', 'Tag Deleted Successfully!');
    }

    public function changestatus(Request $request)
    {
    $tag = Tag::find($request->tag_id);
    $tag->status = $request->status;
    $tag->save();

    return response()->json(['success'=>'Status change successfully.']);
    }
}
