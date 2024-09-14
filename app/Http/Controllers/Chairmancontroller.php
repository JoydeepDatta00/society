<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Slots;
use App\Models\Feedback;
use App\Models\Auditorium;
use Illuminate\Http\Request;
use App\Models\Auditoriumhall;
use App\Models\Auditoriumbooking;
use App\Models\Auditoriumservices;
use App\Http\Controllers\Controller;
use App\Models\Addpromotion;
use App\Models\Promotions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;


class Chairmancontroller extends Controller
{
    public function auditorium()
    {
        $auditoriums = Auditorium::all();
        return view('admin.auditorium.auditorium', compact('auditoriums'));
    }
    public function addAuditorium(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'auditorium_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $auditoriumImages = $request->file('auditorium_image')->store('public');
        $addAuditorium = Auditorium::create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'auditorium_image' => $auditoriumImages,

        ]);

        if ($addAuditorium) {
            return redirect()->back()->with([
                'message' => 'Auditorium Added Successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'failed to add auditorium',
                'alert-type' => 'error'
            ]);
        }
    }
    public function editAuditoium($auditorium_id)
    {

        $auditoriumId = decryptId($auditorium_id);
        $auditoriumHalls = Auditoriumhall::where('auditorium_id', $auditoriumId)->get();
        $auditoriumServices = Auditoriumservices::where('auditorium_id', $auditoriumId)->get();
        $auditoriumSlots = Slots::where('auditorium_id', $auditoriumId)->orderBy('hall_id')->get();
        $auditoriums = Auditorium::find($auditoriumId);
        return view('admin.auditorium.editauditorium', compact('auditoriums', 'auditoriumHalls', 'auditoriumSlots', 'auditoriumServices'));
    }
    public function updateAuditorium(Request $request)
    {
        $updateAuditorium = Auditorium::find($request->auditorium_id);

        if ($request->hasFile('auditorium_image')) {
            // Store the new image
            Storage::delete($updateAuditorium->auditorium_image);
            $updateAuditoriumImage = $request->file('auditorium_image')->store('public');
            $updateAuditorium->update([
                'name' => $request->name,
                'address' => $request->address,
                'description' => $request->description,
                'auditorium_image' => $updateAuditoriumImage,

            ]);
        } else {
            $updateAuditorium->update([
                'name' => $request->name,
                'description' => $request->description,
                'address' => $request->address,


            ]);
        }
        return redirect()->back()->with([
            'message' => 'Auditorium Updated Successfully',
            'alert-type' => 'success'
        ]);
    }
    public function deleteAuditorium($auditorium_id)
    {
        $auditoriumId = decryptId($auditorium_id);
        $deleteAuditorium = Auditorium::find($auditoriumId);

        if ($deleteAuditorium) {
            Storage::delete($deleteAuditorium->auditorium_image);
            $deleteAuditorium->delete();

            return redirect()->back()->with([
                'message' => 'Auditorium data deleted successfully!',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Auditorium data not found',
                'alert-type' => 'error'
            ]);
        }
    }
    public function deleteAuditouriumServices($id)
    {
        $decryptId = decryptId($id);
        $deleteAuditoriumServices = Auditoriumservices::find($decryptId);

        if ($deleteAuditoriumServices) {

            $deleteAuditoriumServices->delete();

            return redirect()->back()->with([
                'message' => 'Auditorium Services deleted successfully!',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Auditorium data not found',
                'alert-type' => 'error'
            ]);
        }
    }
    public function deleteSlots($id)
    {
        $decryptId = decryptId($id);

        $deleteSlots = Slots::find($decryptId);

        if ($deleteSlots) {

            $deleteSlots->delete();

            return redirect()->back()->with([
                'message' => 'Slots deleted successfully!',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Slots data not found',
                'alert-type' => 'error'
            ]);
        }
    }
    public function deleteHalls($id)
    {
        $decryptId = decryptId($id);
        $deleteHall = Auditoriumhall::find($decryptId);


        if ($deleteHall) {

            $deleteHall->delete();

            return redirect()->back()->with([
                'message' => 'Halls deleted successfully!',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Slots data not found',
                'alert-type' => 'error'
            ]);
        }
    }
    public function getHalls($auditoriumId)
    {
        $halls = getHallsByAuditoriumId($auditoriumId);
        return response()->json($halls);
    }
    public function getFeedbacks()
    {
        $feedbacks = Feedback::all();
        return view('admin.registrations.feedbacks', compact('feedbacks'));
    }

    public function getChairmanRegistration()
    {
        $bookings = Auditoriumbooking::all();
        return view('admin.registrations.registrations', compact('bookings'));
    }
    public function getChairmanRegistrationsDetails($registration_id)
    {
        $decryptKey = decryptId($registration_id);
        $getBookingDetails = Auditoriumbooking::find($decryptKey);
        $promotionalDetails = Addpromotion::where('booking_id', $decryptKey)->get();
        // dd($promotionalDetails);
        return view('admin.registrations.full-registrations', compact('getBookingDetails', 'promotionalDetails'));
    }

    public function bannerPromotion()
    {
        $promotion = Promotions::all();
        return view('admin.registrations.add_promotion', compact('promotion'));
    }
    public function storeBannerPromotion(Request $request)
    {
        $request->validate([
            'promotion_images' => 'mimes:png,jpg,jpeg|max:4000',
        ]);
        $storageImage = $request->file('promotion_images')
            ? $request->file('promotion_images')->store('public')
            : null;

        $addPromotions = Promotions::create([
            'promotion_images' => $storageImage,
            'iframe_links' => $request->iframe_links,
        ]);
        if ($addPromotions) {
            return redirect()->back()
                ->with([
                    'message' => 'data added successfully!',
                    'alert-type' => 'success'
                ]);
        }
    }
    public function deleteBannerPromotion($promotion_id)
    {
        $decryptId = decryptId($promotion_id);
        $promotion = Promotions::find($decryptId);

        if ($promotion) {
            if (!empty($promotion->promotion_images) && Storage::exists($promotion->promotion_images)) {
                // If it's a valid file path, delete it
                Storage::delete($promotion->promotion_images);
            }

            // Storage::delete($promotion->promotion_images);

            $promotion->delete();

            return redirect()->back()->with([
                'message' => 'Data deleted successfully!',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Data data not found',
                'alert-type' => 'error'
            ]);
        }
    }
}
