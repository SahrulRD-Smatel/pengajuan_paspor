<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'email', 'telepon', 'alamat',
        'tanggal_datang', 'jam_datang', 'hari_datang'
    ];

    protected $casts = [
        'tanggal_datang' => 'date',
        'jam_datang' => 'datetime:H:i'
    ];

    public function daftarUlang()
    {
        return $this->hasOne(DaftarUlang::class);
    }

    public function pengurusan()
    {
        return $this->hasOne(Pengurusan::class);
    }

    public static function getTanggalTersedia()
    {
        $tanggal = Carbon::today();

        while (true) {
            $count = self::whereDate('tanggal_datang', $tanggal)->count();

            if ($count < 5) {
                return [
                    'tanggal' => $tanggal->format('Y-m-d'),
                    'hari' => $tanggal->translatedFormat('l')
                ];
            }

            $tanggal->addDay();
        }
    }
}
