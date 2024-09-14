<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Auditorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class Admincontroller extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }


    public function Edit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin-profile', compact('editData'));
    }
    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $data = User::find(Auth::id());
            $data->password = bcrypt($request->newpassword);
            $data->save();
            session()->flash('message', 'password updated successfully ');
            return redirect()->back();
        } else {
            session()->flash('message', 'old password is not match');
            return redirect()->back();
        }
    }
    ///============create manager=======

    public function createManager(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8', // Minimum length of 8 characters
                // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],

        ]);
        $existingAuditorium = User::where('auditorium_id', $request->auditorium_id)->exists();

        $userData = new User;
        $userData->name = $request->name;
        $userData->email = strtolower($request->email);
        $userData->role_type = $request->role_type;
        $userData->auditorium_id = $request->auditorium_id;
        $userData->password = Hash::make($request->password);
        $userData->phone_number = $request->phone_number;

        if ($existingAuditorium) {
            return redirect()->back()->with([
                'message' => 'Auditorium manager  already created',
                'alert-type' => 'error'
            ]);
        } else {
            $userData->save();
            return redirect()->back()->with([
                'message' => 'Manager created Successfully',
                'alert-type' => 'success'
            ]);
        }
    }
    public function createUser(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8', // Minimum length of 8 characters
                // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],

        ]);


        $userData = new User;
        $userData->name = $request->name;
        $userData->email = strtolower($request->email);
        $userData->role_type = 'user';
        $userData->password = Hash::make($request->password);
        $userData->phone_number = $request->phone_number;
        $userData->organization_name = $request->organization_name;
        // Dump the data before saving
        $userData->save();

        event(new Registered($userData));

        Auth::login($userData);
        if ($userData->role_type === 'user') {
            return redirect()->route('user.profile');
        } else {
            return redirect('/');
        }
    }
    public function editManager($manager_id)
    {
        $decryptId = decryptId($manager_id);
        $manager = User::find($decryptId);


        return view('admin.createmanager.edit_manager', compact('manager'));
    }
    public function  updateManager(Request $request)
    {
        $userData = User::find($request->manager_id);
        $userData->name = $request->name;
        $userData->email = strtolower($request->email);
        $userData->role_type = $request->role_type;
        $userData->auditorium_id = $request->auditorium_id;
        // $userData->password = Hash::make($request->password);
        if ($request->filled('password')) {
            $userData->password = Hash::make($request->password);
        }
        $userData->phone_number = $request->phone_number;


        if ($userData->save()) {
            return redirect('/create-manager')->with([
                'message' => 'data upadted successfully ',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'please check all the field again ',
                'alert-type' => 'error'
            ]);
        }
    }
    public function deleteManager($manager_id)
    {
        $decryptId = decryptId($manager_id);
        $deleteManager = User::find($decryptId);
    }
}
