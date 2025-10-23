<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use App\Models\Sejarah;
use App\Models\Peta;
use Illuminate\Http\Request;
use Exception;

class ProfilDesaController extends Controller
{
    public function index()
    {
        return view('frontend.profil-desa.index', [
            'visiMisi' => VisiMisi::first(),
            'sejarah' => Sejarah::first(),
            'peta' => Peta::first(),
        ]);
    }

    public function edit()
    {
        return view('profile-desa.edit', [
            'visiMisi' => VisiMisi::first(),
            'sejarah' => Sejarah::first(),
            'peta' => Peta::first(),
        ]);
    }

    public function updateVisiMisi(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        try {
            $visiMisi = VisiMisi::firstOrCreate([]);
            $visiMisi->update([
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);

            return redirect()->back()
                ->with('success', 'Visi dan Misi berhasil diperbarui!')
                ->with('activeTab', $request->activeTab);
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Visi dan Misi: ' . $e->getMessage())
                ->with('activeTab', $request->activeTab);
        }
    }

    public function updateSejarah(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string',
        ]);

        try {
            $sejarah = Sejarah::firstOrCreate([]);
            $sejarah->update([
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->back()
                ->with('success', 'Sejarah berhasil diperbarui!')
                ->with('activeTab', $request->activeTab);
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Sejarah: ' . $e->getMessage())
                ->with('activeTab', $request->activeTab);
        }
    }

    public function updatePeta(Request $request)
    {
        $request->validate([
            'utara' => 'nullable|string',
            'timur' => 'nullable|string',
            'selatan' => 'nullable|string',
            'barat' => 'nullable|string',
            'luas' => 'nullable|numeric',
            'jumlah_penduduk' => 'nullable|numeric',
        ]);

        try {
            $peta = Peta::firstOrCreate([]);
            $peta->update([
                'utara' => $request->utara,
                'timur' => $request->timur,
                'selatan' => $request->selatan,
                'barat' => $request->barat,
                'luas' => $request->luas,
                'jumlah_penduduk' => $request->jumlah_penduduk,
            ]);

            return redirect()->back()
                ->with('success', 'Data Peta Lokasi Desa berhasil diperbarui.')
                ->with('activeTab', $request->activeTab);
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui Data Peta: ' . $e->getMessage())
                ->with('activeTab', $request->activeTab);
        }
    }
}
