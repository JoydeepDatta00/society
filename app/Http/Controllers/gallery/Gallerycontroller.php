<?php

namespace App\Http\Controllers\gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galleryimages;
use App\Models\Thumbnail;
use Illuminate\Support\Facades\Storage;

class Gallerycontroller extends Controller
{
    public function Thumbnails()
    {
        $thumbnail = Thumbnail::all();
        return view('admin.gallery.thumbnail', compact('thumbnail'));
    }
    public function createThumbnails(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gallery_thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $storeThumbnailImage = $request->file('gallery_thumbnail')->store('public');
        $storeThumbnails = Thumbnail::create([
            'name' => $request->name,
            'gallery_thumbnail' => $storeThumbnailImage,
        ]);
        $notification = array(
            'message' => ' gallery thumbnail is created ',
            'alert-type' => 'success'
        );

        if ($storeThumbnails) {
            return redirect()->route('admin.thumbnail')->with($notification);
        } else {

            $errorNotification = array(
                'message' => 'Event creation is failed',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($errorNotification);
        }
    }
    public function editThumbnails($thumbnail_id)
    {
        $decryptID = decryptId($thumbnail_id);

        $editThumbnail = Thumbnail::find($decryptID);
        return view('admin.gallery.editthumbnail', compact('editThumbnail'));
    }
    public function updateThumbnail(Request $request)
    {
        $request->validate([
            'gallery_thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $updateThumbnail = Thumbnail::find($request->id);

        if ($request->hasFile('gallery_thumbnail')) {
            // Store the new image
            Storage::delete($updateThumbnail->gallery_thumbnail);
            $storeEvThumbnailImage = $request->file('gallery_thumbnail')->store('public');

            $updateThumbnail->update([
                'name' => $request->name,
                'events_thumbnail' => $storeEvThumbnailImage,

            ]);
        } else {
            // Update the event without changing the image
            $updateThumbnail->update([
                'name' => $request->name,

            ]);
        }
        $notification = array(
            'message' => ' Thumbnail is updated ',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.thumbnail')->with($notification);
    }
    public function deleteThumbnail($thumbnail_id)
    {
        $thumbnails = Thumbnail::find($thumbnail_id);



        if ($thumbnails) {
            // Delete the event
            Storage::delete($thumbnails->events_thumbnail_image);
            $thumbnails->delete();
            $ThumbnailId =  $thumbnails->id;

            // Delete the associated gallery images
            $galleryImages = Galleryimages::where('thumbnail_id', $ThumbnailId)->get();


            foreach ($galleryImages as $galleryImage) {
                Storage::delete($galleryImage->gallery_image);
                $galleryImage->delete();
            }
            return redirect()->route('admin.thumbnail')->with('message', 'Event deleted successfully!');
        } else {
            return redirect()->back('admin.thumbnail')->with('error', 'Event not found!');
        }
    }

    //    //event gallery
    public function addGalleryImage($thumbnail_id)
    {
        $decryptID = decryptId($thumbnail_id);


        $thumbnailId = Thumbnail::find($decryptID);

        $addgalleryImages = Galleryimages::where('thumbnail_id', $decryptID)->get();

        return view('admin.gallery.maingallery', compact('addgalleryImages', 'thumbnailId'));
    }



    public function addGalleryImagesArray(Request $request)
    {

        // $request->validate([
        //      'gallery_image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        $galleryImage = $request->file('gallery_image');


        foreach ($galleryImage as $images) {
            $storeGalleryImage = $images->store('public');

            $storeImages = Galleryimages::create([
                'thumbnail_id' => $request->thumbnail_id,
                'name' => $request->name,
                'gallery_image' => $storeGalleryImage,
            ]);
        }
        if ($storeImages) {
            $notification = array(
                'message' => ' Gallery image is created ',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.thumbnail')->with($notification);
        } else {
            $errorNotification = array(
                'message' => 'Event creation is failed',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($errorNotification);
        }
    }
    public function deleteGallery($gallery_id)
    {
        $decryptID = decryptId($gallery_id);
        $galleryImages = Galleryimages::find($decryptID);


        if ($galleryImages) {
            // Delete the event
            Storage::delete($galleryImages->gallery_image);
            $galleryImages->delete();


            // Delete the associated gallery image
            return redirect()->route('admin.thumbnail')->with('message', 'Event Gallery deleted successfully!');
        } else {
            return redirect()->route('admin.thumbnail')->with('error', 'Event not found!');
        }
    }
}
