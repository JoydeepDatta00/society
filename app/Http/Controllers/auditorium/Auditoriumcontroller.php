<?php

namespace App\Http\Controllers\auditorium;

use App\Models\Slots;
use App\Models\Feedback;
use App\Models\Auditorium;
use Illuminate\Http\Request;
use App\Models\Auditoriumhall;
use App\Models\Auditoriumbooking;
use App\Models\Auditoriumservices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class Auditoriumcontroller extends Controller
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
        $auditoriumSlots = Slots::where('auditorium_id', $auditoriumId)->get();
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
    //====================Auditorium Services============
    public function auditoriumServices()
    {
        $auditoriumData = Auditorium::all();
        return view('admin.auditorium.auditorium_services', compact('auditoriumData'));
    }
    public function createAuditoriumServices(Request $request)
    {
        $request->validate([
            'services_name' => 'required',
            'auditorium_id' => 'required',
            'service_note'=>'required',
            'service_cost'=>'required'
        ]);
        $createServices = Auditoriumservices::create([
            'services_name' => $request->services_name,
            'auditorium_id' => $request->auditorium_id,
            'service_note'=>$request->service_note,
            'service_cost'=>$request->service_cost,
        ]);
        if ($createServices) {
            return redirect()->back()->with(['message' => 'Auditorium Services created successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Auditorium Services not found', 'alert-type' => 'error']);
        }
    }
        public function editAuditoriumServices($id)
    {
        $suditoriumId = decryptId($id);
        $editServices = Auditoriumservices::find($id);
        return view('admin.auditorium.edit_auditorium_services', compact('editServices'));
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
    //=================================auditorium Slots========
    public function auditoriumSlots()
    {
        $auditoriumData = Auditorium::all();

        return view('admin.auditorium.auditorium_slots', compact('auditoriumData'));
    }
    public function createAuditoriumSlots(Request $request)
    {
        $request->validate([
            'auditorium_id' => 'required'
        ]);
        $slotsTime = $request->start_time . ' - ' . $request->end_time;

        $existingSlot = Slots::where('auditorium_id', $request->auditorium_id)
            ->where('slots_time', $slotsTime)
            ->whereDate('created_at', now()->toDateString())
            ->get();

        if (count($existingSlot) > 0) {
            return redirect()->back()->with(['message' => 'Same slot time exists on this date, please enter another slot.', 'alert-type' => 'error']);
        } else {
            $addAuditoriumSlots = Slots::create([
                'slots_time' => $slotsTime,
                'hall_id' => $request->hall_id,
                'auditorium_id' => $request->auditorium_id,
            ]);
            if ($addAuditoriumSlots) {

                return redirect()->back()->with(['message' => 'Slots created successfully!', 'alert-type' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'slots not found', 'alert-type' => 'error']);
            }
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
    // auditorium hall
    public function auditoriumHall()
    {
        $auditoriumData = Auditorium::all();
        return view('admin.auditorium.auditoriumhall', compact('auditoriumData'));
    }
    public function storeAuditoriumHall(Request $request)
    {
        $request->validate([
             'seating_capacity'=>'required',
             'auditorium_hall_name'=>'required',
        ]);

        $auditoriumHall = Auditoriumhall::create([
            'auditorium_id' => $request->auditorium_id,
            'auditorium_hall_name' => $request->auditorium_hall_name,
             'seating_capacity'=>$request-> seating_capacity,
            
        ]);
        if ($auditoriumHall) {
            return redirect()->back()->with(['message' => 'auditorium hall created successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'auditorium hall  not found!', 'alert-type' => 'error']);
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
    //get dynamic data

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
    public function getRegistrations()
    {
        $bookings = Auditoriumbooking::all();
        return view('admin.registrations.registrations', compact('bookings'));
    }
}
