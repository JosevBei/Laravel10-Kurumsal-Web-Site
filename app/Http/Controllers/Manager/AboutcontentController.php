<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutContent;

class AboutcontentController extends Controller
{
    public function index(){
        $abouts = AboutContent::all();
        return view('admin.about.index',compact('abouts'));
    }

    public function edit(AboutContent $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, AboutContent $about)
    {
        $request->validate([
            'name' => 'max:255|required',
            'content' => 'max:1500|required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // 2MB limit
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/abouts'), $imageName);
            $about->image = $imageName;
        }
    
        $about->name = $request->name;
        $about->content = $request->content;
        $about->save();
    
        return redirect()->route('about.view')->with('success', 'Hakkımızda Güncellendi');
    }
}
