<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BeritaDesa;
use App\Models\PemerintahDesa;
use App\Models\PotensiDesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pemerintahSample = PemerintahDesa::take(4)->get();
        $potensiDesa = PotensiDesa::all();
        $beritaDesa = BeritaDesa::latest()->take(6)->get();

        return view('frontend.home', compact('pemerintahSample', 'potensiDesa', 'beritaDesa'));
    }
}
