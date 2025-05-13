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
        'image_url' => 'nullable|url', // Tambahkan validasi URL gambar
    ]);

    // Ambil data yang diperlukan
    $data = $request->only('name', 'slug', 'description');

    // Cek jika ada image URL dan tambahkan ke data
    if ($request->filled('image_url')) {
        $data['image'] = $request->image_url;
    }

    // Buat kategori baru dan simpan
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
        'image_url' => 'nullable|url',
    ]);

    // Ambil data input
    $data = $request->only('name', 'slug', 'description');

    // Jika ada input image_url, gunakan itu. Jika tidak, pakai yang lama.
    $data['image'] = $request->filled('image_url')
        ? $request->input('image_url')
        : $category->image;

    // Update kategori
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
