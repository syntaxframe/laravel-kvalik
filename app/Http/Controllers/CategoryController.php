<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('pages.admin.category.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        ProductCategory::create([
            'name' => $request['name'],
        ]);
        return redirect(route('admin'));
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('pages.admin.category.edit', ['category' => $category]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->update([
            'name' => $request['name'],
        ]);
        return redirect(route('admin'));
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();
        return redirect(route('admin'));
    }
}
