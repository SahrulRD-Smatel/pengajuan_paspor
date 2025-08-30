<?php

namespace App\Http\Controllers;

use App\Models\Pengurusan;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PengurusanController extends Controller
{
    public function index()
    {
        $pengurusans = Pengurusan::with('pendaftar')->latest()->get();
        return view('pengurusan.index', compact('pengurusans'));
    }

    public function create()
    {
        $pendaftars = Pendaftar::has('daftarUlang')
                              ->doesntHave('pengurusan')
                              ->with('daftarUlang')
                              ->get();
        return view('pengurusan.create', compact('pendaftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftar_id' => 'required|exists:pendaftars,id'
        ]);

        $pengurusan = Pengurusan::create([
            'pendaftar_id' => $request->pendaftar_id
        ]);

        $pengurusan->updateStatus();

        return redirect()->route('pengurusan.index')
                        ->with('success', 'Data pengurusan berhasil diproses');
    }

    public function show(Pengurusan $pengurusan)
    {
        $pengurusan->load(['pendaftar', 'pendaftar.daftarUlang']);
        return view('pengurusan.show', compact('pengurusan'));
    }
}
