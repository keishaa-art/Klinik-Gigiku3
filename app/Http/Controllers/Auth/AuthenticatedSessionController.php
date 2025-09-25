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
        return view('auth.login-register');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        switch ($user->role) {
            case 'Admin':
                return redirect()->route('admin.dashboard');
            case 'Dokter':
                return redirect()->route('dokter.dashboard');
            case 'Farmasi':
                return redirect()->route('farmasi.dashboard');
            case 'Pasien':
                if (is_null($user->email_verified_at)) {
                    return redirect()->route('verification.otp.form')
                        ->with('info', 'Silakan verifikasi email dengan kode OTP.');
                }
                return redirect()->route('pasien.dashboard');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Role tidak dikenali.']);
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
