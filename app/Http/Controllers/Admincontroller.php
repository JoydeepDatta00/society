<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

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

}
