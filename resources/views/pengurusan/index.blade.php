@extends('layouts.app')

@section('title', 'Data Pengurusan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-cogs"></i> Data Pengurusan</h2>
    <a href="{{ route('pengurusan.create') }}" class="btn btn-warning">
        <i class="fas fa-plus"></i> Proses Pengurusan
    </a>
</div>

<div class="card">
    <div class="card-body">

        {{-- Identitas --}}
        <div class="mb-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <p class="mb-1 d-flex">
                        <strong style="min-width: 110px;">Programmer</strong>
                        <span>: Sahrul Ramadhani</span>
                    </p>
                    <p class="mb-0 d-flex">
                        <strong style="min-width: 110px;">NIM</strong>
                        <span>: 221011400822</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pendaftar</th>
                        <th>No. Antrian</th>
                        <th>Berkas</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Pembayaran</th>
                        <th>Tanggal Proses</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengurusans as $key => $pengurusan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pengurusan->pendaftar->nama }}</td>
                            <td>
                                @if($pengurusan->pendaftar->daftarUlang && $pengurusan->pendaftar->daftarUlang->no_antrian)
                                    <strong class="text-primary">{{ $pengurusan->pendaftar->daftarUlang->no_antrian }}</strong>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $pengurusan->berkas == 'lengkap' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($pengurusan->berkas) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $pengurusan->status == 'diterima' ? 'bg-success' : ($pengurusan->status == 'ditolak' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ ucfirst($pengurusan->status) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $pengurusan->keterangan == 'OK' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $pengurusan->keterangan }}
                                </span>
                            </td>
                            <td>
                                @if($pengurusan->pembayaran)
                                    <strong class="text-success">Rp {{ number_format($pengurusan->pembayaran, 0, ',', '.') }}</strong>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $pengurusan->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data pengurusan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Total Pendapatan --}}
        <div class="mt-3 text-end">
            <h5>Total Pendapatan:
                <span class="text-success">
                    Rp {{ number_format($pengurusans->sum('pembayaran'), 0, ',', '.') }}
                </span>
            </h5>
        </div>
    </div>
</div>
@endsection
