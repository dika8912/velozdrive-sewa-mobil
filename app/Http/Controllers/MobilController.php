<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    // Public (user) methods
    public function index()
    {
        $mobils = Mobil::where('status', 'tersedia')
            ->latest()
            ->paginate(9);

        return view('user.mobil.index', compact('mobils'));
    }

    public function show($id)
    {
        $mobil = Mobil::findOrFail($id);

        return view('user.mobil.show', compact('mobil'));
    }

    // Admin methods (stubs)
    public function create()
    {
        return view('admin.mobil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
        ]);

        Mobil::create($request->all());

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);

        return view('admin.mobil.edit', compact('mobil'));
    }

    public function update(Request $request, $id)
    {
        $mobil = Mobil::findOrFail($id);

        $mobil->update($request->all());

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);
        $mobil->delete();

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil dihapus.');
    }
}
