<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();

        $product = Product::with(['category'])->orderBy('created_at', 'DESC')->get();
        if (request()->q != '') {
            $product = $product->where('name', 'LIKE', '%' . request()->q . '%');
        }

        $product = Product::paginate(5);

        return view('admin.products.index', compact('product', 'category'));
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
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'color' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:png,jpeg,jpg',
            'price' => 'required|integer',
            'material' => 'required',
            'size' => 'required',
            'qty' => 'required|integer',
            'weight' => 'required|integer',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . rand(1,99) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);

            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'color' => $request->color,
                'description' => $request->description,
                'image' => $filename,
                'price' => $request->price,
                'material' => $request->material,
                'size' => $request->size,
                'qty' => $request->qty,
                'weight' => $request->weight,
                'status' => $request->status
            ]);

            return redirect(route('product.index'))->with(['success' => 'Produk Berhasil Ditambah']);
        }
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
        $category = Category::all();
        $product = Product::find($id);

        return view('admin.products.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'color' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpeg,jpg',
            'price' => 'required|integer',
            'material' => 'required',
            'size' => 'required',
            'qty' => 'required|integer',
            'weight' => 'required|integer',
            'status' => 'required'
        ]);

        $product = Product::find($id);
        $filename = $product->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
            File::delete(storage_path('app/public/products/' . $product->image));
        }

        $product->update([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'color' => $request->color,
            'description' => $request->description,
            'image' => $filename,
            'price' => $request->price,
            'material' => $request->material,
            'size' => $request->size,
            'qty' => $request->qty,
            'weight' => $request->weight,
            'status' => $request->status
        ]);

        return redirect(route('product.index'))->with(['success' => 'Produk Berhasil Diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        File::delete(storage_path('app/public/products/' . $product->image));
        $product->delete();

        return redirect(route('product.index'))->with(['success' => 'Produk Berhasil Dihapus']);
    }

    /**
     * MassUpload the specified resource from storage.
     */
    public function massUploadForm()
    {
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.bulk', compact('category'));
    }
}
