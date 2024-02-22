<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    public function index()
    {
        $siteSettings = SiteSettings::firstOrCreate([]);

        return view('admin.site_settings.index', compact('siteSettings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'site_phone' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'instagram_url' => 'nullable|string',
            'facebook_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'pinterest_url' => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
            'site_email' => 'nullable|email',
            'site_address' => 'nullable|string',
            'maintenance_mode' => 'nullable|boolean',
            'theme_color' => 'nullable|string',
        ]);
    
        $siteSettings = SiteSettings::firstOrNew();
    
        $siteSettings->site_title = $request->input('site_title');
        $siteSettings->site_description = $request->input('site_description');
        $siteSettings->phone_number = $request->input('phone_number');
        $siteSettings->instagram = $request->input('instagram');
        $siteSettings->facebook = $request->input('facebook');
        $siteSettings->twitter = $request->input('twitter');
        $siteSettings->pinterest = $request->input('pinterest');
        $siteSettings->whatsapp_number = $request->input('whatsapp_number');
        $siteSettings->email_address = $request->input('email_address');
        $siteSettings->address = $request->input('address');
        $siteSettings->maintenance_mode = $request->has('maintenance_mode');
        $siteSettings->theme_color = $request->input('theme_color');
    
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $siteSettings->logo = $logoPath;
        }
    
        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('favicons', 'public');
            $siteSettings->favicon = $faviconPath;
        }
    
        $siteSettings->save();
    
        return redirect()->back()->with('success', 'Site ayarları başarıyla güncellendi.');
    }
    

    protected function uploadImage($file, $folder)
    {
        $path = $file->storeAs($folder, $file->hashName(), 'public');

        return Storage::url($path);
    }
}