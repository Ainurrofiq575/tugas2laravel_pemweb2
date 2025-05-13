<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        // Ambil semua produk dengan kategori terkait menggunakan eager loading
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    // Menampilkan form untuk menambahkan produk baru
    public function create()
    {
        // Ambil semua kategori untuk dropdown kategori produk
        $categories = ProductCategory::all();
        return view('products.create', compact('categories'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'product_category_id' => 'required|exists:product_categories,id', // Pastikan kategori ada
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image_url' => 'nullable|image|max:2048', // Validasi gambar
        ]);

        // Menyimpan produk baru
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_category_id' => $request->product_category_id,
            'image_url' => $request->hasFile('image_url') ? $request->file('image_url')->store('products', 'public') : null, // Menyimpan gambar jika ada
            'is_active' => true,
        ]);

        // Redirect ke halaman produk setelah berhasil menambah produk
        return redirect()->route('products.index')->with('successMessage', 'Product added successfully!');
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        // Ambil semua kategori untuk dropdown kategori produk
        $categories = ProductCategory::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Mengupdate produk
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id, // Mengecualikan slug produk yang sama
            'product_category_id' => 'required|exists:product_categories,id', // Pastikan kategori ada
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image_url' => 'nullable|image|max:2048', // Validasi gambar
        ]);

        // Update data produk
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_category_id' => $request->product_category_id,
            'image_url' => $request->hasFile('image_url') ? $request->file('image_url')->store('products', 'public') : $product->image_url, // Update gambar jika ada
        ]);

        // Redirect ke halaman produk setelah berhasil memperbarui produk
        return redirect()->route('products.index')->with('successMessage', 'Product updated successfully!');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        // Hapus produk dari database
        $product->delete();

        // Redirect ke halaman produk setelah berhasil menghapus produk
        return redirect()->route('products.index')->with('successMessage', 'Product deleted successfully!');
    }
}