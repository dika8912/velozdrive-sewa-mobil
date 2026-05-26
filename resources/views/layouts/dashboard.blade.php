<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velodrive - @yield('title', 'Dashboard')</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @if(auth()->user()->is_admin)
        @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    @endif
    <script>
        window.flashMessage = {
            @if(session('success'))
                success: @json(session('success')),
            @endif
            @if(session('error'))
                error: @json(session('error')),
            @endif
        };
    </script>
</head>
<body x-data="app()" x-cloak class="dashboard-body">

    <div class="dashboard-wrapper">

        {{-- Sidebar --}}
        @if(auth()->user()->is_admin)
            <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                 class="sidebar fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-white border-r border-slate-100 p-4 transition-transform duration-300 md:static md:translate-x-0 md:block">
                @include('components.sidebar-admin')
            </div>
        @else
            <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                 class="sidebar fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-white border-r border-slate-100 p-4 transition-transform duration-300 md:static md:translate-x-0 md:block">
                @include('components.sidebar-user')
            </div>
        @endif

        {{-- Main --}}
        <div class="dashboard-main" id="main-content">

            {{-- Topbar --}}
            <div class="topbar">
                <div class="topbar-left">
                    <button @click="toggleSidebar()" class="sidebar-toggle inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-700 shadow-sm md:hidden">
                        <i class='bx bx-menu'></i>
                    </button>
                    <h1 class="page-title">@yield('title', 'Dashboard')</h1>
                </div>
                <div class="topbar-right">
                    {{-- Notifikasi --}}
                    <button class="topbar-icon">
                        <i class='bx bx-bell'></i>
                    </button>

                    {{-- Profile dropdown --}}
                    <div class="relative" @click.outside="profileOpen = false">
                        <button @click="toggleProfile()" class="profile-btn inline-flex items-center gap-3 rounded-full bg-white px-3 py-2 shadow-sm border border-slate-200 text-slate-700">
                            <img src="{{ auth()->user()->profile->profile_picture_url ?? asset('image/default-avatar.png') }}"
                                 alt="Avatar" class="h-9 w-9 rounded-full object-cover">
                            <div class="profile-info text-left hidden md:block">
                                <span class="profile-name block text-sm font-semibold">{{ auth()->user()->name }}</span>
                                <span class="profile-role block text-xs text-slate-500">{{ auth()->user()->role_label }}</span>
                            </div>
                            <i class='bx bx-chevron-down text-lg'></i>
                        </button>

                        <div x-show="profileOpen" x-cloak class="dropdown-menu absolute right-0 mt-3 w-56 rounded-2xl border border-slate-200 bg-white p-3 shadow-lg">
                            <a href="#" class="flex items-center gap-2 rounded-xl px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">
                                <i class='bx bx-user'></i> My Profile
                            </a>
                            <a href="#" class="flex items-center gap-2 rounded-xl px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">
                                <i class='bx bx-cog'></i> Settings
                            </a>
                            <div class="my-2 h-px bg-slate-200"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm text-slate-700 hover:bg-slate-100">
                                    <i class='bx bx-log-out'></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Page Content --}}
            <div class="page-content">
                @yield('content')
            </div>

        </div>
    </div>

    @stack('scripts')
</body>
</html>