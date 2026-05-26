<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velodrive - Forgot Password</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <!-- Kiri: Form -->
        <div class="login-left">
            <div class="login-left-inner">
                <div class="logo">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo">
                    <span>VELODRIVE</span>
                </div>

                <h2>Forgot your password?</h2>
                <p style="color: #888; font-size: 14px; margin-bottom: 24px; text-align: center; line-height: 1.6;">
                    No worries! Enter your email and we'll send you a reset link.
                </p>

                @if(session('success'))
                    <div style="background: #ecfdf5; border: 1px solid #6ee7b7; color: #065f46;
                                padding: 12px 16px; border-radius: 8px; font-size: 14px;
                                margin-bottom: 20px; text-align: center;">
                        <i class='bx bx-check-circle' style="margin-right: 6px;"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div style="background: #fef2f2; border: 1px solid #fca5a5; color: #991b1b;
                                padding: 12px 16px; border-radius: 8px; font-size: 14px;
                                margin-bottom: 20px; text-align: center;">
                        <i class='bx bx-error-circle' style="margin-right: 6px;"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" name="email"
                                   placeholder="username@email.com"
                                   value="{{ old('email') }}"
                                   required autofocus>
                            <div class="icon-wrapper"><i class='bx bx-envelope'></i></div>
                        </div>
                        @error('email')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn-login">
                        <i class='bx bx-send' style="margin-right: 6px;"></i>
                        Send Reset Link
                    </button>
                </form>

                <div class="divider">
                    <span>OR</span>
                </div>

                <a href="{{ route('login') }}" class="btn-signup-outline">
                    <i class='bx bx-arrow-back' style="margin-right: 6px;"></i>
                    Back to Login
                </a>
            </div>
        </div>

        <!-- Kanan: Gambar -->
        <div class="login-right">
            <img src="{{ asset('image/Car.png') }}" alt="Kumpulan Mobil Velodrive">
        </div>
    </div>
</body>
</html>