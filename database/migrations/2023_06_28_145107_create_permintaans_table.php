<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('id_user')
                ->constrained('users')
                ->onDelete('cascade');
            $table->text('alasan_permintaan');
            $table->string('no_aduan');
            $table->string('no_hp');
            $table->string('lokasi');
            $table->string('email_atasan');
            $table->dateTime('tgl_masuk');
            $table->dateTime('tgl_keluar');            
            $table
                ->foreignId('id_status')
                ->constrained('status')
                ->onDelete('cascade');
            $table->string('nama_pengambil');
            $table->integer('deleted')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan');
    }
};
