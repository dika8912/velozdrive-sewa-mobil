<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velodrive - Register</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="register-container">
        <!-- Kiri  Form Register -->
        <div class="register-left">
            <div class="register-left-inner">
                <h2>Buat Akun baru</h2>
                
                <!-- Menampilkan pesan error jika validasi gagal -->
                @if ($errors->any())
                    <div style="color: red; margin-bottom: 15px; font-size: 13px; text-align: center;">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('/register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-wrapper">
                            <i class='bx bx-user'></i>
                            <input type="text" name="name" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-wrapper">
                            <i class='bx bx-envelope'></i>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-wrapper">
                            <i class='bx bx-hide toggle-password'></i>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-wrapper">
                            <i class='bx bx-hide toggle-password'></i>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    
                    <div class="terms">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">Accept <a href="#">terms and conditions</a></label>
                    </div>
                    
                    <button type="submit" class="btn-register">LOG IN</button>
                </form>
                
                <div class="login-link">
                    You have account? <a href="{{ url('/login') }}">Login now</a>
                </div>
            </div>
        </div>
        
        <!-- Kanan  Gambar -->
        <div class="register-right">
            <img src="{{ asset('image/greenBMW.png') }}" alt="Mobil BMW Velodrive">
        </div>
    </div>

    <script>
        // Mengaktifkan fitur show/hide password
        const togglePasswordIcons = document.querySelectorAll('.toggle-password');
        
        togglePasswordIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                // Temukan tag input di sebelahnya (karena struktur kita: <i> lalu <input>)
                const input = this.nextElementSibling;
                
                // Ubah tipe input
                if (input.type === 'password') {
                    input.type = 'text';
                    // Ubah icon menjadi mata terbuka
                    this.classList.remove('bx-hide');
                    this.classList.add('bx-show');
                    // Ubah warna agar terlihat sedang aktif (opsional)
                    this.style.color = '#1a73e8';
                } else {
                    input.type = 'password';
                    // Kembalikan icon menjadi mata tertutup
                    this.classList.remove('bx-show');
                    this.classList.add('bx-hide');
                    // Kembalikan warna
                    this.style.color = '';
                }
            });
        });
    </script>
</body>
</html>
