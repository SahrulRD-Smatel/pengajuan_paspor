<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DaftarUlangController extends Controller
{
    public function index()
    {
        $daftarUlangs = DaftarUlang::with('pendaftar')->latest()->get();
        return view('daftar_ulang.index', compact('daftarUlangs'));
    }

    public function create()
    {
        $pendaftars = Pendaftar::doesntHave('daftarUlang')->get();
        return view('daftar_ulang.create', compact('pendaftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'ktp' => 'required|in:ada,tidak',
            'kk' => 'required|in:ada,tidak',
            'ijazah_akta' => 'required|in:ada,tidak'
        ]);

        $pendaftar = Pendaftar::findOrFail($request->pendaftar_id);
        $today = Carbon::today();

        $daftarUlang = DaftarUlang::create([
            'pendaftar_id' => $request->pendaftar_id,
            'ktp' => $request->ktp,
            'kk' => $request->kk,
            'ijazah_akta' => $request->ijazah_akta,
            'tanggal_daftar_ulang' => $today,
            'hari_daftar_ulang' => $today->translatedFormat('l')
        ]);

        $daftarUlang->updateKeterangan();

        return redirect()->route('daftar-ulang.index')
                        ->with('success', 'Data daftar ulang berhasil disimpan');
    }

    public function show(DaftarUlang $daftarUlang)
    {
        $daftarUlang->load('pendaftar');
        return view('daftar_ulang.show', compact('daftarUlang'));
    }
}
