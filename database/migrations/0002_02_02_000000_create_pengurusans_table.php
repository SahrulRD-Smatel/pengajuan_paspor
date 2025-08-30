<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengurusans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftar_id')->constrained()->onDelete('cascade');
            $table->enum('berkas', ['lengkap', 'tidak lengkap'])->default('tidak lengkap');
            $table->enum('status', ['diterima', 'ditolak', 'pending'])->default('pending');
            $table->enum('keterangan', ['OK', 'tidak'])->default('tidak');
            $table->decimal('pembayaran', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengurusans');
    }
};
