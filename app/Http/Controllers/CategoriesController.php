<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = categories::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $categories = $query->latest()->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoriesRequest $request)
    {
        $validated = $request->validated();
        categories::create($validated);

        return redirect()->route('categories.index')->with('successMessage', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        return view('categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $categories)
    {
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoriesRequest $request, categories $categories)
    {
        $validated = $request->validated();
        $categories->update($validated);

        return redirect()->route('categories.index')->with('successMessage', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories)
    {
        $categories->delete();

        return redirect()->route('categories.index')->with('successMessage', 'Category deleted successfully.');
    }
}
