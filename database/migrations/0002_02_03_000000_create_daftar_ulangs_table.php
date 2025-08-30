<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daftar_ulangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained()->onDelete('cascade');
            $table->enum('ktp', ['ada', 'tidak'])->default('tidak');
            $table->enum('kk', ['ada', 'tidak'])->default('tidak');
            $table->enum('ijazah_akta', ['ada', 'tidak'])->default('tidak');
            $table->date('tanggal_daftar_ulang');
            $table->string('hari_daftar_ulang');
            $table->enum('keterangan', ['OK', 'tidak'])->default('tidak');
            $table->string('no_antrian')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_ulangs');
    }
};
