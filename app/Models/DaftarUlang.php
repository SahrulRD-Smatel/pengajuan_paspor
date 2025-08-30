<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaftar_id', 'ktp', 'kk', 'ijazah_akta',
        'tanggal_daftar_ulang', 'hari_daftar_ulang',
        'keterangan', 'no_antrian'
    ];

    protected $casts = [
        'tanggal_daftar_ulang' => 'date'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public static function generateNoAntrian()
    {
        $lastNo = self::whereNotNull('no_antrian')
                     ->orderBy('id', 'desc')
                     ->first();

        if (!$lastNo) {
            return 'A001';
        }

        $lastNumber = intval(substr($lastNo->no_antrian, 1));
        return 'A' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    }

    public function updateKeterangan()
    {
        if ($this->ktp == 'ada' && $this->kk == 'ada' && $this->ijazah_akta == 'ada') {
            $this->keterangan = 'OK';
            $this->no_antrian = self::generateNoAntrian();
        } else {
            $this->keterangan = 'tidak';
            $this->no_antrian = null;
        }
        $this->save();
    }
}
