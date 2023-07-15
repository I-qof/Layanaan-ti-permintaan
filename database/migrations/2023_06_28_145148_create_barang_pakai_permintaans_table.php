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
        Schema::create('barang_pakai_permintaan', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('id_inventaris')
                ->constrained('inventaris')
                ->onDelete('cascade');
            $table
                ->foreignId('id_desc_permintaan')
                ->constrained('desc_permintaan')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_pakai_permintaan');
    }
};
