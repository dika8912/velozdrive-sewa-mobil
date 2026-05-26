<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velodrive - Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <!-- Kiri: Form Login -->
        <div class="login-left">
            <div class="login-left-inner">
                <div class="logo">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo">
                    <span>VELODRIVE</span>
                </div>
                
                <h2>Login into your account</h2>
                
                <!-- Pesan Error jika login gagal -->
                @if(session('error'))
                    <div style="color: red; margin-bottom: 15px; font-size: 14px; text-align: center;">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Pesan Sukses jika register berhasil -->
                @if(session('success'))
                    <div style="color: green; margin-bottom: 15px; font-size: 14px; text-align: center;">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" name="email" placeholder="username@email.com" value="{{ old('email') }}" required autofocus>
                            <div class="icon-wrapper"><i class='bx bx-envelope'></i></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-wrapper">
                            <input type="password" name="password" placeholder="Enter your password" required>
                            <div class="icon-wrapper"><i class='bx bx-lock-alt'></i></div>
                        </div>
                    </div>
                    
                    <div class="forgot-password">
                        <a href="{{ url('/forgot-password') }}">Forgot Password?</a>
                    </div>
                    
                    <button type="submit" class="btn-login">Login Now</button>
                </form>
                
                <div class="divider">
                    <span>OR</span>
                </div>
                
                <a href="{{ url('/register') }}" style="text-decoration: none;">
                    <button type="button" class="btn-signup-outline">Signup Now</button>
                </a>
            </div>
        </div>
        
        <!--  Kanan: Gambar -->
        <div class="login-right">
            <img src="{{ asset('image/Car.png') }}" alt="Kumpulan Mobil Velodrive">
        </div>
    </div>
</body>
</html>
