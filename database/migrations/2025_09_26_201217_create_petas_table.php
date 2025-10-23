<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('petas', function (Blueprint $table) {
            $table->id();

            // Batas Desa
            $table->string('utara')->nullable();
            $table->string('timur')->nullable();
            $table->string('selatan')->nullable();
            $table->string('barat')->nullable();

            // Data lain
            $table->decimal('luas', 15, 2)->nullable()->comment('Satuan bisa m2 atau km2');
            $table->integer('jumlah_penduduk')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petas');
    }
};
