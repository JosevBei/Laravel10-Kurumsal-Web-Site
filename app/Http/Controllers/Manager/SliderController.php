<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'max:255|required',
            'description' => 'max:1500|required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // 2MB limit
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads/sliders'), $imageName);
            $slider->image = $imageName;
        }
    
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
    
        return redirect()->route('slider.view')->with('success', 'Slider Güncellendi');
    }
}
