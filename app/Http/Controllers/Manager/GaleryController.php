<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeries = Gallery::all();
        return view('admin.galery.index',compact('galeries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kategori verilerini çekmek için
        $galeries = Gallery::all();

        return view('admin.galery.create', compact('galeries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // 2GB limit
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploads/galeries'), $imageName);

        

        $galery = new Gallery([
            'title' => $request->get('title'),
            'image' => $imageName,
        ]);

        $galery->save();
    
        // Slug oluşturmak için Kategori Adı ve Ürün Adını kullan
    
        return redirect()->route('galeries.index')->with('success', 'Fotoğraf Başarıyla Oluşturuldu');
    }

    public function edit(Gallery $galery)
    {

        return view('admin.galery.edit',compact('galery'));
    }

    public function update(Request $request, Gallery $galery)
    {
        $request->validate([      
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // 2MB limit
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/galeries'), $imageName);
            $galery->image = $imageName;
        }
    
        $galery->title = $request->title;
        $galery->save();
    
        return redirect()->route('galeries.index')->with('success', 'Fotoğraf Güncellendi');
    }
    public function destroy(Gallery $galery)
    {
        $galery->delete();
        return redirect()->route('galeries.index')->withSuccess('Fotoğraf Silindi!');
    }
}
