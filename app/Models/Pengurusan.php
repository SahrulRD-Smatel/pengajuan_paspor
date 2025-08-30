<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaftar_id', 'berkas', 'status',
        'keterangan', 'pembayaran'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function updateStatus()
    {
        $daftarUlang = $this->pendaftar->daftarUlang;

        if ($daftarUlang &&
            $daftarUlang->ktp == 'ada' &&
            $daftarUlang->kk == 'ada' &&
            $daftarUlang->ijazah_akta == 'ada') {

            $this->berkas = 'lengkap';
            $this->status = 'diterima';
            $this->keterangan = 'OK';
            $this->pembayaran = 355000;
        } else {
            $this->berkas = 'tidak lengkap';
            $this->status = 'ditolak';
            $this->keterangan = 'tidak';
            $this->pembayaran = null;
        }

        $this->save();
    }
}
