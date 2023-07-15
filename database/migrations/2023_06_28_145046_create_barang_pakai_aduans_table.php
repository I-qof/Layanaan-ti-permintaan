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
        Schema::create('barang_pakai_aduan', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('id_sperpat')
                ->constrained('sperpat')
                ->onDelete('cascade');
            $table
                ->foreignId('id_desc_aduan')
                ->constrained('desc_aduan')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_pakai_aduan');
    }
};
