@extends('layouts.app')

@section('title', 'Data Pendaftar')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-users"></i> Data Pendaftar Pengajuan Paspor</h2>
    <a href="{{ route('pendaftar.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Pendaftar
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Tanggal/Hari Datang</th>
                        <th>Jam</th>
                        <th>Status Daftar Ulang</th>
                        <th>No. Antrian</th>
                        <th>Status Pengurusan</th>
                        <th>Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftars as $key => $pendaftar)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pendaftar->nama }}</td>
                            <td>{{ $pendaftar->email }}</td>
                            <td>{{ $pendaftar->telepon }}</td>
                            <td>
                                {{ $pendaftar->tanggal_datang->format('d/m/Y') }}<br>
                                <small class="text-muted">{{ $pendaftar->hari_datang }}</small>
                            </td>
                            <td>{{ $pendaftar->jam_datang->format('H:i') }}</td>
                            <td>
                                @if($pendaftar->daftarUlang)
                                    <span class="badge {{ $pendaftar->daftarUlang->keterangan == 'OK' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $pendaftar->daftarUlang->keterangan }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">Belum Daftar Ulang</span>
                                @endif
                            </td>
                            <td>
                                @if($pendaftar->daftarUlang && $pendaftar->daftarUlang->no_antrian)
                                    <strong class="text-primary">{{ $pendaftar->daftarUlang->no_antrian }}</strong>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($pendaftar->pengurusan)
                                    <span class="badge {{ $pendaftar->pengurusan->status == 'diterima' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($pendaftar->pengurusan->status) }}
                                    </span><br>
                                    <small>Berkas: {{ $pendaftar->pengurusan->berkas }}</small>
                                @else
                                    <span class="badge bg-secondary">Belum Diproses</span>
                                @endif
                            </td>
                            <td>
                                @if($pendaftar->pengurusan && $pendaftar->pengurusan->pembayaran)
                                    <strong class="text-success">Rp {{ number_format($pendaftar->pengurusan->pembayaran, 0, ',', '.') }}</strong>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data pendaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
