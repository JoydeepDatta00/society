<?php

namespace App\Http\Controllers\banner;

use App\Models\Banners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Bannercontroller extends Controller
{
    public function storeBannerImages(Request $request)
    {

        $request->validate([
            'banner_name' => 'required',
            'banner_image' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        $storeBannersImage = $request->file('banner_image')->store('public');
        $storeBanners = Banners::create([
            'banner_name' => $request->banner_name,
            'banner_image' => $storeBannersImage
        ]);
        if ($storeBanners) {
            return redirect()->back()->with('message', 'Banners added successfully!');
        } else {
            return redirect()->back()->with('error', 'banner not found ');
        }
    }
}
