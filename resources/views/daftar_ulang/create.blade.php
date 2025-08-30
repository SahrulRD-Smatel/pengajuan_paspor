@extends('layouts.app')

@section('title', 'Input Daftar Ulang')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5><i class="fas fa-edit"></i> Input Data Daftar Ulang</h5>
            </div>
            <div class="card-body">
                @if($pendaftars->isEmpty())
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        Tidak ada pendaftar yang belum melakukan daftar ulang.
                        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary btn-sm ms-2">
                            <i class="fas fa-plus"></i> Tambah Pendaftar Baru
                        </a>
                    </div>
                @else
                    <form action="{{ route('daftar-ulang.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pilih Pendaftar</label>
                            <select class="form-select @error('pendaftar_id') is-invalid @enderror" name="pendaftar_id" required>
                                <option value="">-- Pilih Pendaftar --</option>
                                @foreach($pendaftars as $pendaftar)
                                    <option value="{{ $pendaftar->id }}" {{ old('pendaftar_id') == $pendaftar->id ? 'selected' : '' }}>
                                        {{ $pendaftar->nama }} - {{ $pendaftar->email }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pendaftar_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">KTP</label>
                                    <select class="form-select @error('ktp') is-invalid @enderror" name="ktp" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="ada" {{ old('ktp') == 'ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="tidak" {{ old('ktp') == 'tidak' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('ktp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Kartu Keluarga</label>
                                    <select class="form-select @error('kk') is-invalid @enderror" name="kk" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="ada" {{ old('kk') == 'ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="tidak" {{ old('kk') == 'tidak' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('kk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Ijazah/Akta</label>
                                    <select class="form-select @error('ijazah_akta') is-invalid @enderror" name="ijazah_akta" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="ada" {{ old('ijazah_akta') == 'ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="tidak" {{ old('ijazah_akta') == 'tidak' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
                                    @error('ijazah_akta')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            <strong>Catatan:</strong><br>
                            - Jika semua berkas ada, keterangan akan menjadi "OK" dan mendapat nomor antrian<br>
                            - Jika ada berkas yang tidak ada, keterangan akan menjadi "tidak"
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('daftar-ulang.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check"></i> Proses Daftar Ulang
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
