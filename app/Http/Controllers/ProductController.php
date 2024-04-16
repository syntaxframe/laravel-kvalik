<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();
        $products->where('quantity', '>', 0);
        if ($request->has('c') && $request->c) {
            $products->where('category_id', $request->c);
        }
        $products = $products->get();
        $categories = ProductCategory::all();
        return view('pages.catalog', ['products' => $products, 'categories' => $categories]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('pages.product', ['product' => $product]);
    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('pages.admin.product.create', ['categories' => $categories]);
    }

    public function store(CreateProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/products/' . $filename);
        }

        Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'image' => $filename,
            'category_id' => $request['category_id'],
            'quantity' => $request['quantity'],
        ]);
        return redirect(route('admin'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        return view('pages.admin.product.edit', ['categories' => $categories, 'product' => $product]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/products/' . $filename);
            $product->update(['image' => $filename,]);
        }

        $product->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'quantity' => $request['quantity'],
        ]);
        return redirect(route('admin'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route('admin'));
    }
}
