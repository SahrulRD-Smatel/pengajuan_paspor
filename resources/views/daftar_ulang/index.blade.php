@extends('layouts.app')

@section('title', 'Data Daftar Ulang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-file-alt"></i> Data Daftar Ulang</h2>
    <a href="{{ route('daftar-ulang.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Input Daftar Ulang
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pendaftar</th>
                        <th>KTP</th>
                        <th>Kartu Keluarga</th>
                        <th>Ijazah/Akta</th>
                        <th>Tanggal Daftar Ulang</th>
                        <th>Keterangan</th>
                        <th>No. Antrian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($daftarUlangs as $key => $daftarUlang)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $daftarUlang->pendaftar->nama }}</td>
                            <td>
                                <span class="badge {{ $daftarUlang->ktp == 'ada' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($daftarUlang->ktp) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $daftarUlang->kk == 'ada' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($daftarUlang->kk) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $daftarUlang->ijazah_akta == 'ada' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($daftarUlang->ijazah_akta) }}
                                </span>
                            </td>
                            <td>
                                {{ $daftarUlang->tanggal_daftar_ulang->format('d/m/Y') }}<br>
                                <small class="text-muted">{{ $daftarUlang->hari_daftar_ulang }}</small>
                            </td>
                            <td>
                                <span class="badge {{ $daftarUlang->keterangan == 'OK' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $daftarUlang->keterangan }}
                                </span>
                            </td>
                            <td>
                                @if($daftarUlang->no_antrian)
                                    <strong class="text-primary">{{ $daftarUlang->no_antrian }}</strong>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data daftar ulang</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
