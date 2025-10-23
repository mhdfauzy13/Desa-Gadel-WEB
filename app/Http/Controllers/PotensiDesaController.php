<?php

namespace App\Http\Controllers;

use App\Models\PotensiDesa;
use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
    public function index()
    {
        $potensis = PotensiDesa::latest()->paginate(10);
        return view('potensi-desa.index', compact('potensis'));
    }

    public function create()
    {
        return view('potensi-desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_potensi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data = $request->only(['judul_potensi', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('potensi_desa', 'public');
        }

        $data['created_by'] = auth()->check() ? auth()->user()->name : 'Admin';

        PotensiDesa::create($data);

        return redirect()->route('potensi-desa.index')->with('success', 'Potensi Desa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $potensi = PotensiDesa::findOrFail($id);
        return view('potensi-desa.edit', compact('potensi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_potensi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $potensi = PotensiDesa::findOrFail($id);

        $data = $request->only(['judul_potensi', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('potensi_desa', 'public');
        }

        $potensi->update($data);

        return redirect()->route('potensi-desa.index')->with('success', 'Potensi Desa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $potensi = PotensiDesa::findOrFail($id);

        if ($potensi->gambar && file_exists(storage_path('app/public/' . $potensi->gambar))) {
            unlink(storage_path('app/public/' . $potensi->gambar));
        }

        $potensi->delete();

        return redirect()->route('potensi-desa.index')->with('success', 'Potensi Desa berhasil dihapus.');
    }
}
