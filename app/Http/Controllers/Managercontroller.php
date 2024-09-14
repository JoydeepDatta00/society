<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Slots;
use App\Models\Auditorium;
use App\Models\Addpromotion;
use Illuminate\Http\Request;
use App\Models\Auditoriumhall;
use App\Models\Auditoriumbooking;
use App\Models\Auditoriumservices;
use Illuminate\Support\Facades\Auth;

class Managercontroller extends Controller
{

    public function auditoriumServices()
    {
        $userID = Auth::user()->id;
        $getUserId = User::where('id', $userID)->pluck('auditorium_id');

        $auditoriumData = Auditorium::where('id', $getUserId)->first();
        // dd($auditoriumData);


        return view('admin.auditorium.auditorium_services', compact('auditoriumData'));
    }
    public function createAuditoriumServices(Request $request)
    {
        $request->validate([
            'services_name' => 'required',
            'auditorium_id' => 'required',
            'service_note' => 'required',
            'service_cost' => 'required'
        ]);
        $createServices = Auditoriumservices::create([
            'services_name' => $request->services_name,
            'auditorium_id' => $request->auditorium_id,
            'service_note' => $request->service_note,
            'service_cost' => $request->service_cost,
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

    //=================================auditorium Slots========
    public function auditoriumSlots()
    {
        $userID = Auth::user()->id;
        $getUserId = User::where('id', $userID)->pluck('auditorium_id');

        $auditoriumData = Auditorium::where('id', $getUserId)->first();

        return view('admin.auditorium.auditorium_slots', compact('auditoriumData'));
    }
    public function createAuditoriumSlots(Request $request)
    {
        $request->validate([
            'auditorium_id' => 'required'
        ]);
        $choosedHall = $request->input('hall_id');
        $slotsTime = $request->start_time . ' - ' . $request->end_time;

        $existingSlot = Slots::where('auditorium_id', $request->auditorium_id)
            ->where('hall_id', $choosedHall)
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

    // auditorium hall
    public function auditoriumHall()
    {
        $userID = Auth::user()->id;
        $getUserId = User::where('id', $userID)->pluck('auditorium_id');

        $auditoriumData = Auditorium::where('id', $getUserId)->first();
        return view('admin.auditorium.auditoriumhall', compact('auditoriumData'));
    }
    public function storeAuditoriumHall(Request $request)
    {
        $request->validate([
            'seating_capacity' => 'required',
            'auditorium_hall_name' => 'required',
        ]);

        $auditoriumHall = Auditoriumhall::create([
            'auditorium_id' => $request->auditorium_id,
            'auditorium_hall_name' => $request->auditorium_hall_name,
            'seating_capacity' => $request->seating_capacity,

        ]);
        if ($auditoriumHall) {
            return redirect()->back()->with(['message' => 'auditorium hall created successfully!', 'alert-type' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'auditorium hall  not found!', 'alert-type' => 'error']);
        }
    }

    public function updateBookingStatus(Request $request)
    {

        $requestId = $request->input('booking_id');

        $requestStatus = $request->input('allowed_status');

        try {
            $updateStatusBooking = Auditoriumbooking::find($requestId);
            if ($updateStatusBooking) {
                $updateStatusBooking->allowed_status = $requestStatus;
                $updateStatusBooking->save();

                return redirect()->back()->with([
                    'message' => 'Booking approved successfully!',
                    'alert-type' => 'success'
                ]);
            } else {
                return redirect()->back()->with([
                    'message' => 'Booking data not found',
                    'alert-type' => 'error'
                ]);
            }
        } catch (\Exception $e) {
            // Log the error and return a error message
            return redirect()->back()->with([
                'message' => 'An error occurred while updating the booking status',
                'alert-type' => 'error'
            ]);
        }
    }
    public function getRegistrations()
    {
        $bookings = Auditoriumbooking::all();
        return view('manager.registrations.registrations', compact('bookings'));
    }
    public function getRegistrationsDetails($registration_id)
    {
        $decryptKey = decryptId($registration_id);
        $getBookingDetails = Auditoriumbooking::find($decryptKey);
        $userPromotionalDetails = Addpromotion::where('booking_id', $decryptKey)->get();

        return view('manager.registrations.full-registrations', compact('getBookingDetails', 'userPromotionalDetails'));
    }
}
