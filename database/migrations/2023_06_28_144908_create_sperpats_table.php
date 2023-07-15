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
        Schema::create('sperpat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sperpat');
            $table
                ->foreignId('id_jenis')
                ->constrained('jenis_barang')
                ->onDelete('cascade');
            $table
                ->foreignId('id_user_pemakai')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('no_inventaris');
            $table->text('deskripsi');
            $table->integer('status_pemakaian');
            $table->integer('deleted')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sperpat');
    }
};
