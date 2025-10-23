<?php

namespace App\Http\Controllers;

use App\Models\DemografiDesa;
use Illuminate\Http\Request;
use Exception;

class DemografiDesaController extends Controller
{
    public function index()
    {
        try {
            $demografis = DemografiDesa::latest()->paginate(10);
            return view('demografi-desa.index', compact('demografis'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memuat data demografi: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('demografi-desa.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'dusun'      => 'required|string|max:100',
                'laki_laki'  => 'required|integer|min:0',
                'perempuan'  => 'required|integer|min:0',
                'tahun'      => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            $data = $request->only(['dusun', 'laki_laki', 'perempuan', 'tahun']);

            DemografiDesa::create($data);

            return redirect()->route('demografi-desa.index')->with('success', 'Data demografi desa berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $demografi = DemografiDesa::findOrFail($id);
            return view('demografi-desa.edit', compact('demografi'));
        } catch (Exception $e) {
            return redirect()->route('demografi-desa.index')->with('error', 'Data demografi tidak ditemukan!');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'dusun'      => 'required|string|max:100',
                'laki_laki'  => 'required|integer|min:0',
                'perempuan'  => 'required|integer|min:0',
                'tahun'      => 'required|integer|min:1900|max:' . date('Y'),
            ]);

            $demografi = DemografiDesa::findOrFail($id);

            $data = $request->only(['dusun', 'laki_laki', 'perempuan', 'tahun']);

            $demografi->update($data);

            return redirect()->route('demografi-desa.index')->with('success', 'Data demografi desa berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $demografi = DemografiDesa::findOrFail($id);
            $demografi->delete();

            return redirect()->route('demografi-desa.index')->with('success', 'Data demografi desa berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('demografi-desa.index')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
