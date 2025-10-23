<?php

namespace App\Http\Controllers;

use App\Models\PemerintahDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PemerintahDesaController extends Controller
{
    public function index()
    {
        try {
            $data = PemerintahDesa::paginate(10);
            return view('pemerintah-desa.index', compact('data'));
        } catch (\Exception $e) {
            Log::error('Error index PemerintahDesa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memuat data pemerintah desa.');
        }
    }

    public function create()
    {
        return view('pemerintah-desa.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
                'jabatan' => 'required|string|max:255',
            ]);

            $foto = null;
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('pemerintah_desa', 'public');
            }

            PemerintahDesa::create([
                'nama' => $request->nama,
                'foto' => $foto,
                'jabatan' => $request->jabatan,
            ]);

            return redirect()->route('pemerintah-desa.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error store PemerintahDesa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan data.')->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $pemerintahDesa = PemerintahDesa::findOrFail($id);
            return view('pemerintah-desa.edit', compact('pemerintahDesa'));
        } catch (\Exception $e) {
            Log::error('Error edit PemerintahDesa: ' . $e->getMessage());
            return redirect()->route('pemerintah-desa.index')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = PemerintahDesa::findOrFail($id);

            $request->validate([
                'nama' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
                'jabatan' => 'required|string|max:255',
            ]);

            $foto = $data->foto;
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('pemerintah-desa', 'public');
            }

            $data->update([
                'nama' => $request->nama,
                'foto' => $foto,
                'jabatan' => $request->jabatan,
            ]);

            return redirect()->route('pemerintah-desa.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error update PemerintahDesa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui data.')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $data = PemerintahDesa::findOrFail($id);
            $data->delete();

            return redirect()->route('pemerintah-desa.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error destroy PemerintahDesa: ' . $e->getMessage());
            return redirect()->route('pemerintah-desa.index')->with('error', 'Gagal menghapus data.');
        }
    }
}
