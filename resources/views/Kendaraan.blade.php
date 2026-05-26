<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velodrive - Pilih Kendaraan Terbaikmu</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav style="border-bottom: 1px solid #f1f5f9;">
        <div class="logo-nav">
            <a href="{{ url('/') }}" style="display: flex; align-items: center; gap: 8px; text-decoration: none;">
                <img src="{{ asset('image/logo.png') }}" alt="Logo">
                <h2>VELODRIVE</h2>
            </a>
        </div>

        <div class="nav-contact" style="display: flex; align-items: center; gap: 12px;">
            <div
                style="width: 40px; height: 40px; border-radius: 50%; background-color: #1e293b; display: flex; align-items: center; justify-content: center;">
                <i class='bx bxs-phone' style="color: white; font-size: 20px;"></i>
            </div>
            <div style="display: flex; flex-direction: column;">
                <span style="font-size: 12px; color: #64748b; font-weight: 600;">Call Center</span>
                <strong style="font-size: 14px; color: #1e293b; font-weight: 800;">+62 478427312</strong>
            </div>
        </div>
    </nav>

    <section class="k-page">
        <div class="k-header text-center">
            <h1 class="k-title">Pilih Kendaraan Terbaikmu</h1>

            <div class="k-filters">
                <button class="k-filter-btn active" data-filter="all">Semua</button>
                <button class="k-filter-btn" data-filter="sedan"><i class='bx bx-car'></i> Sedan</button>
                <button class="k-filter-btn" data-filter="cabriolet"><i class='bx bx-car'></i> Cabriolet</button>
                <button class="k-filter-btn" data-filter="pickup"><i class='bx bxs-truck'></i> Pickup</button>
                <button class="k-filter-btn" data-filter="suv"><i class='bx bx-car'></i> Suv</button>
                <button class="k-filter-btn" data-filter="minivan"><i class='bx bxs-bus'></i> Minivan</button>
                <button class="k-filter-btn" data-filter="sport"><i class='bx bx-car'></i> Sport</button>
                <button class="k-filter-btn" data-filter="van"><i class='bx bxs-bus'></i> Van</button>
                <button class="k-filter-btn" data-filter="jeep"><i class='bx bx-car'></i> Jeep</button>
            </div>
        </div>

        <div class="k-grid">
            <!-- Mercedes C-Class -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/audiblue.png') }}" alt="Mercedes C-Class">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Mercedes C-Class</h3>
                        <div class="k-price">Rp 434.500.00</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Sedan</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Toyota Innova Reborn -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/innova.png') }}" alt="Toyota Innova Reborn">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Toyota Innova Reborn</h3>
                        <div class="k-price">Rp 250.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Sport</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Manual</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> Solar</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Jeep Wrangler -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/jeep.png') }}" alt="Jeep Wrangler">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Jeep Wrangler</h3>
                        <div class="k-price">Rp 10.000.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Jeep</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Porsche -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/porsche1.png') }}" alt="Porsche">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Porsche</h3>
                        <div class="k-price">Rp. 325.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Sedan</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> PB 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Toyota GR 86 -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/gtr86.png') }}" alt="Toyota GR 86">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Toyota GR 86</h3>
                        <div class="k-price">Rp. 450.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Sedan</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Manual</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> PB 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Porsche Black -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/porsche2.png') }}" alt="Porsche">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Porsche</h3>
                        <div class="k-price">Rp.575.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Cabriolet</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> PB 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Mercedes Sprinter Van -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/mercevan.png') }}" alt="Mercedes Sprinter Van">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Mercedes Sprinter Van</h3>
                        <div class="k-price">Rp. 950.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Van</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> PB 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Ford Mustang GT -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/mustanggt.png') }}" alt="Ford Mustang GT">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Ford Mustang GT</h3>
                        <div class="k-price">Rp.800.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Sport</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Manual</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> PB 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Ford F-350 -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/fordPickup.png') }}" alt="Ford F-350">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Ford F-350</h3>
                        <div class="k-price">Rp.1.250.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Pickup</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> PB 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>
            <!-- Toyota Camry -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/camry.png') }}" alt="Toyota Camry">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Toyota Camry</h3>
                        <div class="k-price">Rp. 400.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Sedan</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Toyota Vios -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/vios.png') }}" alt="Toyota Vios">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Toyota Vios</h3>
                        <div class="k-price">Rp. 350.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Sedan</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 92</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Toyota Corolla Altis -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/Altis.png') }}" alt="Toyota Corolla Altis">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Toyota Corolla Altis</h3>
                        <div class="k-price">Rp. 380.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Sedan</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 92</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>
            <!-- BMW X5 -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/bmwMX5.png') }}" alt="BMW X5">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>BMW X5</h3>
                        <div class="k-price">Rp. 850.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Suv</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Honda CR-V -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/CRV.png') }}" alt="Honda CR-V">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Honda CR-V</h3>
                        <div class="k-price">Rp. 600.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Suv</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 92</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Toyota Alphard -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/alphard.png') }}" alt="Toyota Alphard">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Toyota Alphard</h3>
                        <div class="k-price">Rp. 1.500.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Minivan</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 95</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Mazda MX-5 -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/MX5-1.png') }}" alt="Mazda MX-5">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Mazda MX-5</h3>
                        <div class="k-price">Rp. 900.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Cabriolet</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Manual</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> RON 98</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>

            <!-- Toyota Hilux Rangga -->
            <div class="k-card">
                <div class="k-image">
                    <img src="{{ asset('image/hiluxrangga.png') }}" alt="Toyota Hilux">
                </div>
                <div class="k-details">
                    <div class="k-title-row">
                        <h3>Toyota Hilux Rangga</h3>
                        <div class="k-price">Rp. 750.000</div>
                    </div>
                    <div class="k-subtitle-row">
                        <span class="k-category">Pickup</span>
                        <span class="k-per-day">per hari</span>
                    </div>
                    <div class="k-specs">
                        <div class="k-spec"><i class='bx bx-git-branch'></i> Automat</div>
                        <div class="k-spec"><i class='bx bxs-gas-pump'></i> Solar</div>
                        <div class="k-spec"><i class='bx bx-wind'></i> Air Conditioner</div>
                    </div>
                    <button class="btn-lihat-detail">Lihat Detail</button>
                </div>
            </div>
        </div>

        <!-- Marquee Brands Section -->
        <div class="k-brands-container">
            <div class="k-brands-track">
                <!-- Repeating image to create continuous effect -->
                <img src="{{ asset('image/merkmobil.png') }}" alt="Car Brands" class="k-brands-img">
                <img src="{{ asset('image/merkmobil.png') }}" alt="Car Brands" class="k-brands-img">
                <img src="{{ asset('image/merkmobil.png') }}" alt="Car Brands" class="k-brands-img">
                <img src="{{ asset('image/merkmobil.png') }}" alt="Car Brands" class="k-brands-img">
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
                    <li><a href="{{ url('/') }}#mengapa-memilih-kami">Mengapa memilih kami</a></li>
                    <li><a href="{{ url('/') }}#cara-rental">Cara Rental</a></li>
                    <li><a href="{{ url('/') }}#kendaraan-populer">Kendaraan Populer</a></li>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.k-filter-btn');
            const carCards = document.querySelectorAll('.k-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    button.classList.add('active');

                    const filterValue = button.getAttribute('data-filter').toLowerCase();

                    carCards.forEach(card => {
                        const categoryElement = card.querySelector('.k-category');
                        if (categoryElement) {
                            const category = categoryElement.textContent.trim()
                            .toLowerCase();

                            if (filterValue === 'all' || category === filterValue) {
                                card.style.display =
                                'block'; // Or whatever your default display is, e.g., flex
                            } else {
                                card.style.display = 'none';
                            }
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
