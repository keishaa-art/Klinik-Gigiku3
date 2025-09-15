<?php

use Illuminate\Http\Request;
use App\Mail\EmailVerificationOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CabangController;
use App\Http\Controllers\Farmasi\ObatController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Farmasi\FarmasiController;
use App\Http\Controllers\Admin\DataDokterController;
use App\Http\Controllers\Admin\PemeriksaanController;
use App\Http\Controllers\Dokter\JadwalPraktekController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/navigasi', function () {
    return view('pasien.navigasi.navigasi-pasien'); // ini cuman nampilin navigasi minta tolong ubahlagi yaa :)
});
Route::get('/about', function () {
    return view('about');
});




Route::get('/1', function () {
    return view('reservasi');
});
Route::get('/2', function () {
    return view('jadwal');
});
Route::get('/3', function () {
    return view('keluhan');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/email/verify-otp', function () {
    return view('auth.verify-otp');
})->middleware('auth')->name('verification.otp.form');
Route::post('/email/verify-otp', function (Request $request) {
    $request->validate([
        'otp' => ['required', 'digits:6'],
    ]);

    $user = auth()->user();

    if ($user->role !== 'Pasien') {
        return match ($user->role) {
            'Admin'   => redirect()->route('admin.dashboard')->with('info', 'Role ini tidak memerlukan verifikasi email.'),
            'Dokter'  => redirect()->route('dokter.dashboard')->with('info', 'Role ini tidak memerlukan verifikasi email.'),
            'Farmasi' => redirect()->route('farmasi.dashboard')->with('info', 'Role ini tidak memerlukan verifikasi email.'),
            default   => redirect('/')->with('info', 'Role ini tidak memerlukan verifikasi email.'),
        };
    }

    if ($user->email_verification_code == $request->otp) {
        if ($user->email_verification_expires_at && now()->gt($user->email_verification_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP sudah kadaluarsa. Silakan kirim ulang.']);
        }

        $user->markEmailAsVerified();
        $user->email_verification_code = null;
        $user->email_verification_expires_at = null;
        $user->save();

        return redirect($user->redirectTo())
            ->with('success', 'Email berhasil diverifikasi.');
    }


    return back()->withErrors(['otp' => 'Kode OTP salah.']);
})->middleware(['auth'])->name('verification.otp.submit');

Route::post('/email/resend-otp', function () {
    $user = auth()->user();
    $otp = rand(100000, 999999);
    $user->email_verification_code = $otp;
    $user->email_verification_expires_at = now()->addSeconds(30);
    $user->save();
    Mail::to($user->email)->send(new EmailVerificationOtp($otp));
    return back()->with('status', 'Kode OTP telah dikirim ulang.');
})->middleware('auth')->name('verification.otp.resend');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('jadwalpraktek', JadwalPraktekController::class);
});

//! Admin Routes
Route::middleware(['auth', 'AdminMiddleware'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('pemeriksaan', PemeriksaanController::class);
    Route::resource('cabang', CabangController::class);
    Route::resource('dokter', DataDokterController::class);
});

//! Dokter Routes
Route::middleware(['auth', 'DokterMiddleware'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/', [DokterController::class, 'index'])->name('dashboard');
});

//! Farmasi Routes
Route::middleware(['auth', 'FarmasiMiddleware'])->prefix('farmasi')->name('farmasi.')->group(function () {
    Route::get('/', [FarmasiController::class, 'index'])->name('dashboard');
    Route::resource('obat', ObatController::class);
});

//! Pasien Routes
Route::middleware(['auth', 'PasienMiddleware', 'ensure.otp.verified'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/', [PasienController::class, 'index'])->name('dashboard');
});



require __DIR__ . '/auth.php';
