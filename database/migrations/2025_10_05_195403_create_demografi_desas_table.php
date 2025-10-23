<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('demografi_desas', function (Blueprint $table) {
            $table->id();
            $table->string('dusun');            
            $table->integer('laki_laki')->default(0);
            $table->integer('perempuan')->default(0);
            $table->integer('total')->default(0);
            $table->year('tahun')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demografi_desas');
    }
};
