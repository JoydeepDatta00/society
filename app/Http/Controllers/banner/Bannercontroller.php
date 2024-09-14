<?php

namespace App\Http\Controllers\banner;

use App\Models\Banners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
            return redirect()->back()->with([
                'message' => 'Banner updated  successfully ',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => ' Banner image not there ',
                'alert-type' => 'error'
            ]);
        }
    }
    public function deleteBanner($banner_id)
    {
        $decryptId = decryptId($banner_id);

        $banner = Banners::find($decryptId);

        if ($banner) {
            // Delete the event
            Storage::delete($banner->banner_image);
            $banner->delete();

            return redirect()->back()->with([
                'message' => 'Banner Deleted successfully ',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Banner image not found ',
                'alert-type' => 'error'
            ]);
        }
    }
}
