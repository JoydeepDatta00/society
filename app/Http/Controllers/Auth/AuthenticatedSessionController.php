<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));

        $roleType = $request->input('role_type');
        if (Auth::user()->role_type === $roleType) {
            $request->session()->regenerate();
            if ($roleType === 'chairman') {
                return redirect()->route('chairman.dashboard');
            } elseif ($roleType === 'user') {
                return redirect()->route('user.profile');
            } elseif ($roleType === 'manager') {
                return redirect()->route('manager.dashboard');
            } else {
                // Handle other roles or default redirect
                // return redirect()->route('default.dashboard');
                return redirect('/');
            }
        } else {
            // Deny login
            Auth::logout();
            return back()->withErrors(['email' => 'You do not have the required role to log in.']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
