@extends('layouts.app')

@section('title', 'Input Data Pendaftar')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5><i class="fas fa-user-plus"></i> Input Data Pendaftar</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pendaftar.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                       name="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="tel" class="form-control @error('telepon') is-invalid @enderror"
                                       name="telepon" value="{{ old('telepon') }}" required>
                                @error('telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jam Datang</label>
                                <input type="time" class="form-control @error('jam_datang') is-invalid @enderror"
                                       name="jam_datang" value="{{ old('jam_datang') }}" required>
                                @error('jam_datang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror"
                                  name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Tanggal Tersedia:</strong> {{ $tanggalTersedia['tanggal'] }} ({{ $tanggalTersedia['hari'] }})<br>
                        <small>Tanggal dan hari akan ditentukan otomatis berdasarkan kapasitas (maksimal 5 orang per hari)</small>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Data Pendaftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
