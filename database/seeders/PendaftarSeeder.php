<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftar;
use App\Models\DaftarUlang;
use App\Models\Pengurusan;
use Carbon\Carbon;

class PendaftarSeeder extends Seeder
{
    public function run()
    {
        // Sample data pendaftar
        $pendaftars = [
            [
                'nama' => 'Sahrul Ramadhani',
                'email' => 'sahrul.r.dhani@gmail.com',
                'telepon' => '082294002934',
                'alamat' => 'Komp Marinir Blok A4 No. 20, Kota Depok',
                'tanggal_datang' => Carbon::today(),
                'jam_datang' => '09:00',
                'hari_datang' => Carbon::today()->translatedFormat('l')
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@gmail.com',
                'telepon' => '081234567891',
                'alamat' => 'Jl. Sudirman No. 456, Bandung',
                'tanggal_datang' => Carbon::today(),
                'jam_datang' => '10:00',
                'hari_datang' => Carbon::today()->translatedFormat('l')
            ],
            [
                'nama' => 'Oilien Ramadhanya',
                'email' => 'oilien.ramadhanya@yahoo.com',
                'telepon' => '081234567892',
                'alamat' => 'Jl. Diponegoro No. 789, Surabaya',
                'tanggal_datang' => Carbon::today(),
                'jam_datang' => '11:00',
                'hari_datang' => Carbon::today()->translatedFormat('l')
            ],
            [
                'nama' => 'Dewi Sartika',
                'email' => 'dewi.sartika@gmail.com',
                'telepon' => '081234567893',
                'alamat' => 'Jl. Kartini No. 321, Yogyakarta',
                'tanggal_datang' => Carbon::today()->addDay(),
                'jam_datang' => '09:00',
                'hari_datang' => Carbon::today()->addDay()->translatedFormat('l')
            ],
            [
                'nama' => 'Rudi Hermawan',
                'email' => 'rudi.hermawan@gmail.com',
                'telepon' => '081234567894',
                'alamat' => 'Jl. Pahlawan No. 654, Medan',
                'tanggal_datang' => Carbon::today()->addDay(),
                'jam_datang' => '10:00',
                'hari_datang' => Carbon::today()->addDay()->translatedFormat('l')
            ]
        ];

        foreach ($pendaftars as $data) {
            $pendaftar = Pendaftar::create($data);

            // Create sample daftar ulang for first 3 pendaftar
            if ($pendaftar->id <= 3) {
                $daftarUlang = DaftarUlang::create([
                    'pendaftar_id' => $pendaftar->id,
                    'ktp' => $pendaftar->id <= 2 ? 'ada' : 'tidak',
                    'kk' => 'ada',
                    'ijazah_akta' => 'ada',
                    'tanggal_daftar_ulang' => Carbon::today(),
                    'hari_daftar_ulang' => Carbon::today()->translatedFormat('l')
                ]);

                $daftarUlang->updateKeterangan();

                // Create pengurusan for first 2 pendaftar
                if ($pendaftar->id <= 2) {
                    $pengurusan = Pengurusan::create([
                        'pendaftar_id' => $pendaftar->id
                    ]);

                    $pengurusan->updateStatus();
                }
            }
        }
    }
}
