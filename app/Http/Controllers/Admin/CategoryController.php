<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [

            'categories' => Category::latest()->get()

        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category Created Successfully!');
    }



    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('info', 'Category Updated Successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('error', 'Category Deleted Successfully!');
    }

    public function changestatus(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
}
