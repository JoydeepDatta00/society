<?php

namespace App\Http\Controllers\member;

use App\Models\Members;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Membercontroller extends Controller
{

    public function storeMemberData(Request $request)
    {

        $request->validate([
            'member_name' => 'required',
            'member_email' => 'required',
            'member_designation' => 'required',
            'member_phone_no' => 'required',
            'member_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $membersImages = $request->file('member_image')->store('public');
        $storeMemberData = Members::create([
            'member_name' => $request->member_name,
            'member_email' => $request->member_email,
            'member_phone_no' => $request->member_phone_no,
            'member_designation' => $request->member_designation,
            'member_description' => $request->member_description,
            'member_image' => $membersImages,
        ]);
        if ($storeMemberData) {
            return redirect()->back()->with([
                'message' => 'Member  Added Successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'failed to store members data',
                'alert-type' => 'error'
            ]);
        }
    }
    public function editMemberData($id)
    {
        $decryptId = decryptId($id);
        $editMemberData = Members::find($decryptId);
        return view('admin.members.editmembers', compact('editMemberData'));
    }
    public function updateMemberData(Request $request)
    {
        $updateMemberData = Members::find($request->id);
        if ($request->hasFile('member_image')) {
            // Store the new image
            Storage::delete($updateMemberData->member_image);
            $updatemembersImage = $request->file('member_image')->store('public');
            $updateMemberData->update([
                'member_name' => $request->member_name,
                'member_email' => $request->member_email,
                'member_phone_no' => $request->member_phone_no,
                'member_description' => $request->member_designation,
                'member_image' => $updatemembersImage,
            ]);
        } else {
            $updateMemberData->update([
                'member_name' => $request->member_name,
                'member_email' => $request->member_email,
                'member_phone_no' => $request->member_phone_no,
                'member_description' => $request->member_designation,

            ]);
        }

        return redirect()->route('admin.addmember')->with([
            'message' => 'Auditorium Updated Successfully',
            'alert-type' => 'success'
        ]);
    }
}
