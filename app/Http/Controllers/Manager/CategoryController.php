<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        // Slug oluşturulması
        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori Başarıyla Oluşturuldu');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        // Slug güncellenmesi
        $slug = Str::slug($request->name);
        $request->merge(['slug' => $slug]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori Güncellendi');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->withSuccess('Kategori Silindi!');
    }
}
