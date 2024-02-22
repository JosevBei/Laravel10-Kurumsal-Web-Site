<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs=Catalog::orderBy('created_at','asc')->get();
        return view('admin.catalog.index',compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('catalog.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catalogs=Catalog::findOrFail($id);
        return view('admin.catalog.edit',compact('catalogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'=>'image|mimes:pdf',
        ]);
        $catalogs=Catalog::findOrFail($id);

        if($request->hasFile('pdf')){
            $imageName='catalog'.'mosaiclamp'.'.'.$request->pdf->getClientOriginalExtension();
            $request->pdf->move(public_path('uploads'),$imageName);
            $catalogs->pdf='/uploads/'.$imageName;
        }
        $catalogs->save();
        return redirect()->route('catalog.index')->with('success','Katalog Başarılı Bir Şekilde Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */

}
