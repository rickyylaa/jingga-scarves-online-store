<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::with(['parent'])->orderBy('id', 'DESC');
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        $category = Category::paginate(5);

        return view('admin.categories.index', compact('category', 'parent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories',
        ]);

        $request->request->add(['slug' => $request->name]);
        Category::create($request->except('_token'));
        return redirect(route('category.index'))->with(['success' => 'Category Added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();

        return view('admin.categories.edit', compact('category', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories,name,' . $id,
        ]);

        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'slug' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect(route('category.index'))->with(['success' => 'Category Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::withCount(['child'])->find($id);
        if ($category->child_count == 0) {
            $category->delete();
            return redirect(route('category.index'))->with(['success' => 'Category Deleted Successfully']);
        }
        return redirect(route('category.index'))->with(['error' => 'This Category Has SubCategories or Products']);
    }
}
