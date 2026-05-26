<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // ── Register ───────────────────────────────────────

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'user',
            ]);

            UserProfile::create([
                'user_id' => $user->id,
            ]);

            DB::commit();

            Auth::login($user);

            return redirect()->route('dashboard')
                ->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name . '.');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Registrasi gagal. Silakan coba lagi.');
        }
    }

    // ── Login ──────────────────────────────────────────

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Email atau password salah.']);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect berdasarkan role
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard')
                ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        return redirect()->intended(route('dashboard'))
            ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
    }

    // ── Logout ─────────────────────────────────────────

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }

    // ── Forgot Password ────────────────────────────────

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $status = Password::broker()->sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Link reset password telah dikirim ke email kamu.');
        }

        if ($status === Password::RESET_THROTTLED) {
            return back()
                ->withInput()
                ->with('error', 'Terlalu banyak permintaan. Coba lagi beberapa saat.');
        }

        return back()
            ->withInput()
            ->with('error', 'Gagal mengirim link reset password.');
    }

    // ── Reset Password ─────────────────────────────────

    public function showResetPassword(Request $request, string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $status = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password'       => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')
                ->with('success', 'Password berhasil direset. Silakan login kembali.');
        }

        if ($status === Password::INVALID_TOKEN) {
            return back()
                ->withInput()
                ->with('error', 'Token tidak valid atau sudah kadaluarsa.');
        }

        if ($status === Password::INVALID_USER) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        return back()
            ->withInput()
            ->with('error', 'Gagal mereset password.');
    }
}