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
        Schema::create('desc_permintaan', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('id_permintaan')
                ->constrained('permintaan')
                ->onDelete('cascade');
            $table
                ->foreignId('id_inventaris')
                ->constrained('inventaris')
                ->onDelete('cascade');
            $table->text('diagnosa');
            $table->text('tindakan');
            $table->text('deskripsi');
            $table->integer('id_status_deskripsi');
            $table->integer('id_status_qc');
            $table->integer('id_status_penyelesaian');
            $table
                ->foreignId('id_teknisi')
                ->constrained('users')
                ->onDelete('cascade');
            $table->integer('deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desc_perminta');
    }
};
