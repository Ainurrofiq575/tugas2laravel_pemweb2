<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductCategory::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $categories = $query->latest()->get();

        return view('dashboard.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:product_categories,slug',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'slug', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        ProductCategory::create($data);

        return redirect()->route('categories.index')->with('successMessage', 'Category added successfully!');
    }

    public function edit(ProductCategory $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:product_categories,slug,' . $category->id,
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'slug', 'description');

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::delete('public/' . $category->image);
            }

            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('successMessage', 'Category updated successfully!');
    }

    public function destroy(ProductCategory $category)
    {
        if ($category->image) {
            Storage::delete('public/' . $category->image);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('successMessage', 'Category deleted successfully!');
    }
}
