<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BeritaDesa;
use App\Models\PotensiDesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beritaTerbaru = BeritaDesa::latest()->take(3)->get();

        $potensiUnggulan = PotensiDesa::take(3)->get();

        // Kirim data ke view
        return view('frontend.home', compact('beritaTerbaru', 'potensiUnggulan'));
    }
}
