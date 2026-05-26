<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('image/logo.png') }}" alt="Logo">
        <span class="sidebar-brand">VELODRIVE</span>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section">
            <span class="nav-label">Main Menu</span>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class='bx bxs-dashboard'></i>
                <span>Dashboard</span>
            </a>

            <a href="#"
               class="nav-item {{ request()->routeIs('user.mobil*') ? 'active' : '' }}">
                <i class='bx bxs-car'></i>
                <span>Sewa Mobil</span>
            </a>

            <a href="#"
               class="nav-item {{ request()->routeIs('user.invoice*') ? 'active' : '' }}">
                <i class='bx bxs-file-doc'></i>
                <span>Invoice Saya</span>
            </a>

            <a href="#"
               class="nav-item {{ request()->routeIs('user.transaksi*') ? 'active' : '' }}">
                <i class='bx bxs-credit-card'></i>
                <span>Riwayat Transaksi</span>
            </a>
        </div>

        <div class="nav-section">
            <span class="nav-label">Account</span>

            <a href="#" class="nav-item">
                <i class='bx bxs-user-circle'></i>
                <span>Profil Saya</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-item nav-logout">
                    <i class='bx bx-log-out'></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </nav>
</div>