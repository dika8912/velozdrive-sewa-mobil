<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velodrive - Reset Password</title>
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

                <h2>Reset your password</h2>
                <p style="color: #888; font-size: 14px; margin-bottom: 24px; text-align: center; line-height: 1.6;">
                    Enter your new password below.
                </p>

                @if(session('error'))
                    <div style="background: #fef2f2; border: 1px solid #fca5a5; color: #991b1b;
                                padding: 12px 16px; border-radius: 8px; font-size: 14px;
                                margin-bottom: 20px; text-align: center;">
                        <i class='bx bx-error-circle' style="margin-right: 6px;"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('password.update') }}" method="POST">
                    @csrf

                    {{-- Token & email hidden --}}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" name="email"
                                   placeholder="username@email.com"
                                   value="{{ old('email', $email) }}"
                                   required autofocus>
                            <div class="icon-wrapper"><i class='bx bx-envelope'></i></div>
                        </div>
                        @error('email')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password"
                                   placeholder="Enter new password" required>
                            <div class="icon-wrapper toggle-password" data-target="password"
                                 style="cursor: pointer;">
                                <i class='bx bx-hide' id="icon-password"></i>
                            </div>
                        </div>
                        @error('password')
                            <span style="color: red; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="Confirm new password" required>
                            <div class="icon-wrapper toggle-password" data-target="password_confirmation"
                                 style="cursor: pointer;">
                                <i class='bx bx-hide' id="icon-password_confirmation"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Password strength indicator --}}
                    <div id="strength-bar" style="margin: -10px 0 16px; display: none;">
                        <div style="height: 4px; border-radius: 4px; background: #e5e7eb; overflow: hidden;">
                            <div id="strength-fill"
                                 style="height: 100%; width: 0%; border-radius: 4px; transition: all 0.3s;">
                            </div>
                        </div>
                        <span id="strength-label"
                              style="font-size: 11px; color: #888; margin-top: 4px; display: block;">
                        </span>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class='bx bx-lock-open-alt' style="margin-right: 6px;"></i>
                        Reset Password
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

    <script>
        // ── Toggle show/hide password ──────────────────
        document.querySelectorAll('.toggle-password').forEach(btn => {
            btn.addEventListener('click', () => {
                const targetId = btn.dataset.target;
                const input    = document.getElementById(targetId);
                const icon     = document.getElementById('icon-' + targetId);

                if (input.type === 'password') {
                    input.type  = 'text';
                    icon.className = 'bx bx-show';
                } else {
                    input.type  = 'password';
                    icon.className = 'bx bx-hide';
                }
            });
        });

        // ── Password strength indicator ────────────────
        const passwordInput = document.getElementById('password');
        const strengthBar   = document.getElementById('strength-bar');
        const strengthFill  = document.getElementById('strength-fill');
        const strengthLabel = document.getElementById('strength-label');

        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;

            if (!val) {
                strengthBar.style.display = 'none';
                return;
            }

            strengthBar.style.display = 'block';

            let score = 0;
            if (val.length >= 8)              score++;
            if (/[A-Z]/.test(val))            score++;
            if (/[0-9]/.test(val))            score++;
            if (/[^A-Za-z0-9]/.test(val))     score++;

            const levels = [
                { width: '25%', color: '#ef4444', label: 'Weak' },
                { width: '50%', color: '#f97316', label: 'Fair' },
                { width: '75%', color: '#eab308', label: 'Good' },
                { width: '100%',color: '#22c55e', label: 'Strong' },
            ];

            const level = levels[score - 1] || levels[0];
            strengthFill.style.width       = level.width;
            strengthFill.style.background  = level.color;
            strengthLabel.textContent      = level.label;
            strengthLabel.style.color      = level.color;
        });
    </script>
</body>
</html>