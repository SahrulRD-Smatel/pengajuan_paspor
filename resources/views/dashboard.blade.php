@extends('layouts.app')

@section('title', 'Dashboard - INDONESIA PASPOR')

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white shadow" style="background: linear-gradient(135deg, #36d1dc, #5b86e5); border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-users fa-3x mb-3"></i>
                <h3>{{ $totalPendaftar }}</h3>
                <p class="fw-bold">Total Pendaftar</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white shadow" style="background: linear-gradient(135deg, #11998e, #38ef7d); border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-file-alt fa-3x mb-3"></i>
                <h3>{{ $totalDaftarUlang }}</h3>
                <p class="fw-bold">Daftar Ulang</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white shadow" style="background: linear-gradient(135deg, #fc6076, #ff9a44); border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-cogs fa-3x mb-3"></i>
                <h3>{{ $totalPengurusan }}</h3>
                <p class="fw-bold">Pengurusan</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white shadow" style="background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 15px;">
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-3x mb-3"></i>
                <h3>{{ $pendaftarDiterima }}</h3>
                <p class="fw-bold">Diterima</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow border-0" style="border-radius: 15px;">
            <div class="card-header text-white" style="background: linear-gradient(135deg, #667eea, #764ba2); border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <h5><i class="fas fa-user-plus"></i> Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('pendaftar.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-plus"></i> Input Daftar Baru
                    </a>
                    <a href="{{ route('daftar-ulang.create') }}" class="btn btn-success shadow-sm">
                        <i class="fas fa-edit"></i> Input Daftar Ulang
                    </a>
                    <a href="{{ route('pengurusan.create') }}" class="btn btn-warning shadow-sm">
                        <i class="fas fa-cogs"></i> Proses Pengurusan
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow border-0" style="border-radius: 15px;">
            <div class="card-header text-white" style="background: linear-gradient(135deg, #36d1dc, #5b86e5); border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <h5><i class="fas fa-info-circle"></i> Informasi Sistem</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success"></i> Kapasitas maksimal: <strong>5 orang per hari</strong></li>
                    <li><i class="fas fa-check text-success"></i> Sistem otomatis menentukan tanggal berdasarkan kapasitas</li>
                    <li><i class="fas fa-check text-success"></i> Nomor antrian otomatis untuk yang memenuhi syarat</li>
                    <li><i class="fas fa-check text-success"></i> Biaya pengurusan: <strong>Rp 355.000</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
