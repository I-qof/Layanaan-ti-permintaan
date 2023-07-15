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
        Schema::create('desc_aduan', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('id_aduan')
                ->constrained('aduan')
                ->onDelete('cascade');
            $table
                ->foreignId('id_sperpat')
                ->constrained('sperpat')
                ->onDelete('cascade');
            $table->text('kerusakan');
            $table->text('diagnosa');
            $table->text('tindakan');
            $table->text('deskripsi');
            $table
                ->foreignId('id_status')
                ->constrained('status')
                ->onDelete('cascade');
            $table
                ->foreignId('id_teknisi')
                ->constrained('users')
                ->onDelete('cascade');
            $table->integer('deleted')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desc_aduan');
    }
};
