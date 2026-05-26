@extends('layouts.dashboard')
@section('title', 'Profil Saya')

@section('content')
    <div class="page-header">
        <h1>Profil Saya</h1>
        <p>Perbarui informasi akun dan detail kontak kamu di halaman ini.</p>
    </div>

    <div class="profile-grid">
        <div class="card card-half">
            <h2>Informasi Akun</h2>
            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <label for="name">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>

                <label for="phone_number">Nomor Telepon</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->profile->phone_number ?? '') }}">

                <label for="address">Alamat</label>
                <textarea id="address" name="address">{{ old('address', $user->profile->address ?? '') }}</textarea>

                <label for="profile_picture">Foto Profil</label>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*">

                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </form>
        </div>

        <div class="card card-half">
            <h2>Ubah Password</h2>
            <form action="{{ route('user.profile.password') }}" method="POST">
                @csrf
                @method('PATCH')

                <label for="current_password">Password Saat Ini</label>
                <input type="password" id="current_password" name="current_password" required>

                <label for="password">Password Baru</label>
                <input type="password" id="password" name="password" required>

                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>

                <button type="submit" class="btn-primary">Ubah Password</button>
            </form>
        </div>
    </div>
@endsection
