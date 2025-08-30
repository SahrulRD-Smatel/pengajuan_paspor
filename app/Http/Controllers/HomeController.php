<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\DaftarUlang;
use App\Models\Pengurusan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalPendaftar = Pendaftar::count();
        $totalDaftarUlang = DaftarUlang::count();
        $totalPengurusan = Pengurusan::count();
        $pendaftarDiterima = Pengurusan::where('status', 'diterima')->count();

        return view('dashboard', compact(
            'totalPendaftar',
            'totalDaftarUlang',
            'totalPengurusan',
            'pendaftarDiterima'
        ));
    }
}
