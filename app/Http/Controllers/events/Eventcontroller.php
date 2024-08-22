<?php

namespace App\Http\Controllers\events;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\Eventsgallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class Eventcontroller extends Controller
{
    public function Events()
    {
        $events = Events::all();
        return view('admin.events.event', compact('events'));
    }
    public function createEvents(Request $request)
    {
        $request->validate([
            'event_name' => 'required',
            // 'events_thumbnail'=>'required',
            'event_description' => 'required',
            'event_date' => 'required',
            'event_thumbnail_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $storeEventsImage = $request->file('event_thumbnail_image')->store('public');
        $storeEvents = Events::create([
            'event_name' => $request->event_name,
            'event_thumbnail_image' => $storeEventsImage,
            'event_description' => $request->event_description,
            'event_date' => $request->event_date,
        ]);
        $notification = array(
            'message' => ' Events is created ',
            'alert-type' => 'success'
        );

        if ($storeEvents) {
            return redirect()->route('admin.events')->with($notification);
        } else {

            $errorNotification = array(
                'message' => 'Event creation is failed',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($errorNotification);
        }
    }
    public function editEvents($event_id)
    {
        $decryptId = decryptId($event_id);

        $editEvent = Events::find($decryptId);
        return view('admin.events.editevent', compact('editEvent'));
    }
    public function updateEvents(Request $request)
    {
        $request->validate([
            'events_thumbnail_image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $eventUpdate = Events::find($request->id);



        if ($request->hasFile('events_thumbnail_image')) {
            // Store the new image
            Storage::delete($eventUpdate->events_thumbnail_image);
            $storeEventsImage = $request->file('event_thumbnail_image')->store('public');

            $eventUpdate->update([
                'event_name' => $request->event_name,
                'event_thumbnail' => $storeEventsImage,
                'event_description' => $request->event_description,
                'event_date' => $request->event_date,
            ]);
        } else {
            // Update the event without changing the image
            $eventUpdate->update([
                'event_name' => $request->event_name,
                'event_description' => $request->event_description,
                'event_date' => $request->event_date,
            ]);
        }
        $notification = array(
            'message' => ' Events is created ',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.events')->with($notification);
    }
    public function deleteEvents($event_id)
    {
        $decryptId = decryptId($event_id);
        $event = Events::find($decryptId);



        if ($event) {
            // Delete the event
            Storage::delete($event->events_thumbnail_image);
            $event->delete();
            $eventId = $event->id;

            // Delete the associated gallery images
            $galleryImages = Eventsgallery::where('event_id', $eventId)->get();


            foreach ($galleryImages as $galleryImage) {
                Storage::delete($galleryImage->events_gallery_image);
                $galleryImage->delete();
            }


            return redirect()->route('admin.events')->with('message', 'Event deleted successfully!');
        } else {
            return redirect()->back('admin.events')->with('error', 'Event not found!');
        }
    }

    //event gallery
    public function addEventsImage($event_id)
    {

        $decryptId = decryptId($event_id);
        $eventId = Events::find($decryptId);
        $addEventsImages = Eventsgallery::where('event_id', $decryptId)->get();
        return view('admin.events.addeventimages', compact('addEventsImages', 'eventId'));
    }

    public function addEventImagesArray(Request $request)
    {
        $eventImage = $request->file('events_gallery_image');
        foreach ($eventImage as $images) {
            $storeGalleryImage = $images->store('public');

            $storeImages = Eventsgallery::create([
                'event_id' => $request->event_id,
                'events_gallery_image' => $storeGalleryImage,
            ]);
        }
        if ($storeImages) {
            $notification = array(
                'message' => ' Events gallery image is created ',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.events')->with($notification);
        } else {
            $errorNotification = array(
                'message' => 'Event creation is failed',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($errorNotification);
        }
    }
    public function deleteEventsGallery($event_id)
    {
        $galleryImages = Eventsgallery::find($event_id);
        if ($galleryImages) {
            // Delete the event
            Storage::delete($galleryImages->events_gallery_image);
            $galleryImages->delete();

            return redirect()->route('admin.events')->with('message', 'Event Gallery deleted successfully!');
        } else {
            return redirect()->route('admin.events')->with('error', 'Event not found!');
        }
    }
}
