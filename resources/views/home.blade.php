<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velodrive - Rent a Car</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav>
        <div class="logo-nav">
            <img src="{{ asset('image/logo.png') }}" alt="Logo">
            <h2>VELODRIVE</h2>
        </div>
        <ul>
            <li><a href="#kendaraan-populer">Kendaraan populer</a></li>
            <li><a href="#cara-rental">Cara Rental</a></li>
            <li><a href="#mengapa-memilih-kami">Mengapa memilih kami</a></li>
        </ul>
        <div class="nav-buttons" style="display: flex; align-items: center;">
            @guest
                <a href="{{ url('/login') }}"><button class="btn-signin">Sign in</button></a>
                <a href="{{ url('/register') }}"><button class="btn-signup">Sign up</button></a>
            @endguest

            @auth
                <div class="profile-dropdown">
                    <button class="profile-btn">
                        <div class="profile-avatar">
                            <i class='bx bx-user'></i>
                        </div>
                        <span>{{ Auth::user()->name }}</span>
                        <i class='bx bx-chevron-down'></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#"><i class='bx bx-user-circle'></i> Profil Saya</a>
                        <a href="#"><i class='bx bx-history'></i> Riwayat Sewa</a>
                        <hr>
                        <form action="{{ url('/logout') }}" method="POST" style="display: none;" id="logout-form">
                            @csrf
                        </form>
                        <a href="#" class="logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out'></i> Logout
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <header>
        <div class="hero-text">
            <h1>Sewa mobil impianmu hari ini, tanpa ribet. <span>Easily</span></h1>
            <p>Pilih dari berbagai macam armada kami. Proses booking mudah, harga transparan, dan konfirmasi instan.</p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('image/porscheblue.png') }}" alt="mobil velodrive">
        </div>
    </header>

    <section class="search-section">
        <form action="#" method="GET">
            <div class="input-group">
                <label>Lokasi</label>
                <input type="text" placeholder="Search your location">
            </div>

            <div class="input-group">
                <label>Tanggal Sewa</label>
                <input type="date">
            </div>

            <div class="input-group">
                <label>Tanggal Kembali</label>
                <input type="date">
            </div>

            <button type="submit" class="btn-search">Cari Mobil</button>
        </form>
    </section>

    <section class="how-it-works" id="cara-rental">
        <div class="section-badge">Cara Rental </div>
        <h2 class="section-title">3 langkah mudah untuk rental mobil</h2>

        <div class="steps-container">
            <div class="step-card">
                <div class="icon-box">
                    <i class='bx bxs-check-shield'></i>
                </div>
                <h3>Pilih Lokasi</h3>
                <p>Pilih lokasi penjemputan mobil dan<br>temukan mobil pilihanmu</p>
            </div>
            <div class="step-card">
                <div class="icon-box">
                    <i class='bx bxs-calendar'></i>
                </div>
                <h3>Pilih Waktu</h3>
                <p>Sesuaikan tanggal dan <br>booking kendaraan pilihanmu </p>
            </div>
            <div class="step-card">
                <div class="icon-box">
                    <i class='bx bxs-car'></i>
                </div>
                <h3>Booking kendaraanmu</h3>
                <p>Booking kendaraan pilihanmu<br>crew kami siap mengantarkan sampai ke lokasimu
                </p>
            </div>
        </div>
    </section>

    <section class="brands-section">
        <div class="brands-track">
            <img src="{{ asset('image/brand.png') }}" alt="Car Brands" class="brands-img">
            <img src="{{ asset('image/brand.png') }}" alt="Car Brands" class="brands-img">
        </div>
    </section>

    <section class="why-choose-us" id="mengapa-memilih-kami">
        <div class="why-image">
            <div class="bg-shape"></div>
            <img src="{{ asset('image/Audi 1.png') }}" alt="Audi R8 Velodrive">
        </div>
        <div class="why-text">
            <div class="section-badge">Mengapa memilih kami</div>
            <h2 class="why-title">Kami menawarkan<br>pengalaman terbaik dengan<br>penawaran sewa kami.</h2>

            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class='bx bxs-wallet'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Garansi Terjamin</h4>
                        <p>Semua armada Velodrive dirawat secara rutin oleh teknisi ahli.<br>Kami menggaransi kebersihan
                            dan performa mesin agar kamu bisa langsung<br>tancap gas dengan tenang.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class='bx bxs-user-check'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Sopir yang berpengalaman</h4>
                        <p>Jangan khawatir tidak bisa mengemudi<br>Kami juga menyediakan sopir yang profesional<br>agar
                            berkendara nyaman dan sampai tujuan.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class='bx bx-support'></i>
                    </div>
                    <div class="feature-content">
                        <h4>Realtime technical support</h4>
                        <p>Punya pertanyaan? Hubungi<br>kapan saja jika Anda mengalami masalah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-vehicles" id="kendaraan-populer">
        <div class="text-center">
            <div class="section-badge">Kendaraan Populer</div>
            <h2 class="section-title" style="text-align: center; margin-bottom: 20px;">Kendaraan yang sering banyak
                disewa</h2>
        </div>

        <div class="cars-grid">
            <!-- Jaguar -->
            <div class="car-card">
                <div class="car-image">
                    <img src="{{ asset('image/jaguar.png') }}" alt="Jaguar XE">
                </div>
                <div class="car-details">
                    <h3>Jaguar XE L P250</h3>
                    <div class="rating">
                        <i class='bx bxs-star'></i> <strong>4.8</strong> <span>(2.436 reviews)</span>
                    </div>
                    <div class="car-specs">
                        <div class="spec"><i class='bx bx-user'></i> 4 Penumpang</div>
                        <div class="spec"><i class='bx bx-git-branch'></i> Auto</div>
                        <div class="spec"><i class='bx bx-wind'></i> Air Conditioning</div>
                        <div class="spec"><i class='bx bxs-car'></i> 4 Pintu</div>
                    </div>
                    <hr class="card-divider">
                    <div class="price-box">
                        <span class="price-label">Price</span>
                        <span class="price-amount"><strong>Rp. 350.000</strong> <small>/day</small></span>
                    </div>
                    <button class="btn-sewa">Sewa <i class='bx bx-right-arrow-alt'></i></button>
                </div>
            </div>

            <!-- Audi R8 -->
            <div class="car-card">
                <div class="car-image">
                    <img src="{{ asset('image/Audi 1.png') }}" alt="Audi R8">
                </div>
                <div class="car-details">
                    <h3>Audi R8</h3>
                    <div class="rating">
                        <i class='bx bxs-star'></i> <strong>4.6</strong> <span>(1.936 reviews)</span>
                    </div>
                    <div class="car-specs">
                        <div class="spec"><i class='bx bx-user'></i> 2 Penumpang</div>
                        <div class="spec"><i class='bx bx-git-branch'></i> Auto</div>
                        <div class="spec"><i class='bx bx-wind'></i> Air Conditioning</div>
                        <div class="spec"><i class='bx bxs-car'></i> 2 Pintu</div>
                    </div>
                    <hr class="card-divider">
                    <div class="price-box">
                        <span class="price-label">Price</span>
                        <span class="price-amount"><strong>Rp. 520.000</strong> <small>/day</small></span>
                    </div>
                    <button class="btn-sewa">Sewa <i class='bx bx-right-arrow-alt'></i></button>
                </div>
            </div>

            <!-- BMW M3 -->
            <div class="car-card">
                <div class="car-image">
                    <img src="{{ asset('image/greenBMW.png') }}" alt="BMW M3">
                </div>
                <div class="car-details">
                    <h3>BMW M3</h3>
                    <div class="rating">
                        <i class='bx bxs-star'></i> <strong>4.5</strong> <span>(2.036 reviews)</span>
                    </div>
                    <div class="car-specs">
                        <div class="spec"><i class='bx bx-user'></i> 4 Penumpang</div>
                        <div class="spec"><i class='bx bx-git-branch'></i> Auto</div>
                        <div class="spec"><i class='bx bx-wind'></i> Air Conditioning</div>
                        <div class="spec"><i class='bx bxs-car'></i> 4 Pintu</div>
                    </div>
                    <hr class="card-divider">
                    <div class="price-box">
                        <span class="price-label">Price</span>
                        <span class="price-amount"><strong>Rp. 950.000</strong> <small>/day</small></span>
                    </div>
                    <button class="btn-sewa">Sewa <i class='bx bx-right-arrow-alt'></i></button>
                </div>
            </div>

            <!-- Lamborghini Huracan -->
            <div class="car-card">
                <div class="car-image">
                    <img src="{{ asset('image/huracan.png') }}" alt="Lamborghini Huracan">
                </div>
                <div class="car-details">
                    <h3>Lamborghini Huracan</h3>
                    <div class="rating">
                        <i class='bx bxs-star'></i> <strong>4.3</strong> <span>(2.236 reviews)</span>
                    </div>
                    <div class="car-specs">
                        <div class="spec"><i class='bx bx-user'></i> 2 Penumpang</div>
                        <div class="spec"><i class='bx bx-git-branch'></i> Auto</div>
                        <div class="spec"><i class='bx bx-wind'></i> Air Conditioning</div>
                        <div class="spec"><i class='bx bxs-car'></i> 2 Pintu</div>
                    </div>
                    <hr class="card-divider">
                    <div class="price-box">
                        <span class="price-label">Price</span>
                        <span class="price-amount"><strong>Rp. 39.000.000</strong> <small>/day</small></span>
                    </div>
                    <button class="btn-sewa">Sewa <i class='bx bx-right-arrow-alt'></i></button>
                </div>
            </div>
        </div>

        <div class="text-center" style="margin-top: 50px;">
            <a href="{{ url('/kendaraan') }}" style="text-decoration: none;">
                <button class="btn-lihat-semua">Lihat kendaraan <i class='bx bx-right-arrow-alt'></i></button>
            </a>
        </div>
    </section>

    <section class="testimonials-section">
        <div class="text-center" style="position: relative; z-index: 2;">
            <div class="section-badge">Testimoni Pengguna</div>
            <h2 class="section-title" style="margin-bottom: 20px;">Rating pengguna untuk kami</h2>
        </div>


        <div class="testimonials-track">
            <!-- Sarah -->
            <div class="testimonial-card">
                <div class="testi-image">
                    <img src="{{ asset('image/testi1.png') }}" alt="Johnson Wahyudi">
                </div>
                <div class="testi-content">
                    <div class="testi-rating">
                        <h2>5.0 <small>stars</small></h2>
                        <div class="stars">
                            <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                class='bx bxs-star'></i><i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <p>“This cars are very clean, I recommend this to everyone.”</p>
                    <div class="testi-author">
                        <h4>Sarah Jenkins</h4>
                        <span>New York</span>
                    </div>
                </div>
            </div>

            <!-- John Wahyudi -->
            <div class="testimonial-card">
                <div class="testi-image">
                    <img src="{{ asset('image/testi2.png') }}" alt="Sarah Jenkins">
                </div>
                <div class="testi-content">
                    <div class="testi-rating">
                        <h2>5.0 <small>stars</small></h2>
                        <div class="stars">
                            <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                class='bx bxs-star'></i><i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <p>“Mobil e penak bro, jos jiss pokoke bawa ke kondangan dikira mobil sendiri hahahahah.”</p>
                    <div class="testi-author">
                        <h4>Johnson Wahyudi</h4>
                        <span>Surakarta</span>
                    </div>
                </div>
            </div>

            <!-- Aisyah -->
            <div class="testimonial-card">
                <div class="testi-image">
                    <img src="{{ asset('image/testi3.png') }}" alt="Michael Scoot">
                </div>
                <div class="testi-content">
                    <div class="testi-rating">
                        <h2>4.8 <small>stars</small></h2>
                        <div class="stars">
                            <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                class='bx bxs-star'></i><i class='bx bxs-star-half'></i>
                        </div>
                    </div>
                    <p>“Sangat memuaskan, proses pemesanan cepat dan mobilnya wangi. Sangat direkomendasikan!”</p>
                    <div class="testi-author">
                        <h4>Aisyah</h4>
                        <span>Medan, Sumatera Utara</span>
                    </div>
                </div>
            </div>

            <!-- marquee effect -->
            <!-- Sarah -->
            <div class="testimonial-card">
                <div class="testi-image">
                    <img src="{{ asset('image/testi1.png') }}" alt="Johnson Wahyudi">
                </div>
                <div class="testi-content">
                    <div class="testi-rating">
                        <h2>5.0 <small>stars</small></h2>
                        <div class="stars">
                            <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                class='bx bxs-star'></i><i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <p>“This cars are very clean, I recommend this to everyone.”</p>
                    <div class="testi-author">
                        <h4>Sarah Jenkins</h4>
                        <span>California</span>
                    </div>
                </div>
            </div>

            <!-- Johson -->
            <div class="testimonial-card">
                <div class="testi-image">
                    <img src="{{ asset('image/testi2.png') }}" alt="Sarah Jenkins">
                </div>
                <div class="testi-content">
                    <div class="testi-rating">
                        <h2>5.0 <small>stars</small></h2>
                        <div class="stars">
                            <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                class='bx bxs-star'></i><i class='bx bxs-star'></i>
                        </div>
                    </div>
                    <p>“Mobil e penak bro, jos jiss pokoke bawa ke kondangan dikira mobil sendiri hahahahah.”</p>
                    <div class="testi-author">
                        <h4>Johnson Wahyudi</h4>
                        <span>Surakarta</span>
                    </div>
                </div>
            </div>

            <!-- Aisyah -->
            <div class="testimonial-card">
                <div class="testi-image">
                    <img src="{{ asset('image/testi3.png') }}" alt="Michael Scoot">
                </div>
                <div class="testi-content">
                    <div class="testi-rating">
                        <h2>4.8 <small>stars</small></h2>
                        <div class="stars">
                            <i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i
                                class='bx bxs-star'></i><i class='bx bxs-star-half'></i>
                        </div>
                    </div>
                    <p>“Mantap, Recommended pokoknya.”</p>
                    <div class="testi-author">
                        <h4>Aisyah</h4>
                        <span>Medan, Sumatera Utara</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="{{ asset('image/VeloPutih.png') }}" alt="Logo" class="footer-logo-img">
                    <h2>VELODRIVE</h2>
                </div>
                <ul class="footer-contact">
                    <li><i class='bx bx-map'></i>
                        <div>Singopuran, Kartasura,<br>Sukoharjo</div>
                    </li>
                    <li><i class='bx bx-phone'></i> +62 4784 273 12</li>
                    <li><i class='bx bx-envelope'></i> velodrive@gmail.com</li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Produk Kami</h3>
                <ul class="footer-links">
                    <li><a href="#">Mobil</a></li>
                    <li><a href="#">Pelayanan</a></li>
                    <li><a href="#">Harga</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Tentang VeloDrive</h3>
                <ul class="footer-links">
                    <li><a href="#mengapa-memilih-kami">Mengapa memilih kami</a></li>
                    <li><a href="#cara-rental">Cara Rental</a></li>
                    <li><a href="#kendaraan-populer">Kendaraan Populer</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright 2026 &bull; Velodrive, All Rights Reserved</p>
        </div>
    </footer>

</body>

</html>
