@extends('layouts.app')

@section('title', 'Proses Pengurusan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h5><i class="fas fa-cogs"></i> Proses Pengurusan</h5>
            </div>
            <div class="card-body">
                @if($pendaftars->isEmpty())
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        Tidak ada pendaftar yang sudah daftar ulang dan belum diproses pengurusannya.
                        <div class="mt-2">
                            <a href="{{ route('daftar-ulang.create') }}" class="btn btn-success btn-sm me-2">
                                <i class="fas fa-edit"></i> Input Daftar Ulang
                            </a>
                            <a href="{{ route('pendaftar.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Pendaftar Baru
                            </a>
                        </div>
                    </div>
                @else
                    <form action="{{ route('pengurusan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pilih Pendaftar (Yang Sudah Daftar Ulang)</label>
                            <select class="form-select @error('pendaftar_id') is-invalid @enderror" name="pendaftar_id" required>
                                <option value="">-- Pilih Pendaftar --</option>
                                @foreach($pendaftars as $pendaftar)
                                    <option value="{{ $pendaftar->id }}" {{ old('pendaftar_id') == $pendaftar->id ? 'selected' : '' }}>
                                        {{ $pendaftar->nama }} - {{ $pendaftar->email }}
                                        @if($pendaftar->daftarUlang && $pendaftar->daftarUlang->no_antrian)
                                            (Antrian: {{ $pendaftar->daftarUlang->no_antrian }})
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('pendaftar_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Proses Otomatis:</strong><br>
                            - Sistem akan memeriksa kelengkapan berkas dari data daftar ulang<br>
                            - Jika KTP, KK, dan Ijazah/Akta semua ada: Status "Diterima", Pembayaran Rp 355.000<br>
                            - Jika ada berkas yang tidak ada: Status "Ditolak", Tidak ada pembayaran
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('pengurusan.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-cogs"></i> Proses Pengurusan
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
