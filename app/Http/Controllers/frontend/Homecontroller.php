<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\Members;
use App\Models\Feedback;
use App\Models\Thumbnail;
use App\Models\Auditorium;
use Illuminate\Http\Request;
use App\Models\Eventsgallery;
use App\Models\Galleryimages;
use App\Models\Auditoriumbooking;
use App\Http\Controllers\Controller;

class Homecontroller extends Controller
{
    public function getMemberData()
    {
        $members = Members::all();
        return view('frontend.home.members', compact('members'));
    }
    public function getEvents()
    {
        $events = Events::all();
        return view('frontend.event.event', compact('events'));
    }
    public function getEventGallery($id)
    {
        $decryptId = decryptId($id);
        $getEvents = Events::find($decryptId);
        $getEventsGallery = Eventsgallery::where('event_id', $decryptId)
            ->get();
        return view('frontend.event.events_gallery', compact('getEvents', 'getEventsGallery'));
    }
    public function getGalleryThumbnail()
    {
        $getGallery = Thumbnail::all();
        return view('frontend.gallery.gallery_thumbnail', compact('getGallery'));
    }
    public function getGalleryImages($id)
    {
        $decryptId = decryptId($id);
        $getGalleryThumbnail = Thumbnail::find($decryptId);
        $getGalleryImages = Galleryimages::where('thumbnail_id', $decryptId)->get();
        return view('frontend.gallery.gallery', compact('getGalleryThumbnail', 'getGalleryImages'));
    }

    public function getAuditoriumServices($auditoriumId)
    {
        // Use the helper function to get services
        $services = getAuditoriumService($auditoriumId);
        return response()->json($services);
    }

    public function getHallsByAuditorium($auditoriumId)
    {
        // Use the helper function to get halls
        $halls = getHallsByAuditoriumId($auditoriumId);
        return response()->json($halls);
    }

    public function getHallSlots($hallId)
    {
        $slots = getHallsByAuditoriumSlots($hallId);
        return response()->json($slots);
    }
    public function bookAuditorium()
    {
        $getAuditotiums = Auditorium::all();
        return view('frontend.registration.book_auditorium', compact('getAuditotiums'));
    }
    public function storeAuditoriumBooking(Request $request)
    {
        $request->validate([
            'name'               => 'required|string',
            'email'              => 'required|email',
            'phone'              => 'required|string|max:12', // Adjust length as needed
            'organization_name' => 'required|string',
            'date'               => 'required|date',
            'choose_auditorium' => 'required|string',
            'auditorium_hall'   => 'required|string',
            'choose_slots'      => 'required|string',
            // 'services'          => 'required|string|max:255',
        ]);


        $today = Carbon::today(); // Get today's date

        // Check if the combination of auditorium_hall and choose_slots is already booked for today
        $existingBooking = Auditoriumbooking::where('auditorium_hall', $request->auditorium_hall)
            ->where('choose_slots', $request->choose_slots)
            ->whereDate('created_at', $today)
            ->exists();

        if ($existingBooking) {
            // Notify user if the slot and hall are already booked for today

            return redirect()->route('book.auditorium')->with('error', 'Slot and hall are already booked for today');
        } else {
            $auditoriumBooking = Auditoriumbooking::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'organization_name' => $request->organization_name,
                'date' => $request->date,
                'choose_auditorium' => $request->choose_auditorium,
                'auditorium_hall' => $request->auditorium_hall,
                'choose_slots' => $request->choose_slots,
                'services' => implode(',', $request->input('services')),
                // 'services' => $request->has('services') ? (is_array($request->services) ? implode(',', $request->services) : $request->services) : null,

            ]);
            if ($auditoriumBooking) {
                return redirect('/thankyou');
            } else {
                return redirect()->back();
            }
        }
    }
    public function storeFeedback(Request $request)
    {

        $storeFeedback = Feedback::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'feedback' => $request->feedback,
        ]);
        if ($storeFeedback) {
            return redirect('/')->with('success', 'Feedback submitted successfully');
        } else {
            return redirect()->back();
        }
    }
}
