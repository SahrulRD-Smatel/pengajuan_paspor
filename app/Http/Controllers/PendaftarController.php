<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = Pendaftar::with(['daftarUlang', 'pengurusan'])->latest()->get();
        return view('pendaftar.index', compact('pendaftars'));
    }

    public function create()
    {
        $tanggalTersedia = Pendaftar::getTanggalTersedia();
        return view('pendaftar.create', compact('tanggalTersedia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pendaftars',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jam_datang' => 'required'
        ]);

        $tanggalTersedia = Pendaftar::getTanggalTersedia();

        Pendaftar::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tanggal_datang' => $tanggalTersedia['tanggal'],
            'jam_datang' => $request->jam_datang,
            'hari_datang' => $tanggalTersedia['hari']
        ]);

        return redirect()->route('pendaftar.index')
                        ->with('success', 'Data pendaftar berhasil disimpan');
    }

    public function show(Pendaftar $pendaftar)
    {
        $pendaftar->load(['daftarUlang', 'pengurusan']);
        return view('pendaftar.show', compact('pendaftar'));
    }
}
