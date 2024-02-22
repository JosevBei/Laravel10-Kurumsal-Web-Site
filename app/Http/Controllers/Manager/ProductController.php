<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        // Kategori verilerini çekmek için
        $categories = \App\Models\Category::all();

        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255|unique:products',
            'description' => 'required',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'weight' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // 2MB limit
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploads/products'), $imageName);

        $slug =  $request['slug'] = Str::slug($request['name']);
        $request->merge(['slug' => $slug]);
    
        $productCode = $this->generateProductCode($request->input('category_id'), $request->input('name'));
        $request->merge(['product_code' => $productCode]);
        

        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id'),
            'image' => $imageName,
            'product_code' => $productCode,
            'length' => $request->get('length'),
            'width' => $request->get('width'),
            'weight' => $request->get('weight'),
            'slug' => $slug,
        ]);

        $product->save();
    
        // Slug oluşturmak için Kategori Adı ve Ürün Adını kullan
    
        return redirect()->route('products.create')->with('success', 'Ürün Başarıyla Oluşturuldu');
    }

    public function edit(Product $product)
    {
        // Kategori verilerini çekmek için
        $categories = \App\Models\Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => [
                'required',
                'max:255',
                Rule::unique('products')->ignore($product->id),
            ],            
            'description' => 'required',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'weight' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // 2MB limit
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imageName;
        }
    

        $slug =  $request['slug'] = Str::slug($request['name']);
        $request->merge(['slug' => $slug]);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->length = $request->length;
        $product->width = $request->width;
        $product->weight = $request->weight;
        $productCode = $this->generateProductCode($request->input('category_id'), $request->input('name'));
        $request->merge(['product_code' => $productCode]);
        $product->slug = $slug;
        $product->product_code = $productCode;
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Ürün Güncellendi');
    }
    

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Ürün Silindi!');
    }

    public function generateProductCode($categoryId, $productName)
    {
        // Kategori adını çek
        $categoryName = Category::find($categoryId)->name;
    
        // Kategori kısaltması
        $categoryAbbreviation = strtoupper(substr($categoryName, 0, 1));
    
        // Ürün adının baş harfi
        $productInitial = strtoupper(substr($productName, 0, 1));
    
        // Rastgele sayı
        $randomNumber = mt_rand(100, 999);
    
        // Ürün kodunu birleştir
        $productCode = '#' . $categoryAbbreviation . $randomNumber . $productInitial;
    
        return $productCode;
    }
    
    
}
