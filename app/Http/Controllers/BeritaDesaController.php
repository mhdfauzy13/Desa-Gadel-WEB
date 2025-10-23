<?php

namespace App\Http\Controllers;

use App\Models\BeritaDesa;
use Illuminate\Http\Request;
use Exception;

class BeritaDesaController extends Controller
{
    public function index()
    {
        try {
            $beritas = BeritaDesa::latest()->paginate(10);
            return view('berita-desa.index', compact('beritas'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data berita: ' . $e->getMessage());
        }
    }
    
    public function create()
    {
        return view('berita-desa.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            ]);

            $data = $request->only(['judul', 'deskripsi']);

            if ($request->hasFile('gambar')) {
                $data['gambar'] = $request->file('gambar')->store('berita_desa', 'public');
            }

            $data['created_by'] = auth()->check() ? auth()->user()->name : 'Admin';

            BeritaDesa::create($data);

            return redirect()->route('berita-desa.index')->with('success', 'Berita berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan berita: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $berita = BeritaDesa::findOrFail($id);
            return view('berita-desa.edit', compact('berita'));
        } catch (Exception $e) {
            return redirect()->route('berita-desa.index')->with('error', 'Berita tidak ditemukan!');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            ]);

            $berita = BeritaDesa::findOrFail($id);

            $data = $request->only(['judul', 'deskripsi']);

            if ($request->hasFile('gambar')) {
                $data['gambar'] = $request->file('gambar')->store('berita_desa', 'public');
            }

            $berita->update($data);

            return redirect()->route('berita-desa.index')->with('success', 'Berita berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui berita: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $berita = BeritaDesa::findOrFail($id);
            $berita->delete();

            return redirect()->route('berita-desa.index')->with('success', 'Berita berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('berita-desa.index')->with('error', 'Gagal menghapus berita: ' . $e->getMessage());
        }
    }
}
