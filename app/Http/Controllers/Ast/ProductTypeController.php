<?php

namespace App\Http\Controllers\Ast;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ast\ProductType;

class ProductTypeController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();
        return view('ast.product_types.index', compact('productTypes'));
    }

    public function create()
    {
        return view('ast.product_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        ProductType::create($request->all());

        return redirect()->route('product-types.index')->with('success', 'Ürün cinsi başarıyla eklendi.');
    }

    public function edit(ProductType $productType)
    {
        return view('ast.product_types.edit', compact('productType'));
    }

    public function update(Request $request, ProductType $productType)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $productType->update($request->all());

        return redirect()->route('product-types.index')->with('success', 'Ürün cinsi başarıyla güncellendi.');
    }

    public function destroy(ProductType $productType)
    {
        // Eğer ürün tipine ait Excel verileri varsa, bunları sil
        if ($productType->excelData()->exists()) {
            $productType->excelData()->delete();
        }
    
        // Ürün tipini sil
        $productType->delete();
    
        return redirect()->route('product-types.index')->with('success', 'Ürün cinsi başarıyla silindi.');
    }
    
}
